<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Http\Controllers\Controller;
use App\Models\Setting;



class SettingController extends Controller
{
    public function index(){
    	$settings=Setting::paginate(2);

    	return view('backend.settings.index')->with(array('settings'=>$settings));
    }

    public function create(){

		return view("backend.settings.create");

    }

    public function store(CreateSettingRequest $request){
    	$data = $request->all();
        
        
    	$setting = Setting::create($data);
    	return redirect()->route("admin.settings.index")->withFlashSuccess("Setting Created Successfully.");

    }

    public function edit($id){

    	$setting = Setting::find($id);

		if(!$setting)
			abort(404);

		return view("backend.settings.edit")->with(array("setting"=>$setting));
    	
    }

    public function update($id, UpdateSettingRequest $request){

    	$data = $request->all();

		$setting = Setting::find($id);

		if(!$setting)
			abort(404);

		

		$setting->update($data);

		return redirect()->back()->with("flash_success", "Updated Successfully.");

    }

    public function show(){
    	
    }
    public function destroy(){
    	
    }

}
