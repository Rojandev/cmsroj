@extends('cms.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	<i class="fa fa-file" aria-hidden="true">&nbsp;</i>Pages
            	<a href="{{ url('/admin/pages/create') }}" class="btn btn-default">Add New</a>
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
	            <table class="table table-bordered table-hover">
	                <thead>
	                    <tr>
	                        <th>&nbsp;</th>
	                        <th>Title</th>
	                        <th>Author</th>
	                        <th>Date</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@if(count($pages))
	                		@foreach($pages as $page)
			                    <tr>
			                    	<td>&nbsp;</td>
			                    	<td><a href="{{ url('admin/pages/'.$page->id.'/edit') }}">{{ $page->title }}</a></td>
			                    	<td>{{ $page->author }}</td>
			                    	<td>{{ $page->publish->format('Y/m/d') }}</td>
			                    	<td><a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			                    </tr>
		                    @endforeach
		                @else
		                	 <tr>
		                    	<td colspan= "5" class="text-center">There are no pages.</td>
		                    </tr>
	                    @endif
	                </tbody>
	            </table>
	    	</div>
	    	{{ $pages->links() }}
	    </div>
    </div>
@stop