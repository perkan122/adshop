<?php

namespace App\Http\Controllers\backend;
use App;
use App\Assembly;
use App\BasicConfiguration;
use App\Configuration;
use App\Configuration2;
use App\Disassembly;
use App\DoorHandle;
use App\DoorLeafFilling;
use App\DoorlockKind;
use App\DoorlockType;
use App\Doorstep;
use App\FinalTreatment;
use App\Hinge;
use App\Kanelura;
use App\Mail\OrderConfirm;
use App\OpeningWay;
use App\PervajzWallWidth;
use App\Stopper;
use App\Track;
use App\VentilationGrid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Mail;
use function PhpParser\filesInDir;
use Session;
use PDF;

class OrderItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $language = $this->setLanguage();
        $orderItem = OrderItem::find($id);
        $dti=$orderItem->configuration->basicConfiguration->door_type_id;
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
        return view('backend.order_item_edit')->withLanguage($language)->withOrderItem($orderItem)->withAssemblies($assemblies)->withDisassemblies($disassemblies)
            ->withBasicConfigurations($basicConfigurations)->withFilings($filings)->withTreatments($treatments)
            ->withKaneluras($kaneluras)->withPervajzs($pervajzs)->withHinges($hinges)->withDoorsteps($doorsteps)
            ->withDoorlockKinds($doorlockKinds)->withDoorlockTypes($doorlockTypes)
            ->withDoorHandles($doorHandles)->withOpeningWays($openingWays)
            ->withVentilationGrids($ventilationGrids)->withStoppers($stoppers)->withTracks($tracks);
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
        $orderItem = OrderItem::find($id);
        $orderItemPrice = $orderItem->item_price;
        //trenutna konfiguracija iz ordera
        $configOrderItem = Configuration::find($orderItem->configuration->id);

        //Montaza i demontaza i kolicina
        $assembly_id = $request->input('assembly');
        $disassembly_id = $request->input('disassembly');
        $assembly = Assembly::find($assembly_id);
        $disassembly = Disassembly::find($disassembly_id);
        if($request->quant[1])
            $amount = $request->quant[1];
        else
            $amount = 1;

        //izmerena sirina i visina
        $width = $request->input('width');
        $height = $request->input('height');

        $configInput = Configuration::where([
            ['basic_configuration_id', '=' , $request->input('basicConfiguration') ],
            ['door_leaf_filling_id', '=' , $request->input('filing') ],
            ['final_treatment_id', '=' , $request->input('treatment') ],
            ['kanelura_id', '=' , $request->input('kanelura') ],
            ['pervajz_wall_width_id', '=' , $request->input('pervajz') ],
            ['hinge_id', '=' , $request->input('hinges') ],
            ['doorstep_id', '=' , $request->input('doorstep')],
            ['doorlock_kind_id', '=' , $request->input('doorlock_kind') ],
            ['doorlock_type_id', '=' , $request->input('doorlock_type') ],
            ['door_handle_id', '=' , $request->input('door_handle') ],
            ['opening_way_id', '=' , $request->input('opening_way') ],
            ['track_id', '=' , $request->input('track') ],
            ['ventilation_grid_id', '=' , $request->input('ventilation_grid') ],
            ['stopper_id', '=' , $request->input('stopper') ]
        ])->first();

        //generisanje privremene config2 koja cuva unesene vrednosti
        $config2 = new Configuration2();
        $config2->basic_configuration_id = $request->input('basicConfiguration');
        $config2->door_leaf_filling_id = $request->input('filing');
        $config2->final_treatment_id = $request->input('treatment');
        $config2->kanelura_id = $request->input('kanelura');
        $config2->pervajz_wall_width_id =  $request->input('pervajz');
        $config2->hinge_id = $request->input('hinges');
        $config2->doorstep_id = $request->input('doorstep');
        $config2->doorlock_kind_id = $request->input('doorlock_kind');
        $config2->doorlock_type_id = $request->input('doorlock_type');
        $config2->door_handle_id = $request->input('door_handle');
        $config2->opening_way_id = $request->input('opening_way');
        $config2->track_id = $request->input('track');
        $config2->ventilation_grid_id = $request->input('ventilation_grid');
        $config2->stopper_id = $request->input('stopper');

        //Racunanje cene unete  konfiguracije
        $price = 0;

        $basicConfiguration_id = $request->input('basicConfiguration');
        $basicConfiguration = BasicConfiguration::find($basicConfiguration_id);
        $price += $basicConfiguration->price;
        
        $filing_id = $request->input('filing');
        $filing = DoorLeafFilling::find($filing_id);
        $price += $filing->price;

        $treatment_id = $request->input('treatment');
        $treatment = FinalTreatment::find($treatment_id);
        $price += $treatment->price;


        $kanelura_id = $request->input('kanelura');
        $kanelura = Kanelura::find($kanelura_id);
        $price += $kanelura->price;

        if($config2->pervajz_wall_width_id) {
            $pervajz_id = $request->input('pervajz');
            $pervajz = PervajzWallWidth::find($pervajz_id);
            $price += $pervajz->price;
        }

        if($config2->hinge_id) {
            $hinges_id = $request->input('hinges');
            $hinges = Hinge::find($hinges_id);
            $price += $hinges->price;
        }

        if($config2->doorstep_id) {
            $doorstep_id = $request->input('doorstep');
            $doorstep = Doorstep::find($doorstep_id);
            $price += $doorstep->price;
        }

        $doorlock_kind_id = $request->input('doorlock_kind');
        $doorlock_kind = DoorlockKind::find($doorlock_kind_id);
        $price += $doorlock_kind->price;

        if($config2->doorlock_type_id) {
            $doorlock_type_id = $request->input('doorlock_type');
            $doorlock_type = DoorlockType::find($doorlock_type_id);
            $price += $doorlock_type->price;
        }

        if($config2->door_handle_id) {
            $door_handle_id = $request->input('door_handle');
            $door_handle = DoorHandle::find($door_handle_id);
            $price += $door_handle->price;
        }

        if($config2->opening_way_id) {
            $opening_way_id = $request->input('opening_way');
            $config2->opening_way_id = $opening_way_id;
        }

        if($config2->ventilation_grid_id) {
            $ventilation_grid_id = $request->input('ventilation_grid');
            $ventilation_grid = VentilationGrid::find($ventilation_grid_id);
            $price += $ventilation_grid->price;
        }

        if($config2->stopper_id) {
            $stopper_id = $request->input('stopper');
            $stopper = Stopper::find($stopper_id);
            $price += $stopper->price;
        }

        if($config2->track_id) {
            $track_id = $request->input('track');
            $track = Track::find($track_id);
            $price += $track->price;
        }

        $config2->price = $price;
        $config2->save();

        if ($configInput){
            //sold ++
            $configInput->sold_quantity ++;
            $configInput->update();

            //azuriranje order itema
            $orderItem->configuration_id = $configInput->id;
            $orderItem->assembly_id = $assembly_id;
            $orderItem->disassembly_id = $disassembly_id;
            $orderItem->quantity = $amount;
            $orderItem->item_price = ($config2->price + $assembly->price + $disassembly->price)*$amount;
            $orderItem->width = $width;
            $orderItem->height = $height;
            $orderItem->update();
        }
        else{
            //Kreiranje nove konfiguracije
            $newConfig = new Configuration();
            $newConfig->basic_configuration_id = $request->input('basicConfiguration');
            $newConfig->door_leaf_filling_id = $request->input('filing');
            $newConfig->final_treatment_id = $request->input('treatment');
            $newConfig->kanelura_id = $request->input('kanelura');
            $newConfig->pervajz_wall_width_id =  $request->input('pervajz');
            $newConfig->hinge_id = $request->input('hinges');
            $newConfig->doorstep_id = $request->input('doorstep');
            $newConfig->doorlock_kind_id = $request->input('doorlock_kind');
            $newConfig->doorlock_type_id = $request->input('doorlock_type');
            $newConfig->door_handle_id = $request->input('door_handle');
            $newConfig->opening_way_id = $request->input('opening_way');
            $newConfig->track_id = $request->input('track');
            $newConfig->ventilation_grid_id = $request->input('ventilation_grid');
            $newConfig->stopper_id = $request->input('stopper');
            $newConfig->price = $config2->price;
            $newConfig->sold_quantity = 1;
            $newConfig->naslovna = 0;
            $newConfig->save();

            // umanjenje prodate kolicine prethodne konfiguracije
            $configOrderItem->sold_quantity --;
            $configOrderItem->update();

            //azuriranje order itema
            $orderItem->configuration_id = $newConfig->id;
            $orderItem->assembly_id = $assembly_id;
            $orderItem->disassembly_id = $disassembly_id;
            $orderItem->quantity = $amount;
            $orderItem->item_price = ($config2->price + $assembly->price + $disassembly->price)*$amount;
            $orderItem->width = $width;
            $orderItem->height = $height;
            $orderItem->update();
        }

        //brisanje config 2
        $config2->delete();

        //azuriranje ordera
        $order = Order::find($orderItem->order->id);
        $order->total_price  -= $orderItemPrice;
        $order->total_price  += $orderItem->item_price;
        $order->update();

        return redirect()->route('order_items.edit', $id);
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
