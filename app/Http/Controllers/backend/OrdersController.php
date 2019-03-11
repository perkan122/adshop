<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Mail;
use Session;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index(){

        $orders = Order::orderBy('id', 'desc')->get();

    	return view('backend.orders')
            ->withOrders($orders);
    }

    function edit($id){

        $order = Order::find($id);
        $orderItems = OrderItem::where('order_id', $id)->get();
        $i=1;

        return view('backend.order_details')
            ->withOrder($order)
            ->with('orderItems', $orderItems)->withI($i);
    }

    function update($id){

        Order::where('id', $id)->update(['order_status' => '1']);
        $order = Order::find($id);
        $data = [
            'order' => $order,
            ];

        Mail::send('frontend.partials.email2', $data, function($message) use ($order){
            $message->to($order->customer->email, $order->customer->name . ' ' . $order->customer->surname)->subject('Наруџбина');
            $message->from('shop@ka-tex.rs', 'KaTex online shop');
        });

        Session::flash('order_status_changed', 'Наруџбина (id - ' . $order->id .') одобрена!');

        return redirect()->route('orders');
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
}
