<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use phpDocumentor\Reflection\Types\Object_;
use stdClass;

class UserControllers extends BaseController
{
    public function showAdminName(){

        return 'Hamza';
    }

    public function showIndex(){

        $obj= new stdClass();

        $obj -> name= 'hamza';
        $obj -> age= 30;
        $obj -> sex= 'male';

        $userdata=['name'=>'hamza', 'age'=>30, 'sex'=>'male'];

        return view('welcome', compact('userdata'));
    }
}
