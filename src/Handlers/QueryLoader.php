<?php

namespace Khufu\Viewdb\Handlers;

class QueryLoader
{
  private string $sqlserver;
  private string $sqlite;
  private string $mariadb;
  private string $mysql;
  private string $pgsql;

  public function __construct()
  {
    $this->sqlserver();
    $this->sqlite();
    $this->mariadb();
    $this->mysql();
    $this->pgsql();
  }

  /**
   * Get the sqlserver query
   */
  public function sqlserver()
  {
    $this->sqlserver = $this->load_sqlserver_query();
    return $this->sqlserver;
  }

  /**
   * Get the sqlite query
   */
  public function sqlite()
  {
    $this->sqlite = $this->load_sqlite_query();
    return $this->sqlite;
  }

  /**
   * Get the mariadb query
   */
  public function mariadb()
  {
    $this->mariadb = $this->load_mariadb_query();
    return $this->mariadb;
  }

  /**
   * Get the mysql query
   */
  public function mysql()
  {
    $this->mysql = $this->load_mysql_query();
    return $this->mysql;
  }

  /**
   * Get the pgsql query
   */
  public function pgsql()
  {
    $this->pgsql = $this->load_pgsql_query();
    return $this->pgsql;
  }

  /**
   * Load the query for the sqlserver database
   * @return string
   */
  public function load_sqlserver_query()
  {
    $query = $this->load_file(__DIR__ . "/../../queries/sqlserver/query.sql");
    return $query;
  }

  /**
   * Load the query for the sqlite database
   * @return string
   */
  public function load_sqlite_query()
  {
    $query = $this->load_file(__DIR__ . "/../../queries/sqlite/query.sql");
    return $query;
  }

  /**
   * Load the query for the mariadb database
   * @return string
   */
  public function load_mariadb_query()
  {
    $query = $this->load_file(__DIR__ . "/../../queries/mariadb/query.sql");
    return $query;
  }

  /**
   * Load the query for the mysql database
   * @return string
   */
  public function load_mysql_query()
  {
    $query = $this->load_file(__DIR__ . "/../../queries/mysql/query.sql");
    return $query;
  }

  /**
   * Load the query for the pgsql database
   * @return string
   */
  public function load_pgsql_query()
  {
    $query = $this->load_file(__DIR__ . "/../../queries/postgres/query.sql");
    return $query;
  }

  public function load_file($file)
  {
    if (file_exists($file)) {
      return file_get_contents($file);
    }
    return "File " . $file . " not found";
  }
}
