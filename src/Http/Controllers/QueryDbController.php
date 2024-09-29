<?php

namespace Khufu\Viewdb\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Khufu\Viewdb\Handlers\QueryLoader;
use Khufu\Viewdb\Http\Controllers\Controller;

class QueryDbController extends Controller
{
  public function index()
  {
<<<<<<< HEAD

    $database_drivers = [
=======
    $driver_name = DB::connection()->getDriverName();
    $database_drivers_chartdb_mapping = [
>>>>>>> Initial commit: added Laravel package for web-based database diagramming editor
      "pgsql" => "postgresql",
      "mysql" => "mysql",
      "sqlite" => "sqlite",
      "sqlsrv" => "sql_server",
      "mariadb" => "mariadb"

    ];
<<<<<<< HEAD
    $loader = new QueryLoader;
    $result  =  DB::select(DB::raw($loader->pgsql()));
    return response()->json([
      "meta_data" => json_decode($result[0]->{'metadata_json_to_import'}),
      "db_type" => $database_drivers[DB::connection()->getDriverName()],
=======

    $result  =  DB::select(DB::raw(QueryLoader::load($driver_name)));
    return response()->json([
      "meta_data" => json_decode($result[0]->{'metadata_json_to_import'}),
      "db_type" => $database_drivers_chartdb_mapping[$driver_name],
>>>>>>> Initial commit: added Laravel package for web-based database diagramming editor
    ]);
  }
}
