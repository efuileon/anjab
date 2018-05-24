<!doctype html>
<html lang="en">
@include('musjab.layout.head')

<body>
<div id="page">
	<div class="wrapper">

	    @include('musjab.layout.sidebar')

	    <div class="main-panel">
			@include('musjab.layout.navbar')

			<div class="content">
				<div class="container-fluid">
					
					@yield('isi')
				</div>
			</div>

			@include('musjab.layout.footer')
		</div>
	</div>
</div>
<div id="loading"></div>
</body>

	@include('musjab.layout.script')

</html>
