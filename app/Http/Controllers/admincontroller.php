<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class admincontroller extends Controller
{
    //
    public function getIndex(){
    	echo('anythinh');
    	return view('admin.index');
    }
}
