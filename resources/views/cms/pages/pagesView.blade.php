@extends('cms.layouts.layout')

@section('css_links')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css">
@stop

@section('content')
	@if (Session::get('success'))
        <div class="alert alert-success alert-dismissable">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	<i class="fa fa-file" aria-hidden="true">&nbsp;</i>{{ isset($page) ? 'Update Page' : 'Add New Page' }}
            </h1>
        </div>
    </div>
    <div class="row">
        @if(isset($page))
            {!! Form::open(['action'=> ['PagesController@update', $page->id ], 'method'=>'put']) !!}
        @else
            {!! Form::open(['action'=> ['PagesController@store'], 'method'=>'post']) !!}
        @endif
          
            <div class="col-lg-10">
                <div class="form-group">
                    {!! Form::text('title',isset($page->title) ? $page->title : '',['class'=>'form-control','id'=>'title', 'placeholder'=>'Enter title here']) !!}
                </div>
                <div class="row">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <a class="btn btn-link bnt-slug" href="{{ url(isset($page->slug) ? 'http://cmsroj.dev:8000/'.$page->slug : 'http://cmsroj.dev:8000/') }}" role="button">
                                http://cmsroj.dev:8000/
                                 {!! Form::text('slug',isset($page->slug) ? $page->slug : '',['id'=>'slug']) !!}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea id="tinyemc" name="content" class="my-editor">{{ isset($page) ? $page->content : '' }}</textarea>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Publish</div>
                    <div class="panel-body">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('scripts_bot')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    height:500,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media code',
    toolbar2: 'print preview | forecolor backcolor emoticons | codesample',
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
    };

    tinymce.init(editor_config);
</script>
@stop