<?php

namespace app\Traits;


trait OfferTrait {

    function saveImage($photo, $path){
        $file_extension = $photo-> getClientOriginalExtension();
        $file_name= time().'.'.$file_extension;
        $photo->move($path,$file_name);
    }

}
