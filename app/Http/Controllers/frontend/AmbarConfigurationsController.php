<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;
use App\Configuration2;
use App\DoorLeafFilling;
use App\FinalTreatment;
use App\Kanelura;
use App\DoorlockKind;
use App\Track;


use Illuminate\Support\Facades\Session;


class AmbarConfigurationsController extends Controller
{
    public function createFiling()
{
    $language = $this->setLanguage();

    $config2_id=session('id');
    $config2 = Configuration2::find($config2_id);
    $dti = $config2->basicConfiguration->door_type_id;

    $filings = DoorLeafFilling::where('door_type_id',$dti)->get();

    return view('frontend.configurations.filing')->withLanguage($language)->withConfig2($config2)->withFilings($filings)->withDti($dti);
}

    public function storeFiling(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $filing_id = $request->input('filing');
        $config2 = Configuration2::find($config2_id);
        $filing = DoorLeafFilling::find($filing_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->door_leaf_filling_id)
            $config2->price -= $config2->doorLeafFilling->price;

        $config2->door_leaf_filling_id = $filing_id;
        $config2->price += $filing->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('ambar_config_treatment_create');
    }

    public function createTreatment()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $treatments = FinalTreatment::where('door_type_id',$dti)->get();

        return view('frontend.configurations.treatment')->withLanguage($language)->withConfig2($config2)->withTreatments($treatments)->withDti($dti);
    }

    public function storeTreatment(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $treatment_id = $request->input('treatment');
        $config2 = Configuration2::find($config2_id);
        $treatment = FinalTreatment::find($treatment_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->final_treatment_id)
            $config2->price -= $config2->finalTreatment->price;

        $config2->final_treatment_id = $treatment_id;

        $config2->price += $treatment->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('ambar_config_kanelura_create');
    }

    public function createKanelura()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $kaneluras = Kanelura::where('door_type_id',$dti)->get();

        return view('frontend.configurations.kanelura')->withLanguage($language)->withConfig2($config2)->withKaneluras($kaneluras)->withDti($dti);
    }

    public function storeKanelura(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $kanelura_id = $request->input('kanelura');
        $config2 = Configuration2::find($config2_id);
        $kanelura = Kanelura::find($kanelura_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->kanelura_id)
            $config2->price -= $config2->kanelura->price;

        $config2->kanelura_id = $kanelura_id;

        $config2->price += $kanelura->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('ambar_config_doorlock_kind_create');
    }

    public function createDoorlockKind()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $doorlockKinds = DoorlockKind::where('door_type_id',$dti)->get();

        return view('frontend.configurations.doorlock_kind')->withLanguage($language)->withConfig2($config2)->withDoorlockKinds($doorlockKinds)->withDti($dti);
    }

    public function storeDoorlockKind(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $doorlock_kind_id = $request->input('doorlock_kind');
        $config2 = Configuration2::find($config2_id);
        $doorlock_kind = DoorlockKind::find($doorlock_kind_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->doorlock_kind_id)
            $config2->price -= $config2->doorlockKind->price;

        $config2->doorlock_kind_id = $doorlock_kind_id;

        $config2->price += $doorlock_kind->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('ambar_config_track_create');
    }

    public function createTrack()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $tracks = Track::where('door_type_id',$dti)->get();

        return view('frontend.configurations.track')->withLanguage($language)->withConfig2($config2)->withTracks($tracks)->withDti($dti);
    }

    public function storeTrack(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $track_id = $request->input('track');
        $config2 = Configuration2::find($config2_id);
        $track = Track::find($track_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->track_id)
            $config2->price -= $config2->track->price;

        $config2->track_id = $track_id;

        $config2->price += $track->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('created_configuration', $config2_id );
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
