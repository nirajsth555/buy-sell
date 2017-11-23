@extends('user.layout')

@section('loginform')
<section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>Log in</h1>
						</div>
							<form action="{{url('loggingin')}}" method="post">
						<div class="signin">
							<div class="signin-rit">
								<span class="checkbox1">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked="">Forgot Password ?</label>
								</span>
								<p><a href="#">Click Here</a> </p>
								<div class="clearfix"> </div>
							</div>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="log-input">
								<div class="log-input-left">
								   <h4>Email</h4> <input type="text" class="user" name="email" value="{{Request::old('email')}}"><h4>{{$errors->first('email')}}</h4><br>
								</div>
								
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								  <h4>Password</h4> <input type="password" class="lock" name="password"><h4>{{$errors->first('password')}}</h4><br>
								</div>
								
								<div class="clearfix"> </div>
							</div>
							@if($errors->any())
							@foreach($errors->all() as $error)
							<h4>{{$error}}</h4>
							@endforeach
							@endif

							<input type="submit" value="Log in">
						</div>
						<div class="new_people">
							<h2>For New People</h2>
							<p>Having hands on experience in creating innovative designs,I do offer design 
								solutions which harness.</p>
							<a href="{{url('register')}}">Register Now!</a>
						</div>
						</form>	 
					</div>
				</div>
			</div>
		<!--footer section start-->
		
        <!--footer section end-->
	</section>

	@stop