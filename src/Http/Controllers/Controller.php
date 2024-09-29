<?php

namespace Khufu\Viewdb\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  public function index()
  {
    return view('viewdb::index');
  }
}
