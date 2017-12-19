@extends('admin.layout')

@section('subrootcategory')
<div class="login-page">
    <div class="login-main">  
    <div class="login-head">

    <h1>Add SubRoot Category</h1>	
    </div>
  	<div class="login-block">  	
<form action="{{url('postsubcategpry')}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">

<input type="text" name="root_category" placeholder="Add SubRoot Category">
 <label>Root-Category</label>
                                            <select name="parent" class="form-control">
                                            @foreach($parent as $p)
                                                <option value="{{$p->category_id}}">{{$p->category_name}}</option>
                                                
                                             
                                            @endforeach
                                            </select>
                                            <br>
<input type="submit" name="post" value="Add">
</form>
</div>
</div>
</div>


@stop