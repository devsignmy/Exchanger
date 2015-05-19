<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="mobile-web-app-capable" content="yes" />
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
		<title>Materilex Template | @yield("pageTitle")</title>
	  	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300italic,300,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>	
		<link rel="stylesheet" type="text/css" href="/css/materilex.css">
		<link rel="icon" type="image/png" href="/img/favicon2.png">
	</head>
	<body>
		<div class="loading-animation">
			<div class="spinner">
				<div class="spinner-inner"></div>
			</div>
		</div>

		@if(Auth::guest())
			<div class="side-navigation">
				<div class="side-navigation-inner">
					<div class="nav-top">
						
					</div>
					<div class="nav-content">
						<div class="nav-menu">
							<a class="nav-list" href="/"><i data-icon="home"></i> Home</a>
							<a class="nav-list" href="/panel"><i data-icon="apps"></i> Dashboard Panel</a>
							<a class="nav-list" href="/login"><i data-icon="apps"></i> Login Page</a>
							<a class="nav-list" href="/table"><i data-icon="apps"></i> Table</a>
						</div>
					</div>
				</div>
			</div>
		@endif

		@if(!Auth::guest())
			<div class="side-navigation">
				<div class="side-navigation-inner">
					<div class="nav-top">
						
					</div>
					<div class="nav-profile">
						<a href="javascript:"><img src="/img/profile.png" alt=""></a>
						<div class="profile-name">{{$loginuser->firstname . " " . $loginuser->lastname}}</div>
						<div class="profile-email">{{ $loginuser->email }}</div>
					</div>
					<div class="nav-content">
						<div class="nav-menu">
							<a class="nav-list @if($navigation_menu == 'panel') active @endif" href="/panel/"><i data-icon="apps"></i> Dashboard Panel</a>
							<a class="nav-list @if($navigation_menu == 'user') active @endif" href="/panel/user/"><i data-icon="account"></i> User Manager</a>
							<a class="nav-list @if($navigation_menu == 'bank') active @endif" href="/panel/bank/"><i data-icon="bank"></i> Bank Account Manager</a>
							<a class="nav-list" href="/panel/logout/"><i data-icon="key"></i> Logout</a>
						</div>
					</div>
				</div>
			</div>
		@endif
		
		@section("toolbar")

		@show
		@yield("content")
		@section("js")
			<script src="/js/jquery.min.js"></script>
			<script src="/js/disableScroll.js"></script>
			<script src="/js/materilex-dropdown.js"></script>
			<script src="/js/materilex-dialog.js"></script>
			<script src="/js/materilex-side-navigation.js"></script>
			<script src="/js/materilex-switcher.js"></script>
			<script src="/js/materilex-normal-input.js"></script>
			<script src="/js/materilex-popup.js"></script>
			<script src="/js/materilex-parallex.js"></script>
			<script src="/js/materilex-icon.js"></script>
			<script src="/js/materilex-ripple.js"></script>
			<script src="/js/materilex-activate.js"></script>
			<script src="/js/materilex-loading-animation.js"></script>
		@show
	</body>
</html>
