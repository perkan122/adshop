<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Illuminate\Session;
use App\Configuration;

class PagesController extends Controller
{

    function getOfferedModels(){
        $language = $this->setLanguage();
        $models = Configuration::where('naslovna', 1)->get();

        return view('frontend.models')->withLanguage($language)->withModels($models);
    }

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
