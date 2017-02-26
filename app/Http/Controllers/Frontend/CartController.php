<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CheckOutRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use Cart;
use Auth;

class CartController extends Controller
{
    public function index(){
    	$categories=Category::where('parent_id',0)->get();

    	return view('frontend.shop.shoppingcart')->with(array('categories'=>$categories));
    }


    public function add($product_id){

    	$product = Product::find($product_id);
    	if(!$product_id){
    		abort(404);
    	}

    	Cart::add($product_id,$product->title,1,$product->price);

    	return redirect(route('frontend.shoppingcart'))
    	->with('flash_success',"Product Added!");
    }

    public function remove($product_id){

      }

    public function checkout(){
        $categories=Category::where('parent_id',0)->get();
    	return view('frontend.shop.checkout')->with(array('categories'=>$categories));
    }

    public function thankyou(){
        $categories=Category::where('parent_id',0)->get();
        return view('frontend.shop.thankyou')->with(array("categories"=>$categories));
    }

    public function checkout_process(CheckOutRequest $request){

       $categories=Category::where('parent_id',0)->get();//for side menu
        $data=$request->all();
         // dd($data);
        $customer_id=Auth::id();
        $order_total=Cart::total(2,".","");
        $products=Cart::content();
        // dd($products);

        $order=Order::create([
            'customer_id'=>$customer_id,
            'order_amount'=>$order_total,
            'order_address'=>$data['address'],
            'order_phone'=>$data['phone'],            
            'payment_method'=>$data['payment_method']
            ]);


        foreach($products as $product){
            OrderItem::create([

                 "order_id"=>$order->id,
                 "product_id"=>$product->id,
                 "order_item_amount"=>$product->price,
                 'qty'=>$product->qty

                 
                ]);
        }
          
          Cart::destroy();
        return redirect(route('frontend.thankyou'))->with("flash-success","Checkout Sucfully!");



    }

    
}
