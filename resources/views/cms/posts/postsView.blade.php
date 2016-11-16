@extends('cms.layouts.layout')

@section('css_links')
@stop

@section('content')
	@if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            	<i class="fa fa-file" aria-hidden="true">&nbsp;</i>{{ isset($post) ? 'Update Post' : 'Add New Post' }}
            </h1>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-10">
                    @if(isset($post))
                        {!! Form::open(['action'=> ['PostsController@update', $post->id ], 'method'=>'put']) !!}
                    @else
                        {!! Form::open(['action'=> ['PostsController@store'], 'method'=>'post']) !!}
                    @endif
                <div class="form-group">
                    {!! Form::text('title',isset($post->title) ? $post->title : '',['class'=>'form-control','id'=>'title', 'placeholder'=>'Enter title here']) !!}
                </div>
                <div class="row">
                    <div class="col-lg-6">
                         <div class="form-group">
                            <a class="btn btn-link bnt-slug" href="{{ url(isset($post->slug) ? 'http://cmsroj.dev:8000/'.$post->slug : 'http://cmsroj.dev:8000/') }}" role="button">
                                http://cmsroj.dev:8000/
                            </a>
                             {!! Form::text('slug',isset($post->slug) ? $post->slug : '',['id'=>'slug']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea id="tinyemc" name="content" class="my-editor">{{ isset($post->content) ? $post->content : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="summary">Excerpt:</label>
                    <textarea class="form-control" rows="5" name="excerpt" id="summary">{{ isset($post->excerpt) ? $post->excerpt : '' }}</textarea>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Publish</div>
                    <div class="panel-body">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Category</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <select id="category" name="category[]" class="form-control" multiple="multiple">
                            </select>
                        </div>
                        <button class="btn btn-default btn-sm" id="category_opt" type="button" data-toggle="modal" data-target="#option_modal"><i class="fa fa-plus" aria-hidden="true">&nbsp;</i>New Category</button>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Tags</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <select id="tags" name="tags[]" class="form-control" multiple="multiple">
                                @if(isset($tags))
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <button class="btn btn-default btn-sm" id="tags_opt" type="button" data-toggle="modal" data-target="#option_modal"><i class="fa fa-plus" aria-hidden="true">&nbsp;</i>New Tags</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="option_modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Options</h4>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs" role="tablist" id="opt_tabs">
                <li role="presentation"><a href="#category_tab-pane" aria-controls="category" role="tab" data-toggle="tab">Category</a></li>
                <li role="presentation"><a href="#tags_tab-pane" aria-controls="tags" role="tab" data-toggle="tab">Tags</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="category_tab-pane">
                    <br><br>
                    {!! Form::open(['url'=>'foob/bar'] ) !!}
                        <div class="form-group">
                            <label for="exampleInput">Name</label>
                            <input type="text" class="form-control" id="exampleInput" name="exampleInput" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput">Description</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput">Slug</label>
                            <input type="text" class="form-control" id="exampleInput" name="exampleInput" placeholder="Email">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    {!! Form::close() !!}
                </div>
                <div role="tabpanel" class="tab-pane" id="tags_tab-pane">
                     <br><br>
                    {!! Form::open(['url'=>'foob/bar'] ) !!}
                        <div class="form-group">
                            <label for="exampleInput">Name</label>
                            <input type="text" class="form-control" id="exampleInput" name="exampleInput" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput">Description</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput">Slug</label>
                            <input type="text" class="form-control" id="exampleInput" name="exampleInput" placeholder="Email">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
          </div>
        </div>
      </div>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#category').select2({
            theme: "classic"
        });
        $('#tags').select2({
            theme: "classic",
            tags: true,
            tokenSeparators: [',', ' '],
        });

        $('#category_opt').click(function (e) {
          e.preventDefault()
            $('#opt_tabs a[href="#category_tab-pane"]').tab('show')
        });

        $('#tags_opt').click(function (e) {
          e.preventDefault()
            $('#opt_tabs a[href="#tags_tab-pane"]').tab('show')
        });

    });

</script>
@stop