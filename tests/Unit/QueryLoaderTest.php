<?php

use Khufu\Viewdb\Handlers\QueryLoader;
use PHPUnit\Framework\TestCase;

class QueryLoaderTest extends TestCase
{
  private $queryLoader;

  protected function setUp(): void
  {
    $this->queryLoader = $this->getMockBuilder(QueryLoader::class)
      ->onlyMethods([])
      ->getMock();
  }

  public function testSqlserver()
  {
    $expectedQuery = $this->queryLoader->load_file(__DIR__ . '/../../queries/sqlserver/query.sql');
    $result = $this->queryLoader->sqlserver();
    $this->assertEquals($expectedQuery, $result);
  }

  public function testSqlite()
  {
    $expectedQuery = $this->queryLoader->load_file(__DIR__ . '/../../queries/sqlite/query.sql');
    $result = $this->queryLoader->sqlite();
    $this->assertEquals($expectedQuery, $result);
  }

  public function testMariadb()
  {
    $expectedQuery = $this->queryLoader->load_file(__DIR__ . '/../../queries/mariadb/query.sql');
    $result = $this->queryLoader->mariadb();
    $this->assertEquals($expectedQuery, $result);
  }

  public function testMysql()
  {
    $expectedQuery = $this->queryLoader->load_file(__DIR__ . '/../../queries/mysql/query.sql');
    $result = $this->queryLoader->mysql();
    $this->assertEquals($expectedQuery, $result);
  }

  public function testPgsql()
  {
    $expectedQuery = $this->queryLoader->load_file(__DIR__ . '/../../queries/postgres/query.sql');
    $result = $this->queryLoader->pgsql();
    $this->assertEquals($expectedQuery, $result);
  }
}
