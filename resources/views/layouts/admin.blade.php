<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>Pyscom Administración</title>
	<!-- Favicon -->
	<link rel="icon" href="{{ asset('assets/dashboard/images/favicon.png') }}" type="image/png">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="{{ asset('assets/dashboard/css/nucleo/nucleo.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('assets/dashboard/fontawesome/css/all.min.css') }}" type="text/css">
	<!-- Page plugins -->
	<!-- Argon CSS -->
	<link rel="stylesheet" href="{{ asset('assets/dashboard/css/argon.css') }}" type="text/css">

	@yield('extra-css')

	{{-- LiveWire --}}
	@livewireStyles

</head>

<body>
	<!-- Sidenav -->
	<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<!-- Brand -->
			<div class="sidenav-header  align-items-center">
				<a class="navbar-brand" href="javascript:void(0)">
					<img src="{{ asset('assets/dashboard/images/blue.png') }}" class="navbar-brand-img" alt="...">
				</a>
			</div>
			<div class="navbar-inner">
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<!-- Nav items -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.index') }}">
								<i class="ni ni-tv-2 text-primary"></i>
								<span class="nav-link-text">Inicio</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ Request::is('clients') ? 'active' : '' }}" href="{{ route('clients.index') }}">
								<i class="fas fa-users text-success"></i>
								<span class="nav-link-text">Clientes</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ Request::is('table-orders-sale') ? 'active' : '' }}" href="{{ route('orders.index') }}">
								<i class="fas fa-dollar-sign"></i>
								<span class="nav-link-text">Ordenes de venta</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ Request::is('table-orders-services') ? 'active' : '' }}" href="{{ route('orderService.index') }}">
								<i class="fas fa-concierge-bell"></i>
								<span class="nav-link-text">Ordenes de servicio</span>
							</a>
						</li>
					</ul>
					<!-- Divider -->
					<hr class="my-3">
					<!-- Heading -->
					<h6 class="navbar-heading p-0 text-muted">
						<span class="docs-normal">Documentation</span>
					</h6>
					<!-- Navigation -->
					<ul class="navbar-nav mb-md-3">
						<li class="nav-item">
							<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
								<i class="ni ni-spaceship"></i>
								<span class="nav-link-text">Getting started</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
								<i class="ni ni-palette"></i>
								<span class="nav-link-text">Foundation</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
								<i class="ni ni-ui-04"></i>
								<span class="nav-link-text">Components</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
								<i class="ni ni-chart-pie-35"></i>
								<span class="nav-link-text">Plugins</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Search form -->
					
					<!-- Navbar links -->
					<ul class="navbar-nav align-items-center  ml-md-auto ">
						<li class="nav-item d-xl-none">
							<!-- Sidenav toggler -->
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
						<li class="nav-item d-sm-none">
							<a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
								<i class="ni ni-zoom-split-in"></i>
							</a>
						</li>
					</ul>
					<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
						<li class="nav-item dropdown">
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="media align-items-center">
									<span class="avatar avatar-sm rounded-circle">
										<img alt="Image placeholder" src="{{ asset('assets/dashboard/images/theme/team-4.jpg') }}">
									</span>
									<div class="media-body  ml-2  d-none d-lg-block">
										<span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu  dropdown-menu-right ">
								<div class="dropdown-header noti-title">
									<h6 class="text-overflow m-0">Bienvenido!</h6>
								</div>
								<a href="#!" class="dropdown-item">
									<i class="fas fa-user"></i>
									<span>Mi Perfíl</span>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt"></i>
								<span>Cerrar Sesión</span>
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- Header -->

<!-- Page content -->

@yield('content')

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('assets/dashboard/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/jquery.scroll-lock/jquery-scrollLock.min.js') }}"></script>
<!-- Optional JS -->
<script src="{{ asset('assets/dashboard/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/chart.js/Chart.extension.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('assets/dashboard/js/argon.js') }}"></script>

@yield('extra-js')

{{-- LiveWire --}}
@livewireScripts

</body>

</html>
