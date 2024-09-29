<?php

namespace Khufu\Viewdb\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Khufu\Viewdb\Handlers\QueryLoader;
use Khufu\Viewdb\Http\Controllers\Controller;

class QueryDbController extends Controller
{
  public function index()
  {
    $driver_name = DB::connection()->getDriverName();
    $database_drivers_chartdb_mapping = [
      "pgsql" => "postgresql",
      "mysql" => "mysql",
      "sqlite" => "sqlite",
      "sqlsrv" => "sql_server",
      "mariadb" => "mariadb"

    ];

    $result  =  DB::select(DB::raw(QueryLoader::load($driver_name)));
    return response()->json([
      "meta_data" => json_decode($result[0]->{'metadata_json_to_import'}),
      "db_type" => $database_drivers_chartdb_mapping[$driver_name],
    ]);
  }
}
