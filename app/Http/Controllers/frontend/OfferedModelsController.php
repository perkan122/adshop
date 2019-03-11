<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;

class OfferedModelsController extends Controller
{



    function changeLanguage(){

        if(session('language') == 'en'){
            session()->forget('language');
            session(['language' => 'sr']);
        }elseif(session('language') == 'sr'){
            session()->forget('language');
            session(['language' => 'en']);
        }

        return redirect()->back();
    }


    function setLanguage(){

        if(!session('language')){
            session(['language' => 'sr']);
        }
        else{

            if(session('language') == 'en'){
                App::setLocale('en');
            }

            if(session('language') == 'sr'){
                App::setLocale('sr');
            }
        }

        $language = App::getLocale();

        return $language;
    }
}
