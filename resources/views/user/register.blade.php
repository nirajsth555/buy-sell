@extends('user.layout')

@section('register')

<section>

			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Create an account</h1>
						<p class="creating">Having hands on experience in creating innovative designs,I do offer design 
							solutions which harness.</p>
						<h2>Personal Information</h2>
						<form   action="{{url('r')}}" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="user_type" value="1">
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Full Name* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="fullname" placeholder="Please enter your full name " id="name"  value="{{Request::old('name')}}" />
									{{$errors->first('name')}}<p id="statuspass"></p> <br>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Email Address* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="email" placeholder="Please enter your email " value="{{Request::old('email')}}"  />{{$errors->first('email')}}<br>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Phone No.* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="phone" placeholder="Please enter your phone number "  value="{{Request::old('phone')}}" />{{$errors->first('phone')}}
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Password* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="password" id="password" placeholder=" Please enter your password" />
								
						<p id="message_strength"></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Confirm Password* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="confirmpassword" id="confirm_password" placeholder="Please re-enter your password " />
								
							<p id="message"></p> 
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sub_home">
							<div class="sub_home_left">
							
									<input type="submit" name="post" value="Create">
								
							</div>
							<div class="sub_home_right">
								<p>Go Back to <a href="index.html">Home</a></p>

							</div>
							<div class="clearfix"> </div>
						</div>
						</form>
					</div>
				</div>
			</div>
		<!--footer section start-->
			
        <!--footer section end-->
	</section>
@stop