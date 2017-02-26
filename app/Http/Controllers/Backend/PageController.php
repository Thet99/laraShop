<?php 
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;

use App\Models\Page;

class PageController extends Controller
{
    public function index(){

    	$pages = Page::paginate(10);

    	return view('backend.pages.index')->with(array('pages'=>$pages));

    }

    public function create(){
    	return view('backend.pages.create');
    	
    }

    public function store(CreatePageRequest $request){

    	$data= $request->all();

    	$page=Page::create($data);
    	return redirect()->route('admin.pages.index')->withFlashSuccess("Page Created Successfully.");
    	
    }

    public function edit($id){

    	$page = Page::find($id);

		if(!$page)
			abort(404);

		return view("backend.pages.edit")->with(array("pages"=>$page));
    	
    }

    public function update($id, UpdatePageRequest $request){

    	$data = $request->all();

		$page = Page::find($id);

		if(!$page)
			abort(404);

		

		$page->update($data);

		return redirect()->back()->with("flash_success", "Page Updated Successfully.");


    	
    }

    public function show(){
    	
    }

    public function destroy(){
    	
    }
}
