@extends('cms.layouts.layout')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<div class="row">
        <div class="col-lg-13">
            <h1 class="page-header">
            	<i class="fa fa-user" aria-hidden="true">&nbsp;</i>{{ isset($user) ? $user->name : 'Create User' }}
            </h1>
        </div>
     </div>
     <div class="row">
     	<div class="col-lg-6 col-lg-offset-3">
                @if(isset($user))
                    {!! Form::open(['action'=> ['UserController@update', $user->id ], 'method'=>'put','class'=>'form-horizontal']) !!}
                @else
                    {!! Form::open(['action'=> ['UserController@store'], 'method'=>'post','class'=>'form-horizontal']) !!}
                @endif
     				<div class="form-group">
     				    <label for="name" class="col-xs-3 control-label">Name</label>
                        <div class="col-sm-9">
                            {!! Form::text('name',isset($user->name) ? $user->name : '',['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Name']) !!}
                        </div>
     				</div>
     				<div class="form-group">
     				    <label for="email" class="col-xs-3 control-label">Email address</label>
                        <div class="col-sm-9">
                            {!! Form::email('email',isset($user->email) ? $user->email : '',['class'=>'form-control','id'=>'email', 'placeholder'=>'Email']) !!}
                        </div>
     				</div>
     				<div class="form-group">
     				    <label for="password" class="col-xs-3 control-label">Password</label>
                        <div class="col-sm-9">
                            {!! Form::password('password',['class'=>'form-control','id'=>'password']) !!}
                        </div>
     				</div>
     				<div class="form-group">
     				    <label for="password_confirmation" class="col-xs-3 control-label">Confirm Password</label>
                        <div class="col-sm-9">
                            {!! Form::password('password_confirmation',['class'=>'form-control','id'=>'password_confirmation']) !!}
                        </div>
     				</div>
                    <div class="form-group">
                        <label for="cpassword" class="col-xs-3 control-label">Admin</label>
                        <div class="col-sm-9">
                            {!! Form::select('role', ['0' => 'No', '1' => 'Yes'], isset($user->role)? $user->role : '0', ['class'=>'form-control']) !!}
                        </div>
                    </div>
     				<button class="btn btn-primary pull-right" type="submit">Submit</button>
     			{!! Form::close() !!}
     	</div>
     </div>
@stop