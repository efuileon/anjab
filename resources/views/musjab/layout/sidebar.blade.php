<div class="sidebar" data-color="purple" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
<!--			
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    
-->

			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text">
					Creative Tim
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                
	                @if ($sidebar =="home")
	                <li class="active">
	                @else
	                <li>
	                @endif
	                    <a href="{{url('home')}}">
	                        <i class="material-icons">home</i>
	                        <p>Home</p>
	                    </a>
	                </li>

	                @if ($sidebar =="peta_jabatan")
	                <li class="active">
	                @else
	                <li>
	                @endif
	                    <a href="{{url('peta_jabatan')}}">
	                        <i class="material-icons">map</i>
	                        <p>Peta Jabatan</p>
	                    </a>
	                </li>
	               
	                
	                @if ($sidebar =="rancangan")
	                <li class="active">
	                @else
	                <li>
	                @endif
	                    <a href="{{url('rancangan')}}">
	                        <i class="material-icons">library_books</i>
	                        <p>Rancangan Jabatan</p>
	                    </a>
	                </li>
	               
	            </ul>
	    	</div>
	    </div>
