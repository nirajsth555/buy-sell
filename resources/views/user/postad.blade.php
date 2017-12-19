@extends('user.layout')
@section('postad')
<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Post an Ad</h2>
			<div class="post-ad-form">
				<form action="{{url('ad')}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}" >
				<div class="personal-details" >
						<label>Your Name <span>*</span></label>
						<input type="text" class="name" name="fullname" placeholder="" required="Name must be filled out" value="{{Auth::user()->name}}">

						<div class="clearfix"></div>
                        <div class="input_fields_wrap">
						<label>Your Mobile No <span>*</span></label>
						<input type="text" class="phone" name="phone[]" placeholder="" value="{{Auth::user()->phone}}" >
						<button class="add_field_button"><i class="fa fa-plus-square" aria-hidden="true"></i>Add Another Number</button>
						</div>

						<div class="clearfix"></div>

						<label>Your Email Address<span>*</span></label>
						<input type="text" class="email" name="email" placeholder="" value="{{Auth::user()->email}}">

						<div class="clearfix"></div>
						
					</div>

					<label>Select Category <span>*</span></label>
					<select name="category" class="option" id="category_dropdown">      
					  <option></option>
					  @foreach($parent as $root)
					  <option value="{{$root->category_id}}">{{$root->category_name}}</option>
					@endforeach
					</select>

					<div class="clearfix"></div>

					<label>Select Brand <span>*</span></label>
					<select name="subcategory" class="option" id="brand_dropdown" >
					  <option></option>
					  <option value=""></option>
					  
					 
					</select>

					<div class="clearfix"></div>

					<label>Ad Title <span>*</span></label>
					<input type="text" class="phone" placeholder="">


					<div class="clearfix"></div>

					<label>Price  <span>*</span></label>
					<input type="text" class="phone" placeholder="" >


					<div class="clearfix"></div>
					<label>Ad Description <span>*</span></label>
					<textarea class="mess" placeholder="Write few lines about your product"></textarea>

					<div class="clearfix"></div>

					<label>Condition <span>*</span></label>
					<select name="" class="option"> 
					<option>Select 	</option>     
					  <option value="">New</option>
					 
					  <option value=>Used</option>
				
					</select>

					<div class="clearfix"></div>

						<label>Km. run <span></span></label>
					<input type="text" class="phone" placeholder="" >



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