@extends('user.layout')

@section('verifyemail')

<section>

			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Create an account</h1>
						<p class="creating">Having hands on experience in creating innovative designs,I do offer design 
							solutions which harness.</p>
						<h2>Verify your Email</h2>
						<form   action="{{url('verification')}}" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="email" value="{{$result->email}}">
						
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Enter Code provided to your Email* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="verifycode" placeholder="Please enter the provided code " />
									<br>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						
						
						
						
						<div class="sub_home">
							<div class="sub_home_left">
							
									<input type="submit" name="post" value="Enter">
								
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