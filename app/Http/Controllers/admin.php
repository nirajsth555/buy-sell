<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorytable;
use Illuminate\Support\Facades\Redirect;
use DB;
use Validator;
use Session;

use App\Http\Requests;

class admin extends Controller
{
    //
    public function getIndex(){
    	$count_user= DB::table('users')->where('user_type','=','1')->get();
    	return view('admin.mainpage',array('numberofuser'=>$count_user));
    }

    public function getRootcategory(){
    	return view('admin.addcategory');
    }

    public function postRootcategory(Request $request){

    		$obj= new categorytable;

    		$validation= Validator::make($request->all(),[
        	'parent_category'=>'required|unique:categorytables,category_name',
        	
        	],[
            'parent_category.required'=>'Name of the category is required',
           
            'parent_category.unique'=>'The category name is already in use'
            ]);

         if($validation->fails()){
            return redirect('rootcategory')
            ->withErrors($validation)
            ->withInput();
        }

      	$obj->category_name=$request->get('parent_category');
      		$obj->parent_id=$request->get('root_category');
      			$result= $obj->save();
      			
      		
      			if($result){
                 $request->session()->flash('message.level', 'Root category was Succesfully posted');
      				//$msg=\Session::flash('flash_message','Succesfully posted');
      				
      				 return Redirect::back();
      				//return view('admin.addcategory');

      			}
      			else
      			{
      				echo "failed";
      			}


      }
        	


        	
        	



      public function  getSubcategory(){
      		$obj=DB::table('categorytables')->where('parent_id','=','0')->get();
    	return view('admin.addsubcategory',array('parent'=>$obj));
      }

      public function postSubcategory(Request $request){
      		$obj= new categorytable;
      	$obj->category_name=$request->get('root_category');
      		$obj->parent_id=$request->get('parent');
      		
      			$result= $obj->save();
      			if($result){
      				return Redirect::back();

      			}
      			else
      			{
      				echo "failed";
      			}

      }

    }

