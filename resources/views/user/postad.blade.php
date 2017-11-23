@extends('user.layout')
@section('postad')
<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Post an Ad</h2>
			<div class="post-ad-form">
				<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}" >
				<div class="personal-details">
						<label>Your Name <span>*</span></label>
						<input type="text" class="name" name="fullname" placeholder="" required="Name must be filled out">

						<div class="clearfix"></div>

						<label>Your Mobile No <span>*</span></label>
						<input type="text" class="phone" name="phone" placeholder="">

						<div class="clearfix"></div>

						<label>Your Email Address<span>*</span></label>
						<input type="text" class="email" name="email" placeholder="">

						<div class="clearfix"></div>
						
					</div>

					<label>Select Category <span>*</span></label>
					<select name="category" class="option">
					  <option>Select Category</option>
					  <option value="mobile">Mobiles</option>
					  <option value="electronics">Electronics and Appliances</option>
					  <option value="cars">Cars</option>
					  <option value="bikes">Bikes</option>
					  <option value="furniture">Furniture</option>
					  <option value="pets">Pets</option>
					  <option value="bookandsport">Books, Sports and hobbies</option>
					  <option value="fashion">Fashion</option>
					  <option value="kids">Kids</option>
					  <option value="services">Services</option>
					  <option value="estate">Real, Estate</option>
					</select>

					<div class="clearfix"></div>

					<label>Ad Title <span>*</span></label>
					<input type="text" class="phone" placeholder="">


					<div class="clearfix"></div>
					<label>Ad Description <span>*</span></label>
					<textarea class="mess" placeholder="Write few lines about your product"></textarea>

					<div class="clearfix"></div>

				<div class="upload-ad-photos">
				<label>Photos for your ad :</label>	
					<div class="photos-upload-view">
						

						<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

						<div>
							<input type="file" id="fileselect" name="iamgearrayname[]" multiple="multiple" />
							<div id="filedrag">or drop files here</div>
						</div>

						<div id="submitbutton">
							<button type="submit">Upload Files</button>
						</div>

				

						<div id="messages">
						<p>Status Messages</p>
						</div>

						</div>


					<div class="clearfix"></div>
						<script src="{{url('public/usercss/js/filedrag.js')}}"></script>
				</div>


				</form>

				<p class="post-terms">By clicking <strong>post Button</strong> you accept our <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a></p>
					<input type="submit" value="Post">					
					<div class="clearfix"></div>
					

			</div>
		</div>	
	</div>
	@stop