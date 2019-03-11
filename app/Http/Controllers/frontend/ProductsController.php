<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function cartReview(){

        $language = $this->setLanguage();
      /*  $numberOffCartRecords = Cart::total();
        $price = null;

        if($numberOffCartRecords == 0){
            return redirect()->action('frontend\ProductsController@shop');
        }else{
            $cartProducts = Cart::content();

            $productIdsArray = array();
            $productIdsString = "";
            $rowIdsString = "";
            $last_key = $cartProducts->count();
            $counter = 0;

            foreach ($cartProducts as $cartProduct){
                $counter ++;

                $price += $cartProduct->price * $cartProduct->qty;

                array_push($productIdsArray, $cartProduct->id);

                if($counter == $last_key){
                    $productIdsString .= $cartProduct->id;
                    $rowIdsString .= $cartProduct->rowId;
                }else{
                    $productIdsString .= $cartProduct->id . ".";
                    $rowIdsString .= $cartProduct->rowId . ".";
                }
            }

            $products = Product::wherein('id', $productIdsArray)->get();
            $categories = Category::where('superCategory_id', null)->get();
            $subcategories = $this->subcategories();
            $bestSelling = Product::where('category_id', '1')->where('isActive', true)->orderByRaw("RAND()")->take(5)->get();

            return view('frontend.cart_review')->withLanguage($language)->withCartproducts($cartProducts)->withCategories($categories)
                ->withSubcategories($subcategories)->withBests($bestSelling)->withPids($productIdsString)->withRowids($rowIdsString)->withPrice($price);
        }*/
return view('frontend.cart_review')->withLanguage($language);
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
