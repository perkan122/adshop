<?php

namespace App\Http\Controllers\backend;

use App\Mail\OrderConfirm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Mail;
use Session;
use PDF;

class OrderController extends Controller
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
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.orders')
            ->withOrders($orders);
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
        $order = Order::find($id);
        $orderItems = OrderItem::where('order_id', $id)->get();
        $i=1;
        return view('backend.order_details')
            ->withOrder($order)
            ->with('orderItems', $orderItems)->withI($i);
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
        $order = Order::find($id);
        if ($order->order_status == 0){
            Order::where('id', $id)->update(['order_status' => 1]);
            Session::flash('order_status_changed', 'Narudžbina (id - ' . $order->id .') je odobrena!');
            //priprema fakture i slanje emaila
            $this->export_pdf($order->id);
            Mail::to($order->customer)->send(new OrderConfirm($order));
        }
        if ($order->order_status == 1){
            Order::where('id', $id)->update(['order_status' => 2]);
            Session::flash('order_status_changed', 'Narudžbina (id - ' . $order->id .') je isporučena!');
        }
        return redirect()->route('orders.index');
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
    public function export_excel(Request $request)
    {
        return Excel::load('templates/Bill.xls', function($excel) {
            $data = array(
                array('data1', 'data2'),
                array('data3', 'data4')
            );
            $excel->sheet('Sheet1', function ($sheet)use($data){
                //opis parametara metode ->fromArray($source, $nullValue, $startCell, $strictNullComparison, $headingGeneration)
                //https://laravel-excel.maatwebsite.nl/docs/2.1/export/array
                $sheet->fromArray($data, null, 'B2', false, false);
            });
        })->export('xls');
    }

    public function export_word(Request $request)
    {

        $template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/Bill.docx');
        $test = "test_value";
        $template->setValue("test",$test);
        //ovo treba podesiti da se cuva u folderu za racune i da se u nazivu doda broj narudzbine
        $template->saveAs('../templates/Bill_test.docx');

        return response()->download("../templates/Bill_test.docx");
    }
    public function export_pdf($id)
    {
        $order = Order::find($id);
        $orderItems = OrderItem::where('order_id', $id)->get();
        $i=1;
        $pdf = PDF::loadView('backend.invoice', compact('order','orderItems','i'))->setPaper('a4', 'landscape');
        $pdf->save( 'invoices/Ponuda_broj_'.$order->id.'.pdf' );
        return $pdf->download('Ponuda_broj_'.$order->id.'.pdf');
    }


}
