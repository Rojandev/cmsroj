@extends('cms.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	<i class="fa fa-file" aria-hidden="true">&nbsp;</i>Posts
            	<a href="{{ url('/admin/posts/create') }}" class="btn btn-default">Add New</a>
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
	                        <th>Category</th>
	                        <th>Tags</th>
	                        <th>Date</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@if(count($posts))
	                		@foreach($posts as $post)
			                    <tr>
			                    	<td>&nbsp;</td>
			                    	<td><a href="{{ url('admin/posts/'.$post->id.'/edit') }}">{{ $post->title }}</a></td>
			                    	<td>{{ $post->author }}</td>
			                    	<td>{{ ($post->category != null) ? $post->category : 'None' }}</td>
			                    	<td>
			                    		@foreach($tags as $tag)
			                    			@if(!empty($tag) && !empty($post->tags))
			                    					@foreach($tag as $value)
				                    					<a href="#">[{{ $value }}]</a>
				                    				@endforeach
			               			        @endif
			                    		@endforeach
			                    	</td>
			                    	<td>{{ $post->publish->format('Y/m/d') }}</td>
			                    	<td><a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			                    </tr>
		                    @endforeach
		                @else
		                	 <tr>
		                    	<td colspan= "5" class="text-center">There are no posts.</td>
		                    </tr>
	                    @endif
	                </tbody>
	            </table>
	    	</div>
	    	{{ $posts->links() }}
	    </div>
    </div>
@stop