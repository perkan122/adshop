<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;
use App\DoorModel;
use App\BasicConfiguration;
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
use App\Track;
use App\DoorType;
use App\Configuration2;
use App\Configuration;
use Cart;
use App\Assembly;
use App\Disassembly;

use Illuminate\Support\Facades\Session;

class ConfigurationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createModel()
    {
        $language = $this->setLanguage();
        $models = DoorModel::all();

        return view('frontend.configurations.configuration_create')->withLanguage($language)->withModels($models);
    }

    public function storeModel(Request $request){


        $door_model_id = $request->input('door_model');

        session(['door_model' => $door_model_id]);

        return redirect()->route('configuration_type_create');

    }

    public function createType()
    {
        $language = $this->setLanguage();
        $door_model_id=session('door_model');
        $doorTypes = DoorType::where('door_model_id', $door_model_id)->get();

        return view('frontend.configurations.configuration_type')->withLanguage($language)->withDoorTypes($doorTypes)->withDmi($door_model_id);


    }

    public function storeType(Request $request){

        $door_type_id = $request->input('door_type');

        session(['door_type' => $door_type_id]);

        return redirect()->route('configuration_dimensions_create');
    }

    public function createDimensions()
    {
        $language = $this->setLanguage();
        $door_type_id=session('door_type');
        $basicConfigurations = BasicConfiguration::where('door_type_id', $door_type_id)->get();

        return view('frontend.configurations.dimensions')->withLanguage($language)->withBasicConfigurations($basicConfigurations);


    }

    public function storeDimensions(Request $request)
    {
        $basicConfiguration_id = $request->input('basicConfiguration');
        $basicConfiguration = BasicConfiguration::find($basicConfiguration_id);

        $configuration2 = new Configuration2();
        $configuration2->basic_configuration_id = $basicConfiguration_id;
        $configuration2->price = $basicConfiguration->price;
        $configuration2->save();
        $config2_id = $configuration2->id;
        session(['id' => $config2_id]);
        $door_type = $basicConfiguration->door_type_id;
        if($door_type == 1 || $door_type ==2)
        return redirect()->route('classic_config_filing_create');
        elseif ($door_type == 3)
         return redirect()->route('ambar_config_filing_create');

    }

    public function configurationDetails($id)
    {
        $config = Configuration::find($id);
        //generisanje privremene config2 koja ce se menjati
        $config2 = new Configuration2();
        $config2->basic_configuration_id = $config->basic_configuration_id;
        $config2->door_leaf_filling_id = $config->door_leaf_filling_id;
        $config2->final_treatment_id = $config->final_treatment_id;
        $config2->kanelura_id = $config->kanelura_id;
        $config2->pervajz_wall_width_id =  $config->pervajz_wall_width_id;
        $config2->hinge_id = $config->hinge_id;
        $config2->doorstep_id = $config->doorstep_id;
        $config2->doorlock_kind_id = $config->doorlock_kind_id;
        $config2->doorlock_type_id = $config->doorlock_type_id;
        $config2->door_handle_id = $config->door_handle_id;
        $config2->opening_way_id = $config->opening_way_id;
        $config2->track_id = $config->track_id;
        $config2->ventilation_grid_id = $config->ventilation_grid_id;
        $config2->stopper_id = $config->stopper_id;
        $config2->price = $config->price;
        $config2->save();
        $config2_id = $config2->id;
        session(['id' => $config2_id]);
        return redirect()->route('created_configuration', $config2_id );
    }


        public function createdConfiguration($id)
    {
        $language = $this->setLanguage();

        $config2 = Configuration2::find($id);
        $dti=$config2->basicConfiguration->door_type_id;

        $basicConfigurations = BasicConfiguration::where('door_type_id', $dti)->get();
        $filings = DoorLeafFilling::where('door_type_id',$dti)->get();
        $treatments = FinalTreatment::where('door_type_id',$dti)->get();
        $kaneluras = Kanelura::where('door_type_id',$dti)->get();
        $pervajzs = PervajzWallWidth::where('door_type_id',$dti)->get();
        $hinges = Hinge::where('door_type_id',$dti)->get();
        $doorsteps = Doorstep::where('door_type_id',$dti)->get();
        $doorlockKinds = DoorlockKind::where('door_type_id',$dti)->get();
        $doorlockTypes = DoorlockType::where('door_type_id',$dti)->get();
        $doorHandles = DoorHandle::where('door_type_id',$dti)->get();
        $openingWays = OpeningWay::where('door_type_id',$dti)->get();
        $ventilationGrids = VentilationGrid::where('door_type_id',$dti)->get();
        $stoppers = Stopper::where('door_type_id',$dti)->get();
        $tracks = Track::where('door_type_id',$dti)->get();
        $assemblies = Assembly::all();
        $disassemblies = Disassembly::all();

        return view('frontend.created_configuration')->withLanguage($language)->withConfig2($config2)->withAssemblies($assemblies)->withDisassemblies($disassemblies)
                                                        ->withBasicConfigurations($basicConfigurations)->withFilings($filings)->withTreatments($treatments)
                                                        ->withKaneluras($kaneluras)->withPervajzs($pervajzs)->withHinges($hinges)->withDoorsteps($doorsteps)
                                                        ->withDoorlockKinds($doorlockKinds)->withDoorlockTypes($doorlockTypes)
                                                        ->withDoorHandles($doorHandles)->withOpeningWays($openingWays)
                                                        ->withVentilationGrids($ventilationGrids)->withStoppers($stoppers)->withTracks($tracks);
    }

    function updateConfiguration(Request $request, $id){

        $config2 = Configuration2::find($id);

       //azuriranje dimenzija
        $basicConfiguration_id = $request->input('basicConfiguration');
        $basicConfiguration = BasicConfiguration::find($basicConfiguration_id);
        $config2->price -= $config2->basicConfiguration->price;
        $config2->basic_configuration_id = $basicConfiguration_id;
        $config2->price += $basicConfiguration->price;

        //azuriranje ispune vratnog krila
        $filing_id = $request->input('filing');
        $filing = DoorLeafFilling::find($filing_id);
        $config2->price -= $config2->doorLeafFilling->price;
        $config2->door_leaf_filling_id = $filing_id;
        $config2->price += $filing->price;

        //azuriranje zavrsne obrade
        $treatment_id = $request->input('treatment');
        $treatment = FinalTreatment::find($treatment_id);
        $config2->price -= $config2->finalTreatment->price;
        $config2->final_treatment_id = $treatment_id;
        $config2->price += $treatment->price;

        //azuriranje kanelura
        $kanelura_id = $request->input('kanelura');
        $kanelura = Kanelura::find($kanelura_id);
        $config2->price -= $config2->kanelura->price;
        $config2->kanelura_id = $kanelura_id;
        $config2->price += $kanelura->price;

        //azuriranje pervajza
        if($config2->pervajz_wall_width_id) {
            $pervajz_id = $request->input('pervajz');
            $pervajz = PervajzWallWidth::find($pervajz_id);
            $config2->price -= $config2->pervajzWallWidth->price;
            $config2->pervajz_wall_width_id = $pervajz_id;
            $config2->price += $pervajz->price;
        }

        //azuriranje sarki
        if($config2->hinge_id) {
            $hinges_id = $request->input('hinges');
            $hinges = Hinge::find($hinges_id);
            $config2->price -= $config2->hinge->price;
            $config2->hinge_id = $hinges_id;
            $config2->price += $hinges->price;
        }

        //azuriranje praga
        if($config2->doorstep_id) {
            $doorstep_id = $request->input('doorstep');
            $doorstep = Doorstep::find($doorstep_id);
            $config2->price -= $config2->doorstep->price;
            $config2->doorstep_id = $doorstep_id;
            $config2->price += $doorstep->price;
        }

        //azuriranje tipa brave
        $doorlock_kind_id = $request->input('doorlock_kind');
        $doorlock_kind = DoorlockKind::find($doorlock_kind_id);
        $config2->price -= $config2->doorlockKind->price;
        $config2->doorlock_kind_id = $doorlock_kind_id;
        $config2->price += $doorlock_kind->price;

        //azuriranje vrste brave
        if($config2->doorlock_type_id) {
            $doorlock_type_id = $request->input('doorlock_type');
            $doorlock_type = DoorlockType::find($doorlock_type_id);
            $config2->price -= $config2->doorlockType->price;
            $config2->doorlock_type_id = $doorlock_type_id;
            $config2->price += $doorlock_type->price;
        }

        //azuriranje kvake
        if($config2->door_handle_id) {
            $door_handle_id = $request->input('door_handle');
            $door_handle = DoorHandle::find($door_handle_id);
            $config2->price -= $config2->doorHandle->price;
            $config2->door_handle_id = $door_handle_id;
            $config2->price += $door_handle->price;
        }

        //azuriranje nacina otvaranja
        if($config2->opening_way_id) {
            $opening_way_id = $request->input('opening_way');
            $config2->opening_way_id = $opening_way_id;
        }

        //azuriranje ventilacione resetke
        if($config2->ventilation_grid_id) {
            $ventilation_grid_id = $request->input('ventilation_grid');
            $ventilation_grid = VentilationGrid::find($ventilation_grid_id);
            $config2->price -= $config2->ventilationGrid->price;
            $config2->ventilation_grid_id = $ventilation_grid_id;
            $config2->price += $ventilation_grid->price;
        }

        //azuriranje podnog stopera
        if($config2->stopper_id) {
            $stopper_id = $request->input('stopper');
            $stopper = Stopper::find($stopper_id);
            $config2->price -= $config2->stopper->price;
            $config2->stopper_id = $stopper_id;
            $config2->price += $stopper->price;
        }

        //azuriranje sine
        if($config2->track_id) {
            $track_id = $request->input('track');
            $track = Track::find($track_id);
            $config2->price -= $config2->track->price;
            $config2->track_id = $track_id;
            $config2->price += $track->price;
        }

        $config2->update();

        return back();
    }

    function addToCart(Request $request, $id){

        $language = $this->setLanguage();
        $config2 = Configuration2::find($id);
        $assembly_id = $request->input('assembly');
        $disassembly_id = $request->input('disassembly');

        $assembly = Assembly::find($assembly_id);
        $disassembly = Disassembly::find($disassembly_id);


        if($request->quant[1])
            $amount = $request->quant[1];
        else
            $amount = 1;
        $price = $config2->price + $assembly->price + $disassembly->price;
        if($language == 'sr')
        Session::flash('success', 'Uspešno ste dodali proizvod u korpu!');
        elseif ($language == 'en')
        Session::flash('success', 'You have successfully added the product to the cart!');

        Cart::add($config2->id, $config2->basicConfiguration->doorType->name, $amount, $price,['assembly' => $assembly_id, 'disassembly' => $disassembly_id]);

        return back();
    }

    function cartReview(){

        $language = $this->setLanguage();
        $numberOfCartRecords = Cart::total();
        $price = null;

        if($numberOfCartRecords == 0){
            return redirect()->route('index');
        }else{
            $cartItems = Cart::content();

            $configIdsArray = array();
            $configIdsString = "";
            $rowIdsString = "";
            $last_key = $cartItems->count();
            $counter = 0;

            foreach ($cartItems as $cartItem){
                $counter ++;


                $price += $cartItem->price * $cartItem->qty;

                array_push($configIdsArray, $cartItem->id);

                if($counter == $last_key){
                    $configIdsString .= $cartItem->id;
                    $rowIdsString .= $cartItem->rowId;
                }else{
                    $configIdsString .= $cartItem->id . ".";
                    $rowIdsString .= $cartItem->rowId . ".";
                }
            }

            $config2s = Configuration2::wherein('id', $configIdsArray)->get();
            $assemblies = Assembly::all();
            $disasseemblies = Disassembly::all();


            return view('frontend.cart_review')->withLanguage($language)->withCartItems($cartItems)->withConfig2s($config2s)->withCids($configIdsString)->withRowids($rowIdsString)->withPrice($price)->withAssemblies($assemblies)->withDisassemblies($disasseemblies);
        }
    }

    function updateCart(Request $request, $rowIdsString){

        $rowIdsArray = explode(".", $rowIdsString);


        foreach($rowIdsArray as $key => $rowId){
            $quantity = $request->input('quant')[$rowId];

            Cart::update($rowId, ['qty' => $quantity]);
        }




        return back();
    }

    function removeFromCart(Request $request, $rowId){

        Cart::remove($rowId);

        return back();

    }

    function checkout(){

        $numberOfCartRecords = Cart::total();

        if($numberOfCartRecords == 0){
            return redirect()->route('models');
        }else{
            $language = $this->setLanguage();

            $price = null;
            $cartItems = Cart::content();
            $configIdsArray = array();

            foreach ($cartItems as $cartItem){
                $price += $cartItem->price * $cartItem->qty;
                array_push($configIdsArray, $cartItem->id);
            }

            $config2s = Configuration2::wherein('id', $configIdsArray)->get();
            $assemblies = Assembly::all();
            $disasseemblies = Disassembly::all();

            return view('frontend.checkout')->withLanguage($language)->withCartItems($cartItems)->withConfig2s($config2s)->withPrice($price)->withAssemblies($assemblies)->withDisassemblies($disasseemblies);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
