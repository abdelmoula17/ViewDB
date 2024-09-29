import { DatabaseMetadata } from '../data/import-metadata/metadata-types/database-metadata';
import { DatabaseEdition } from './database-edition';
import { DatabaseType } from './database-type';
import {
    DBRelationship,
    createRelationshipsFromMetadata,
} from './db-relationship';
import {
    DBTable,
    adjustTablePositions,
    createTablesFromMetadata,
} from './db-table';
import { generateId } from '@/lib/utils';
export interface Diagram {
    id: string;
    name: string;
    databaseType: DatabaseType;
    databaseEdition?: DatabaseEdition;
    tables?: DBTable[];
    relationships?: DBRelationship[];
    createdAt: Date;
    updatedAt: Date;
}

export const loadFromDatabaseMetadata = ({
    databaseType,
    databaseMetadata,
    diagramNumber,
    databaseEdition,
}: {
    databaseType: DatabaseType;
    databaseMetadata: DatabaseMetadata;
    diagramNumber: number;
    databaseEdition?: DatabaseEdition;
}): Diagram => {
    const {
        tables: tableInfos,
        pk_info: primaryKeys,
        columns,
        indexes,
        fk_info: foreignKeys,
        views: views,
    } = databaseMetadata;

    // First pass: Create tables without final positions
    const tables = createTablesFromMetadata({
        tableInfos,
        columns,
        indexes,
        primaryKeys,
        views,
    });

    // First pass: Create relationships
    const relationships = createRelationshipsFromMetadata({
        foreignKeys,
        tables,
    });

    // Second pass: Adjust table positions based on relationships
    const adjustedTables = adjustTablePositions({ tables, relationships });

    const sortedTables = adjustedTables.sort((a, b) => {
        if (a.isView === b.isView) {
            // Both are either tables or views, so sort alphabetically by name
            return a.name.localeCompare(b.name);
        }
        // If one is a view and the other is not, put tables first
        return a.isView ? 1 : -1;
    });

    return {
        id: generateId(),
        name:
            `${databaseMetadata.database_name}-db` ||
            `Diagram ${diagramNumber}`,
        databaseType: databaseType ?? DatabaseType.GENERIC,
        databaseEdition,
        tables: sortedTables,
        relationships,
        createdAt: new Date(),
        updatedAt: new Date(),
    };
};

export const loadFromApi = async () => {
    try {
        const response = await fetch('http://localhost/api/viewdb/query');
        if (!response.ok) {
            throw new Error('Failed to load data');
        }
        return await response.json();
    } catch (err) {
        return err;
    }
};
