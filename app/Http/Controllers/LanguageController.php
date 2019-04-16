<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Session;

class LanguageController extends Controller
{
   public function bangla()
    {
        session::put('language','bn','20');

        return Redirect::back();
    }

    public function english()
    {
        session::put('language','en','20');

        return Redirect::back();
    }
}
