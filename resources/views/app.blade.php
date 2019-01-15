<html lang="en">
<head>
	<title>Sistem Manajemen Perpustakaan dengan Laravel & Angular</title>
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
	<!-- Angular JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-route.min.js"></script>
	<!-- MY App -->
	<script src="{{ asset('/app/packages/dirPagination.js') }}"></script>
	<script src="{{ asset('/app/routes.js') }}"></script>
	<script src="{{ asset('/app/services/myServices.js') }}"></script>
	<script src="{{ asset('/app/helper/myHelper.js') }}"></script>
	<!-- App Controller -->
    <script src="{{ asset('/app/controllers/bookController.js') }}"></script>
    <script src="{{ asset('/app/controllers/userController.js') }}"></script>
    <script src="{{ asset('/app/controllers/borrowController.js') }}"></script>
</head>
<body ng-app="main-App">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Perpustakaan</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#/">Beranda</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#/books">Buku</a>
            </li>
            <li class="nav-item">
				<a class="nav-link" href="#/users">Akun</a>
            </li>
            <li class="nav-item">
				<a class="nav-link" href="#/borrows">Peminjaman</a>
			</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<ng-view></ng-view>
	</div>
</body>
</html>