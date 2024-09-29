<?php

namespace Khufu\Viewdb\Handlers;

class QueryLoader
{
<<<<<<< HEAD
  private string $sqlserver;
=======
  private string $sqlsrv;
>>>>>>> Initial commit: added Laravel package for web-based database diagramming editor
  private string $sqlite;
  private string $mariadb;
  private string $mysql;
  private string $pgsql;

<<<<<<< HEAD
  public function __construct()
  {
    $this->sqlserver();
=======

  public function __construct()
  {
    $this->sqlsrv();
>>>>>>> Initial commit: added Laravel package for web-based database diagramming editor
    $this->sqlite();
    $this->mariadb();
    $this->mysql();
    $this->pgsql();
  }

<<<<<<< HEAD
  /**
   * Get the sqlserver query
   */
  public function sqlserver()
  {
    $this->sqlserver = $this->load_sqlserver_query();
    return $this->sqlserver;
=======
  public static function load($driver_name)
  {
    try {
      $loader = new QueryLoader;
      return $loader->$driver_name();
    } catch (\Exception $e) {
      return "Driver not found";
    }
  }

  /**
   * Get the sqlsrv query
   */
  public function sqlsrv()
  {
    $this->sqlsrv = $this->load_sqlserver_query();
    return $this->sqlsrv;
>>>>>>> Initial commit: added Laravel package for web-based database diagramming editor
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
<<<<<<< HEAD
   * Load the query for the sqlserver database
=======
   * Load the query for the sqlsrv database
>>>>>>> Initial commit: added Laravel package for web-based database diagramming editor
   * @return string
   */
  public function load_sqlserver_query()
  {
<<<<<<< HEAD
    $query = $this->load_file(__DIR__ . "/../../queries/sqlserver/query.sql");
=======
    $query = $this->load_file(__DIR__ . "/../../queries/sqlsrv/query.sql");
>>>>>>> Initial commit: added Laravel package for web-based database diagramming editor
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
