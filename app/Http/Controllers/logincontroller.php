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
use URL;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class logincontroller extends Controller
{
    //
     public function getLogin(Request $request){
      $request->Session()->put('url.intended',url()->previous());
    	return view('user.login');
    }

   public function postLogin(Request $request){    //userlogin function

     $validation= Validator::make($request->all(),[
          
          
          'email'=>'required|Email',
          'password'=>'required'
          ],[


            'email.Email'=>'please enter a valid email address',

            'email.required'=>'Please enter an email address',
            'password.required'=>'Please enter your password']);
     if($validation->fails()){
            return redirect('login')
            ->withErrors($validation)
            ->withInput();
        }
    $email= $request->get('email');
    $password=$request->get('password');
    if ($request->get('remember_me') == 'on'){
      $remember = 1;
    }else{
      $remember = 0;
    }
      if(Auth::attempt(['email'=>$email,'password'=>$password,'user_type'=>1],$remember)){

        if(Auth::user()->flag !=1){
          $errors= "you have not confirmed your email yet";
          return Redirect::back()
          
          ->withErrors($errors);
        }
        return Redirect($request->session()->get('url.intended'));
        //return Redirect::back();
       //return Redirect::to(Session::get('url.intended'));

      }
      else{

        return Redirect::back()
        ->withInput()
        ->withErrors(['credentials'=>'Email and Password donot match']);

      }

   }
      public function getLogout(){

        Auth::logout();
        return view('user.mainpage');

      }


     // public function getForgetpassword(){
        //return view('admin.forgotpassword')
      //}

      //public function postForgetpassword(Request $request){
        //$email = $request->get('email');
        //$token=mt_rand(1000,9999);
        //$data= DB::table('users')
                  //->where('email','=',$email)
                  ///->first();
        //$flag= DB::table('users')
                   //->where('flag','=',$email) 
                   //->first();  
        //if(count($data)>0 && $flag==1){
          //DB::select("UPDATE users SET reset_code='$token' WHERE email='$email'");
            //$msg="Reset code has been sent to your e-mail address. Please enter the Provided reset code to reset your password ";
            //echo $msg; 
        
        //if(mail($email,"Password Reset","Please enter given code to reset your password",$msg))
            //return view('admin.password_reset');  
            //else{
              //echo "failed msg";
            //}


           //}   


        //else{
            //$msg="Reset code has been sent to you e-mail address";
            //echo $msg;
              //return view('admin.password_reset');  
           //} 


    
}
