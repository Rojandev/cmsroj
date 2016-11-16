@extends('cms.layouts.layout')

@section('content')
	@if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	<i class="fa fa-cogs" aria-hidden="true">&nbsp;</i>Settings
            </h1>
        </div>
    </div>
	<div class="row">
		<div class="col-xs-6">
			@if(($settings))
				{!! Form::open(['action'=>['SettingsController@update','1'],'method'=>'PUT','class'=>'form-horizontal']) !!}
			@else
				{!! Form::open(['action'=>['SettingsController@store'],'method'=>'POST','class'=>'form-horizontal']) !!}
			@endif
			
				<div class="form-group">
				   <label for="site_title" class="col-xs-2 control-label">Site Title:</label>
				   <div class="col-xs-10">
				   		{!! Form::text('site_title',isset($settings->site_title) ? $settings->site_title : '',['id'=>'site_title','class'=>'form-control']) !!}
				   </div>
				</div>
				<div class="form-group">
				   <label for="tagline" class="col-xs-2 control-label">Tagline:</label>
				   <div class="col-xs-10">
				   		{!! Form::text('tagline',isset($settings->tagline) ? $settings->tagline : '',['id'=>'tagline','class'=>'form-control']) !!}
				   </div>
				</div>
				<div class="form-group">
				   <label for="tagline" class="col-xs-2 control-label">Email:</label>
				   <div class="col-xs-10">
				   		{!! Form::email('email',isset($settings->email) ? $settings->email : '',['id'=>'email','class'=>'form-control']) !!}
				   </div>
				</div>
				<div class="form-group">
				   <label for="home_page" class="col-xs-2 control-label">Home Page:</label>
				   <div class="col-xs-6">
				   		<select name="home_page" class="form-control" id="home_page">
				   			<option value="">---------</option>
				   			@if(isset($pages))
				   				@foreach($pages as $page)
				   					@if($page->type == 'home')
				   						<option value= "{{ $page->id }}" selected>{{ $page->title }}</option>
				   					@elseif($page->type == 'blog')
				   						<option value= "{{ $page->id }}" disabled="disabled">{{ $page->title }}</option>
				   					@else
				   						<option value= "{{ $page->id }}">{{ $page->title }}</option>
				   					@endif
				   					
				   				@endforeach
				   			@endif
				   		</select>
				   </div>
				</div>
				<div class="form-group">
				   <label for="blog_page" class="col-xs-2 control-label">Blog Page:</label>
				   <div class="col-xs-6">
				   		<select name="blog_page" class="form-control" id="blog_page">
				   			<option value="">---------</option>
				   			@if(isset($pages))
				   				@foreach($pages as $page)
				   					@if($page->type == 'blog')
				   						<option value= "{{ $page->id }}" selected>{{ $page->title }}</option>
				   					@elseif($page->type == 'home')
				   						<option value= "{{ $page->id }}" disabled="disabled">{{ $page->title }}</option>
				   					@else
				   						<option value= "{{ $page->id }}">{{ $page->title }}</option>
				   					@endif
				   				@endforeach
				   			@endif
				   		</select>
				   </div>
				</div>
				<button class="btn btn-primary pull-right" type="submit">Submit</button>




			{!! Form::close() !!}
		</div>
	</div>
@stop

@section('scripts_bot')
	<script type="text/javascript">
		$(document).ready(function(){

			$("#home_page").select2({
				placeholder: "---------",
  				allowClear: true
			});

			$("#blog_page").select2({
				placeholder: "---------",
  				allowClear: true
			});



		});
	</script>
@stop