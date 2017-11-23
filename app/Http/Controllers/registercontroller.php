<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;
use DB;
use Auth;
use Session;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

class registercontroller extends Controller
{
    //
      public function getRegister(){

    	return view('user.register');
    }

    public function postRegister(Request $request){
    	$obj= new User;

    	 $validation= Validator::make($request->all(),[
        	'name'=>'required|Min:3|Max:80',
        	
        	'email'=>'required|Email|unique:users,email',

        	'phone'=>'required|numeric|min:100',

        	'password'=>'required|Min:6|Same:confirmpassword',

        	'confirmpassword'=>'required|Min:6|Same:password',


        	//'image'=>'required|Image',
        	



        	],['required'=>'All fields are required',
            'name.required'=>'Name is required',
            'name.alpha'=>'Must only contain aplhabets',
            'email.required'=>'A valid email is required',
            'email.Email'=>'please enter a valid email address',
            'email.unique'=>'Email address already used',
            'phone.numeric'=>'Must only contain numbers',
            'password.min'=>'Must contain at least 6 characters']);

         if($validation->fails()){
            return redirect('register')
            ->withErrors($validation)
            ->withInput();
        }
         $confirmation_code = mt_rand(1000,9999);
          
    	 $obj->name=$request->get('name');  //yeta paxadi ko varibale uta form ko name =lekheko thau ko ho
        $obj->email=$request->get('email');
        $obj->phone=$request->get('phone');
        $obj->password=Hash::make($request->get('confirmpassword'));
        $obj->confirmationcode= $confirmation_code;
        $email=$obj->email;

       
        $result= $obj->save();
        if($result){

        	
        		$msg="Code has been provided toy your email. Please check your email";
           	echo $msg;
           	   	if(mail($email,"Password Reset","Please enter given code to activate your account",$msg)){
          return view('user.verifycode',array('result'=>$obj));
      }
          
        }
        else {
            echo "failed";
        }



    }

     public function getVerify(){
   	return view('user.verifycode');
   }

   public function postVerify(Request $request){
   	$code= $request->get('verifycode');
    $check = DB::table('users')->where('confirmationcode','=',$code)->first();
    $email = $check->email;
    if(count($check) > 0){
       DB::select("UPDATE users set flag='1' where email='$email' ");
       DB::select("UPDATE users set confirmationcode=NULL where email='$email' ");
          //return redirect('/');
        return Redirect::intended();
          //DB::select("UPDATE users set reset_token=NULL where email='$email' ");
        //else{
          //return view('admin.password_reset_form',array('result'=>$check));
        //}


      }
      else{
        echo "code do not match";
      }

   }

}
