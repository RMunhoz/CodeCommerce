<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class CheckoutController extends Controller
{

    public function place(Order $orderModel, OrderItem $orderItem)
    {
    	if(!Session::has('cart'))
    	{
    		return false;
    	}

    	$cart = Session::get('cart');

    	if($cart->getTotal() > 0){

    		$order = $orderModel->create(['user_id'=>Auth::user()->id, 'total'=>$cart->getTotal()]);

    		foreach($cart->all() as $k=>$item){
    			$order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
    		}

            $cart->clear();

            $categories = Category::all();
            $products = Product::all();

            event(new CheckoutEvent(Auth::user(), $order));
    		
            return view('store.checkout', compact('order', 'cart','products', 'categories'));
    	}

        $categories = Category::all();
        $products = Product::all();

        return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories, 
                                        'products'=>$products]);
    }
}
