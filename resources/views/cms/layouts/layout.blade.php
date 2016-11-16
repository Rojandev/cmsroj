<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="{{ elixir("css/app.css") }}" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

	@yield('css_links')
</head>
<body>
	<div id="wrapper">
		 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		 	@include('cms.layouts.nav-menu')
			@include('cms.layouts.side-bar')
		 </nav>

		 <div id="page-wrapper">
            <div class="container-fluid">
				@yield('content')
			</div>
		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ elixir("js/app.js") }}" type="text/javascript"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
         $('#lfm').filemanager('images');

         var url = window.location.href; 
         $("ul.side-nav li a").each(function() {
            // checks if its the same on the address bar
            if (url == $(this).attr('href')) {
                $(this).closest("li").addClass("active");
            }
        });

    });
</script>
@yield('scripts_bot')



</body>
</html>