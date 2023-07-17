<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard">
	<meta name="author" content="IOT">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="{{ asset('assets/dashboard/adminkit/fonts/fonts.gstatic.com/index.html') }}">
	<link rel="shortcut icon" href="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" />
	
   <title>{{ $title . ' - ' . config('app.name') }}</title>

   @include('dashboard.template.partials.css')
	@stack('style')
	@stack('head')
</head>

<!--
  HOW TO USE: 
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
		@include('dashboard.template.partials.sidebar')

		<div class="main">
			@include('dashboard.template.partials.header')

			<main class="content">
				<div class="container-fluid p-0">

					@yield('content')

				</div>
			</main>

			@include('dashboard.template.partials.footer')
		</div>
	</div>

	<script src="{{ asset('assets/dashboard/adminkit/js/app.js') }}"></script>

	@include('dashboard.template.partials.modal.logout')

	@stack('modal')
   @stack('javascript')
   @stack('script')

</body>
</html>