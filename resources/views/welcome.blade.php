<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Le Nouvelliste - @yield('title') </title>

	<link rel="stylesheet" href="{{ asset('js/jquery-ui/js/jquery-ui.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-icons/entypo/css/entypo.css') }}">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/neon-core.css') }}">
	<link rel="stylesheet" href="{{ asset('css/neon-theme.css') }}">
	<link rel="stylesheet" href="{{ asset('css/neon-forms.css') }}">
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	<link rel="stylesheet" href="{{ asset('css/skins/blue.css') }}">
	<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
	<!-- <script src="{{ asset('js/jquery-ui/js/jquery-3.2.1.min.js') }}"></script> -->
	
	
	
	<script>
	function resizeIframe(obj) {
    	obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  	}
	</script>

	@yield('my-css')


	<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">

			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="/">
						<img src="{{ asset('images/logo@2x.png') }}" width="120" alt="" />
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon">
						<!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>


				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>


			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li>
					<a href="/dashboard">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>
	  			
				<li>
					<a href="{{ url('/') }}/annonces">
						<i class="entypo-pencil"></i>
						<span class="title">Annonces</span>
					</a>
					<!-- <ul>
						<li>
							<a href="{{ url('/') }}/annonces-new/">
								<span class="title">Ajouter</span>
							</a>
						</li>
					</ul> -->
				</li>

				<li>
					<a href="/addnew/post">
						<i class="entypo-pencil"></i>
						<span class="title">Posts</span>
					</a>
				</li>

				<li>
					<a href="{{ url('/') }}/breaking">
						<i class="entypo-pencil"></i>
						<span class="title">Breaking News</span>
					</a>
				</li>
				
				<li>
					<a href="{{ url('/') }}/medias">
						<i class="entypo-camera"></i>
						<span class="title">Apparence</span>
					</a>
					<ul>
						<li>
							<a href="{{ url('/') }}/widgets/">
								<span class="title">Widgets</span>
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="{{ url('/') }}/medias">
						<i class="entypo-camera"></i>
						<span class="title">Médias</span>
					</a>
					<ul>
						<li>
							<a href="{{ url('/') }}/medias/">
								<span class="title">Bibliothèque</span>
							</a>
						</li>
						<li>
							<a href="{{ url('/') }}/medias-new/">
								<span class="title">Ajouter</span>
							</a>
						</li>
					</ul>
				</li>
				

				<li>
					<a href="#">
						<i class="entypo-mail"></i>
						<span class="title">Newsletters</span>
					</a>
					<ul>
						<li>
							<a href="{{ url('/') }}/newsletters/">
								<span class="title">All newsletters</span>
							</a>
						</li>
						<li>
							<a href="{{ url('/') }}/newsletters/emails">
								<span class="title">All emails</span>
							</a>
						</li>

						<li>
							<a href="{{ url('/') }}/newsletters/custom">
								<span class="title">Custom</span>
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="/caricatures">
						<i class="entypo-brush"></i>
						<span class="title">Caricatures</span>
					</a>
					<ul>
						<li>
							<a href="{{ url('/') }}/caricatures">
								<span class="title">All Caricatures</span>
							</a>
						</li>
						<li>
							<a href="{{ url('/') }}/caricatures-new/">
								<span class="title">Add new</span>
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="/user">
						<i class="entypo-users"></i>
						<span class="title">Users</span>
					</a>
					<ul>
						<li>
							<a href="/user/">
								<span class="title">All users</span>
							</a>
						</li>

						<li>
							<a href="/user/create">
								<span class="title">Add a user</span>
							</a>
						</li>

						<li>
							<a href="/groups">
								<span class="title">Roles</span>
							</a>
						</li>

					</ul>
				</li>
				

				

			</ul>

		</div>

	</div>



	<div class="main-content">
		<div class="row">

			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">

				<ul class="user-info pull-left pull-none-xsm">

					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">



						@if (empty(Auth::user()->photo ))
						<img src="{{ asset('images/nophoto.png')}}" alt="" class="img-circle" width="44">
						@else
						<img src="http://images.lenouvelliste.com/staff/{{ Auth::user()->photo }}" alt="" class="img-circle" width="44">
						@endif



							<?php if (Auth::check())
								{ ?>
								{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
								<?php $user_id = Auth::user()->id ?>
							<?php } ?>
						</a>



						<ul class="dropdown-menu">

							<!-- Reverse Caret -->
							<li class="caret"></li>

							<!-- Profile sub-links -->
							<li>
								<a href="{{ url('user/edit/'.$user_id.'')}}">
									<i class="entypo-user"></i>
									Modifier votre profil
								</a>
							</li>
						</ul>
					</li>

				</ul>

			</div>


			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">

				<ul class="list-inline links-list pull-right">

					<li class="sep"></li>

					<li>
					<form method="POST" action="{{ url('/') }}/logout">
					    {!! csrf_field() !!}
					    <button type="submit" class="btn btn-link">Se déconnecter <i class="entypo-logout right"></i></button>
					</form>

					</li>
				</ul>

			</div>

		</div>

		<hr>

		@yield('content')


	</div>



</div>




	<!-- Bottom scripts (common) -->

	<script src="{{ asset('js/gsap/main-gsap.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/moment.js') }}"></script>
	<!-- <script src="{{ asset('js/jquery-ui/js/jquery-ui.min.js') }}"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	
	<script src="{{ asset('js/bootstrap-datepicker.fr.min.js') }}"></script>
	<script src="{{ asset('js/joinable.js') }}"></script>
	<script src="{{ asset('js/resizeable.js') }}"></script>
	<script src="{{ asset('js/neon-api.js') }}"></script>
	<script src="{{ asset('js/wysihtml5/wysihtml5-0.4.0pre.min.js') }}"></script>
	<script src="{{ asset('js/lightbox.js') }}"></script>
	<script src="{{ asset('js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>


	@yield('javascript')

	<!-- JavaScripts initializations and stuff -->
	<script src="{{ asset('js/neon-custom.js') }}"></script>

	<!-- Demo Settings -->
	<script src="{{ asset('js/neon-demo.js') }}"></script>

</body>
</html>