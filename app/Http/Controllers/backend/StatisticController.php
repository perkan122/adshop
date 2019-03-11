<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Configuration;
use Session;

class StatisticController extends Controller
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
    public function index(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $from_date = new \DateTime($from);
        $to_date = new \DateTime($to);
        if ($to_date < $from_date){
            Session::flash('date_format_incorrect', 'Vremenski period nije validan!');
            return redirect()->route('statistics.create');
        }

        $number_of_orders = Order::whereBetween('updated_at', array($from, $to))->count();
        if ($number_of_orders ==0){
            Session::flash('no_orders', 'Nema evidentiranih narudžbina za odabrani period!');
            return redirect()->route('statistics.create');
        }
        $salary = Order::whereBetween('updated_at', array($from, $to))->sum('total_price');
        $configurations = Configuration::whereBetween('updated_at', array($from, $to))->orderBy('sold_quantity', 'desc')->get();
        return view('backend.statistics_details')
            ->withFrom($from)
            ->withTo($to)
            ->withConfigurations($configurations)
            ->withNumberOfOrders($number_of_orders)
            ->withSalary($salary);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.statistics');
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
}
