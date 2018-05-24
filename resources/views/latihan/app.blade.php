<html lang="en">
<head>
	<title>Laravel 5.2 Ajax CRUD by Arsipti.com</title>
	{{-- Bootstrap --}}	
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">	
</head>
<body >
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="www.arsipti.com" class="navbar-brand" >L 5.2 Arsipti.com</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/">Beranda</a></li>
					<li><a href="/LaravelAjaxCRUD">Ajax CRUD</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>

	<script src="{{ URL::asset('assets/js/jquery/jquery-1.9.1.js') }}"></script>
	<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('js/ajaxscript.js') }}"></script>
</body>
</html>