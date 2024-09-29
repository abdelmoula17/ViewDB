<?php

namespace Khufu\Viewdb\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Khufu\Viewdb\Handlers\QueryLoader;
use Khufu\Viewdb\Http\Controllers\Controller;

class QueryDbController extends Controller
{
  public function index()
  {

    $database_drivers = [
      "pgsql" => "postgresql",
      "mysql" => "mysql",
      "sqlite" => "sqlite",
      "sqlsrv" => "sql_server",
      "mariadb" => "mariadb"

    ];
    $loader = new QueryLoader;
    $result  =  DB::select(DB::raw($loader->pgsql()));
    return response()->json([
      "meta_data" => json_decode($result[0]->{'metadata_json_to_import'}),
      "db_type" => $database_drivers[DB::connection()->getDriverName()],
    ]);
  }
}
