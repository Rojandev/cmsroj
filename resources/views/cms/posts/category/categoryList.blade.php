@extends('cms.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	<i class="fa fa-file" aria-hidden="true">&nbsp;</i>Pages
            	<a href="{{ url('/admin/pages/create') }}" class="btn btn-default">Add New</a>
            </h1>


        </div>
    </div>
@stop