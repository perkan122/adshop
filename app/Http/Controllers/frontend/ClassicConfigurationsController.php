<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;
use App\Configuration2;
use App\DoorLeafFilling;
use App\FinalTreatment;
use App\Kanelura;
use App\PervajzWallWidth;
use App\Hinge;
use App\Doorstep;
use App\DoorlockKind;
use App\DoorlockType;
use App\DoorHandle;
use App\OpeningWay;
use App\VentilationGrid;
use App\Stopper;


use Illuminate\Support\Facades\Session;

class ClassicConfigurationsController extends Controller
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

        return redirect()->route('classic_config_treatment_create');
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

        return redirect()->route('classic_config_kanelura_create');
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

        return redirect()->route('classic_config_pervajz_create');
    }

    public function createPervajz()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $pervajzs = PervajzWallWidth::where('door_type_id',$dti)->get();

        return view('frontend.configurations.pervajz')->withLanguage($language)->withConfig2($config2)->withPervajzs($pervajzs)->withDti($dti);
    }

    public function storePervajz(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $pervajz_id = $request->input('pervajz');
        $config2 = Configuration2::find($config2_id);
        $pervajz = PervajzWallWidth::find($pervajz_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->pervajz_wall_width_id)
            $config2->price -= $config2->pervajzWallWidth->price;

        $config2->pervajz_wall_width_id = $pervajz_id;

        $config2->price += $pervajz->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('classic_config_hinges_create');
    }

    public function createHinges()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $hinges = Hinge::where('door_type_id',$dti)->get();

        return view('frontend.configurations.hinges')->withLanguage($language)->withConfig2($config2)->withHinges($hinges)->withDti($dti);
    }

    public function storeHinges(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $hinges_id = $request->input('hinges');
        $config2 = Configuration2::find($config2_id);
        $hinges = Hinge::find($hinges_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->hinge_id)
            $config2->price -= $config2->hinge->price;

        $config2->hinge_id = $hinges_id;

        $config2->price += $hinges->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('classic_config_doorstep_create');
    }

    public function createDoorstep()
{
    $language = $this->setLanguage();

    $config2_id=session('id');
    $config2 = Configuration2::find($config2_id);
    $dti = $config2->basicConfiguration->door_type_id;

    $doorsteps = Doorstep::where('door_type_id',$dti)->get();

    return view('frontend.configurations.doorstep')->withLanguage($language)->withConfig2($config2)->withDoorsteps($doorsteps)->withDti($dti);
}

    public function storeDoorstep(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $doorstep_id = $request->input('doorstep');
        $config2 = Configuration2::find($config2_id);
        $doorstep = Doorstep::find($doorstep_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->doorstep_id)
            $config2->price -= $config2->doorstep->price;

        $config2->doorstep_id = $doorstep_id;

        $config2->price += $doorstep->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('classic_config_doorlock_kind_create');
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

        return redirect()->route('classic_config_doorlock_type_create');
    }

    public function createDoorlockType()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $doorlockTypes = DoorlockType::where('door_type_id',$dti)->get();

        return view('frontend.configurations.doorlock_type')->withLanguage($language)->withConfig2($config2)->withDoorlockTypes($doorlockTypes)->withDti($dti);
    }

    public function storeDoorlockType(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $doorlock_type_id = $request->input('doorlock_type');
        $config2 = Configuration2::find($config2_id);
        $doorlock_type = DoorlockType::find($doorlock_type_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->doorlock_type_id)
            $config2->price -= $config2->doorlockType->price;

        $config2->doorlock_type_id = $doorlock_type_id;

        $config2->price += $doorlock_type->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('classic_config_door_handle_create');
    }

    public function createDoorHandle()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $doorHandles = DoorHandle::where('door_type_id',$dti)->get();

        return view('frontend.configurations.door_handle')->withLanguage($language)->withConfig2($config2)->withDoorHandles($doorHandles)->withDti($dti);
    }

    public function storeDoorHandle(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $door_handle_id = $request->input('door_handle');
        $config2 = Configuration2::find($config2_id);
        $door_handle = DoorHandle::find($door_handle_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->door_handle_id)
            $config2->price -= $config2->doorHandle->price;

        $config2->door_handle_id = $door_handle_id;

        $config2->price += $door_handle->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('classic_config_opening_way_create');
    }

    public function createOpeningWay()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $openingWays = OpeningWay::where('door_type_id',$dti)->get();

        return view('frontend.configurations.opening_way')->withLanguage($language)->withConfig2($config2)->withOpeningWays($openingWays)->withDti($dti);
    }

    public function storeOpeningway(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $opening_way_id = $request->input('opening_way');
        $config2 = Configuration2::find($config2_id);

        $config2->opening_way_id = $opening_way_id;

        $config2->update();
        session(['id' => $config2_id]);

        $dti = $config2->basicConfiguration->door_type_id;
        if($dti ==1)
        return redirect()->route('classic_config_ventilation_grid_create');
        elseif($dti == 2)
        return redirect()->route('classic_config_stopper_create');

    }

    public function createVentilationGrid()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $ventilationGrids = VentilationGrid::where('door_type_id',$dti)->get();

        return view('frontend.configurations.ventilation_grid')->withLanguage($language)->withConfig2($config2)->withVentilationGrids($ventilationGrids)->withDti($dti);
    }

    public function storeVentilationGrid(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $ventilation_grid_id = $request->input('ventilation_grid');
        $config2 = Configuration2::find($config2_id);
        $ventilation_grid = VentilationGrid::find($ventilation_grid_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->ventilation_grid_id)
            $config2->price -= $config2->ventilationGrid->price;

        $config2->ventilation_grid_id = $ventilation_grid_id;

        $config2->price += $ventilation_grid->price;
        $config2->update();
        session(['id' => $config2_id]);

        return redirect()->route('classic_config_stopper_create');

    }

    public function createStopper()
    {
        $language = $this->setLanguage();

        $config2_id=session('id');
        $config2 = Configuration2::find($config2_id);
        $dti = $config2->basicConfiguration->door_type_id;

        $stoppers = Stopper::where('door_type_id',$dti)->get();

        return view('frontend.configurations.stopper')->withLanguage($language)->withConfig2($config2)->withStoppers($stoppers)->withDti($dti);
    }

    public function storeStopper(Request $request)
    {
        $config2_id=$request->input('config2_id');
        $stopper_id = $request->input('stopper');
        $config2 = Configuration2::find($config2_id);
        $stopper = Stopper::find($stopper_id);

        //brisanje stare cene, ako korisnik klikne back
        if($config2->stopper_id)
            $config2->price -= $config2->stopper->price;

        $config2->stopper_id = $stopper_id;

        $config2->price += $stopper->price;
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
