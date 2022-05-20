<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ThemeLooks Ltd.</title>
	 <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="">
</head>
<body>


	<nav class="navbar navbar-expand navbar-light bg-white">
		<div class="container">
			<a class="navbar-brand" href="">ThemeLooks Ltd</a>
			<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#myNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-lg-end" id="myNav">
				<ul class="navbar nav">
					<li class="nav-item"><a class="nav-link" href="{{ route('master') }}" title="">Home</a></li>

					
						  @if(Session::get('user_id'))

						    <li class="nav-item"><a class="nav-link" href="" onclick="document.getElementById('userLogout').submit();">Logout</a>
						    	<form action="{{ route('user.logout') }}" method="POST" id="userLogout"></form>

						    </li>
							<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Session()->get('user_name') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                                </div>
                            </li>

							
						     
						    @else

						   	<li class="nav-item"><a class="nav-link" href="{{ route('user.login') }}" title="">Login</a></li>

							   
							<li class="nav-item"><a class="nav-link" href="{{ route('user.register') }}" title="">Registation</a></li>
							   	
						   @endif
							
							
						

				</ul>
			</div>
		</div>
	</nav>




	@yield('content')











	 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>