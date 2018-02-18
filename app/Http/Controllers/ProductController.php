<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use App\Order;
use Auth;

class ProductController extends Controller
{
    public function getIndex(){

    	$products = Product::all();
    	 return view('shop.index',compact('products'));
    }

    public function getAddToCart(Request $request, $id){

    	$product = Product::find($id);

    	$oldCart = Session::has('cart') ? Session::get('cart') : null;

    	$cart = new Cart($oldCart);
    	$cart->add($product,$product->id);

    	$request->session()->put('cart',$cart);
    	//dd( $request->session()->get('cart') );
    	return redirect()->route('index');

    }

    public function getCart(){
        if( !Session::has('cart') ){
            return view('shop.shoppingcart',[ 'products' => null ]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart( $oldCart );

        return view('shop.shoppingcart',['products' => $cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function getRemoveFromCart(Request $request, $id){

        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->remove($product,$product->id);

        $request->session()->put('cart',$cart);

        if( $cart->totalQty == 0 ){
            $request->session()->forget('cart');
            Session::flash('success','No items are available!');
        }

        //dd( $request->session()->get('cart') );
        //return redirect()->route('index');
        return redirect()->route('shoppingcart');

    }

    public function getRemoveAllCart(Request $request, $id){

        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->removeall($product,$product->id);

        $request->session()->put('cart',$cart);

        if( $cart->totalQty == 0 ){
            $request->session()->forget('cart');
            Session::flash('success','No items are available!');
        }



        //dd( $request->session()->get('cart') );
        //return redirect()->route('index');
        return redirect()->route('shoppingcart');

    }

    public function getCheckout(){

        if( !Session::has('cart') ){
            return route('shoppingcart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart( $oldCart );
        $total = $cart->totalPrice;

        return view('shop.checkout',compact('total'));


    }

    public function postCheckout(Request $request){

        //Request is from the form field of checkout

        if( !Session::has('cart') ){
            return route('shoppingcart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart( $oldCart );

        $order = new Order();
        $order->cart = serialize($cart);
        $order->name    = $request->input('name'); 
        $order->address = $request->input('address');
        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('profile')->with(Session::flash('success','Successfully purchased products!'));
    }

   

}
