<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Customer;
use App\Configuration2;
use App\Configuration;
use App\OrderItem;
use App\Order;
use Cart;
use Session;
use App\Mail\OrderSaved;
use App\Mail\NewOrder;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function conditions(){

        $language = App::getLocale();;

        return view('frontend.partials.conditions')->withLanguage($language);
    }

    public function billing(Request $request){

        //server side validation
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'post_number' => 'required'
        ]);


                $customer_id = null;
                $customer = null;
                $doCustomerExists = Customer::where('email', $request->email)->count();

                if($doCustomerExists >= 1){
                    //azuriranje podataka o postojecem kupcu
                    $customer = Customer::where('email', $request->email)->first();
                    $customer->name = $request->name;
                    $customer->surname = $request->surname;
                    $customer->address = $request->address;
                    $customer->apartment = $request->apartment;
                    $customer->city = $request->city;
                    $customer->post_number = $request->post_number;
                    $customer->telephone = $request->telephone;
                    $customer->save();
                    $customer_id = $customer->id;
                }else{
                    //kreiranje novog kupca
                    $customer = new Customer();
                    $customer->name = $request->name;
                    $customer->surname = $request->surname;
                    $customer->email = $request->email;
                    $customer->address = $request->address;
                    $customer->apartment = $request->apartment;
                    $customer->city = $request->city;
                    $customer->post_number = $request->post_number;
                    $customer->telephone = $request->telephone;

                    $customer->save();
                    $customer_id = $customer->id;
                }

                //Unosenje narudzbine u bazu
                $order = new Order();
                $order->customer_id = $customer_id;
                $order->total_price = Cart::subtotal(2, ',', '.');
                $order->payment_status = 0;
                $order->shipping_address = $request->address;
                $order->shipping_apartment = $request->apartment;
                $order->shipping_city = $request->city;
                $order->order_status = 0;
                $order->additional_note = $request->additional_note;
                $order->save();
                $order_id = $order->id;

                //Cuvanje id-ja narudzbenice u sesiji
                session(['order_id' => $order_id]);

                //Unosenje stavki narudzbenice u bazu
                $cartItems = Cart::content();
                $last_key = $cartItems->count();
                $config2IdsString = "";
                $counter = 0;

                foreach ($cartItems as $cartItem) {
                    $counter ++;

                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order_id;

                    //provera da li vec postoji izabrana config
                    $config2 = Configuration2:: find($cartItem->id)->first();
                    $config = Configuration::where([
                    ['basic_configuration_id', '=' , $config2->basic_configuration_id ],
                    ['door_leaf_filling_id', '=' , $config2->door_leaf_filling_id ],
                    ['final_treatment_id', '=' , $config2->final_treatment_id ],
                    ['kanelura_id', '=' , $config2->kanelura_id ],
                    ['pervajz_wall_width_id', '=' , $config2->pervajz_wall_width_id ],
                    ['hinge_id', '=' , $config2->hinge_id ],
                    ['doorstep_id', '=' , $config2->doorstep_id ],
                    ['doorlock_kind_id', '=' , $config2->doorlock_kind_id ],
                    ['doorlock_type_id', '=' , $config2->doorlock_type_id ],
                    ['door_handle_id', '=' , $config2->door_handle_id ],
                    ['opening_way_id', '=' , $config2->opening_way_id ],
                    ['track_id', '=' , $config2->track_id ],
                    ['ventilation_grid_id', '=' , $config2->ventilation_grid_id ],
                    ['stopper_id', '=' , $config2->stopper_id ]
                    ])->first();

                    if($config){
                        $orderItem->configuration_id = $config->id;
                        $config->sold_quantity ++;
                        $config->update();
                    }
                    else
                    {
                        $newConfig = new Configuration();
                        $newConfig->basic_configuration_id= $config2->basic_configuration_id;
                        $newConfig->door_leaf_filling_id= $config2->door_leaf_filling_id;
                        $newConfig->final_treatment_id= $config2->final_treatment_id;
                        $newConfig->kanelura_id= $config2->kanelura_id;
                        $newConfig->pervajz_wall_width_id= $config2->pervajz_wall_width_id;
                        $newConfig->hinge_id= $config2->hinge_id;
                        $newConfig->doorstep_id= $config2->doorstep_id;
                        $newConfig->doorlock_kind_id= $config2->doorlock_kind_id;
                        $newConfig->doorlock_type_id= $config2->doorlock_type_id;
                        $newConfig->door_handle_id= $config2->door_handle_id;
                        $newConfig->opening_way_id= $config2->opening_way_id;
                        $newConfig->track_id= $config2->track_id;
                        $newConfig->ventilation_grid_id= $config2->ventilation_grid_id;
                        $newConfig->stopper_id= $config2->stopper_id;
                        $newConfig->price= $config2->price;
                        $newConfig->sold_quantity = 1;
                        $newConfig->naslovna = 0;
                        $newConfig->save();

                        $orderItem->configuration_id = $newConfig->id;
                    }

                    $orderItem->disassembly_id = $cartItem->options['disassembly'];
                    $orderItem->assembly_id = $cartItem->options['assembly'];
                    $orderItem->quantity = $cartItem->qty;
                    $orderItem->item_price = $cartItem->price;
                    $orderItem->save();

                    if($counter == $last_key){
                        $config2IdsString .= $config2->id;
                    }else{
                        $config2IdsString .= $config2->id . ".";
                    }
                }

                //slanje e-mailova
            Mail::to($order->customer)->send(new OrderSaved($order));
          //  Mail::to('activedesign.shop@gmail.com')->send(new NewOrder($order));

               //Redirekcija
               return redirect()->route('shoppingResult', $config2IdsString);

    }

    function shoppingResult($config2IdsString){

        if(session('order_id') === null){
            return redirect()->route('models');
        }

        $language = $this->setLanguage();
        $orderId = session('order_id');
        $config2IdsArray = explode(".", $config2IdsString);


        //Praznjenje korpe
        Cart::destroy();

        //brisanje iz table configuration2
        $config2s = Configuration2::wherein('id', $config2IdsArray)->delete();

        session()->forget('order_id');


        return view('frontend.shopping_result')->withLanguage($language)->withOrderId($orderId);

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
