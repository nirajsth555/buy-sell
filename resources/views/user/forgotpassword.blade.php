@extends('user.layout')

@section('register')

<section>

			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Forgot Password?</h1>
						
					
						<form   action="" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Enter your Email Account:</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="email" placeholder="Please enter your email  "  />
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