@extends('cms.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	<i class="fa fa-users" aria-hidden="true">&nbsp;</i>Users
            	 <a href="{{ url('admin/users/create') }}" class="btn btn-default">Add New</a>
            </h1>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> Tables
                </li>
            </ol>
        </div>
     </div>
    <div class="row">
	    <div class="col-lg-12">
	        <div class="table-responsive">
	        	@if(count($users) == 1)
	        		{{ count($users).' Item' }}
	        	@elseif(count($users) > 1)
	        		{{ count($users).' Items' }}
	        	@else
	        		{{ 'No Item' }}
	        	@endif
	            <table class="table table-bordered table-hover">
	                <thead>
	                    <tr>
	                        <th>&nbsp;</th>
	                        <th>Name</th>
	                        <th>Email</th>
	                        <th>Role</th>
	                        <th>Options</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@if(count($users))
	                		@foreach($users as $user)
			                    <tr>
			                        <td>&nbsp;</td>
			                        <td><a href="{{ url('admin/users/'.$user->id.'/edit') }}">{{ $user->name }} </a></td>
			                        <td><a href="{{ url('admin/users/'.$user->id.'/edit') }}">{{ $user->email }}</a></td>
			                        <td>{{ ($user->role) ? 'Admin' : 'Regular' }}</td>
			                        <td><a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			                    </tr>
		                    @endforeach
	                    @else
	                    	<tr>
	                    		<td colspan= "5" class="text-center">There are no users.</td>
	                    	</tr>
	                    @endif
	                </tbody>
	            </table>
	        </div>
    </div>
@stop