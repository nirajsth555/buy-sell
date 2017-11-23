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

class logincontroller extends Controller
{
    //
     public function getLogin(){
      Session::put('url.intended',URL::previous());
    	return view('user.login');
    }

   public function postLogin(Request $request){

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
      if(Auth::attempt(['email'=>$email,'password'=>$password])){

        if(Auth::user()->flag !=1){
          $errors= "you have not confirmed your email yet";
          return Redirect::back()
          
          ->withErrors($errors);
        }
        
       return Redirect::to(Session::get('url.intended'));

      }
      else{

        return Redirect::back()
        ->withInput()
        ->withErrors(['credentials'=>'Email and Password donot match']);

      }

   }
      public function getLogout(){

        Auth::logout();
        return view('admin.mainpage');

      }
}
