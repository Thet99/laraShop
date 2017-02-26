<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\SentMessageRequest;
use Input;
use Mail;
/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{   
		// $categories=Category::where("parent_id",0)->get();
		// $categories=Category::nested()->get();
		// dd($categories);
		// $categories_html=Category::renderAsHtml();
		
		 $products=Product::where("category_id",23)->get();
		  // dd($categories);
		return view('frontend.index')->with(array("products"=>$products));
	}


	public function products()
	{   
		// $categories=Category::where("parent_id",0)->get();


        $keyword=Input::get('q');
		$category_id=Input::get("category");
		$category=NULL;
		$category=Category::find($category_id);

		$products=Product::join("categories","categories.id","=","products.category_id");

		if($category){
			$products=$products->where("products.category_id",$category_id);

		  // dd($categories);
		}


		if($keyword){
			$products = $products->where("products.title","like","%".$keyword."%");
		}


		$products=$products->orderBy("created_at","Desc")->select("products.*","categories.title AS category_title")->paginate(16);

		return view('frontend.products.index')->with(array("products"=>$products,"category"=>$category,"key"=>$keyword));
	}
     

     public function product_detail($id){
     	$product=Product::find($id);

     	if(empty($product))
     		abort(404);
     	$categories=Category::where("parent_id",0)->get();

     	$product= Product::join("users", "users.id", "=", "products.user_id")
     	->join("categories", "categories.id", "=", "products.category_id")
     	->where('products.id',$id)
    	->select("products.*", "users.name AS user", "categories.title AS category")
    	->first();   	

    	return view('frontend.products.detail')->with(array("product"=>$product));

     }
     public function contact(){

     	// $categories=Category::where("parent_id",0)->get();

     	return view('frontend.contact');
     }

     public function faq(){
     	// $categories=Category::where("parent_id",0)->get();
     	return view('frontend.faq');
     }

     public function sent_message(SentMessageRequest $request){
     	$data=$request->all();
     	Mail::send("frontend.email.contactmessage",$data,function ($message){
     		$recepient_mail="atlas.knos@gmail.com";
     		$message->to($recepient_mail);
     		$message->subject("Message From LaraShop");
     	});

     	return redirect(route('frontend.contact'))->with("flash_success","Mail Successfully Sent");
     }

	/** 
	 * @return \Illuminate\View\View
	 */
	
}
