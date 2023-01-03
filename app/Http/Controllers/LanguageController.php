<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function language($lang){
        $time = 5000;
        \App::setlocale($lang);
        \Session::put('lang',$lang);
        \Cookie::queue('lang', $lang, $time);
        // dd(\Cookie::get('lang'));
        return redirect()->back();
    }
}
