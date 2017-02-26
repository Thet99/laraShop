<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Access\User\User;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index(){

    	// $orders=Order::paginate(2);
    	$orders = Order::join("users", "users.id", "=", "orders.customer_id");
    	$orders = $orders->select("orders.*", "users.name AS user")->orderBy("orders.created_at","ASC")->paginate(2);
    	return view('backend.orders.index')->with(array("orders"=>$orders));

    }

    public function create(){
    	 $users = User::all()->pluck("name","id");
    	 $products=Product::all()->pluck("title","id");
    	// $categories = Category::all()->pluck("title", "id");

    	return view("backend.orders.create")->with(array("users"=>$users,"products"=>$products));
    	
        
    }

    public function store(Request $request){

    	$data=$request->all();
    	$order=Order::create($data);
    	$products=$data['product_id'];
    	 // dd($products);
    	if(is_array($products)){
    		foreach($products as $product){
    			OrderItem::Create([
                      "order_id"=>$order->id,
                      "product_id"=>$product,
                      "order_item_amount"=>0
                     ]);
    		}
    	}
    	return redirect()->route('admin.orders.index')->withFlashSuccess("Order Created Successfully.");

    }

    public function edit($id){

    	$order = Order::find($id);

        if(!$order)
            abort(404);

        $users = User::all()->pluck("name", "id");
        $products = Product::all()->pluck("title", "id");

        return view("backend.products.edit")->with(array("product"=>$product, "users"=>$users));

    }

    public function update($id, UpdateOrderRequest $request){
        $data = $request->all();

        $order = Order::find($id);

        if(!$order)
            abort(404);

        $order->update($data);

        return redirect()->back()->with("flash_success", "Updated Successfully.");
    }

    public function show($id){
    	$order_items=OrderItem::join('products','products.id',"=","order_items.product_id")->join("orders","orders.id","=","order_items.order_id")
    	->join("users","users.id","=","orders.customer_id")
    	// ->where('order_items.order_id',$id)
    	->select("order_items.*","users.name As customer","products.title As product_title","products.price AS product_price","orders.order_amount AS order_amount")
    	->paginate(5);
    	return view("backend.orders.show")->with(array("order_items"=>$order_items));
    }

    public function destory(){

    }

    
}
