<?php

namespace Khufu\Viewdb\Http\Controllers;

use Khufu\Viewdb\Http\Controllers\Controller;

class ViewDbController extends Controller
{
  public function show()
  {
    return view('viewdb::layout');
  }
}
