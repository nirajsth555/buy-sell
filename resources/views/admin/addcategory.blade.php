@extends('admin.layout')

@section('rootcategory')
@if(Session::has('message.level'))
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
  <div class="alert alert-info">{{ Session::get('message.level') }}</div>



@endif
<div class="login-page">
    <div class="login-main">  
    <div class="login-head">

    <h1>Add Root Category</h1>	
    </div>
  	<div class="login-block">  	
<form action="{{url('postroot')}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="root_category" value="0">
<input type="text" name="parent_category" placeholder="Add Root Category" value="{{Request::old('parent_category')}}">{{$errors->first('parent_category')}}<br>
<input type="submit" name="post" value="Add">
</form>
</div>
</div>
</div>


@stop