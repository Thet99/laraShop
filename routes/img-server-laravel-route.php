Route::get('/images/{size}/{path}/{name}', function($size = NULL, $path = NULL , $name = NULL){



    if(!is_null($size) && !is_null($name) && !is_null($path)){

        $size = explode('x', $size);

        $extension = pathinfo($name, PATHINFO_EXTENSION);

       
        $type = "image/jpeg";

        if($extension=="png"){
        $type ="image/png";
        }

        if($extension=="jpg"){
        $type = "image/jpg";
        }


        $cache_image = Image::cache(function($image) use($size, $name, $path){

          if(isset($size[1])){
             return $image->make(url('/files/'.$path.'/'.$name))->resize($size[0], $size[1]);
         }else{
             return $image->make(url('/files/'.$path.'/'.$name))->resize($size[0], null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
         }
          

        }, 10); // cache for 10 minutes

        return Response::make($cache_image, 200, ['Content-Type' => $type]);

    } else {
        abort(404);
    }

});