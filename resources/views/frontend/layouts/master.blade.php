<!doctype html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<head>
		@include('frontend.layouts.headcss')	
	</head>
    <body class="homepage1-body">
		@include('frontend.layouts.header-top')
		@yield('main-content')
		@include('frontend.layouts.footer')
		@include('frontend.layouts.footerjs')
	</body>
</html>