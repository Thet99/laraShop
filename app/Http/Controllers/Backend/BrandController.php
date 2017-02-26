<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Auth;
use Image;

class BrandController extends Controller
{
    public function index(){

    	$brands = Brand::paginate(10);

    	return view('backend.brands.index')->with(array('brands'=>$brands));


    }

    public function create(){

    	$brands = Brand::all()->pluck('name','id');
    	$users = User::all()->pluck("name","id");
    	$categories = Category::all()->pluck("title", "id");
    	$products = Product::all()->pluck("title", "id");

        return view('backend.brands.create')->with(array('users'=>$users, 'categories'=>$categories,'products'=>$products));

    }

    
    	public function store(CreateBrandRequest $request){
    	$data = $request->all();
        if(isset($_FILES['logo'])){
        $img=Image::make($_FILES['logo']['tmp_name']);
        $img->resize(800,640);
        $img_name=time().".jpg";
        $img->save(public_path("uploads/brands/".$img_name));
        $data["logo"]=$img_name;
        }
            $data ["user_id"] = Auth::id();
    	$brand = Brand::create($data);
    	return redirect()->route("admin.brands.index")->withFlashSuccess("Brand Created Successfully.");
    }

    

    public function show(){

    }

    public function edit($id){

    	$brand = Brand::find($id);

        if(!$brand)
            abort(404);       

        return view("backend.brands.edit")->with(array("brand"=>$brand));

    }

    public function update($id, UpdateBrandRequest $request){

    	$data = $request->all();

		$brand = Brand::find($id);

		if(!$brand)
			abort(404);
		
		$img=Image::make($_FILES['logo']['tmp_name']);
		$img->resize(800,640);
		$img_name=time().".jpg";
		$img->save(public_path("uploads/brands/".$img_name));
		$data["logo"]=$img_name;

		$brand->update($data);

		return redirect()->back()->with("flash_success", "Updated Successfully.");

    }

    public function destroy($id, DeleteBrandRequest $re){

    	$brand = Brand::find($id);

        if(!$brand)
            return redirect(route("admin.brands.index"))->with("flash_warning", "brand not found!");

        $brand->delete();
        return redirect(route("admin.brands.index"))->with("flash_success", "Deleted successfully.");

    }
}
