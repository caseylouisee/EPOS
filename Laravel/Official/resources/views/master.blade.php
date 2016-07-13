<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style>
	
	.page {
		position: fixed;
		width: 100%;
		height: 100%;
		left: 0;
		top: 0;
		background: #00A0F0;
		z-index: 10;
	}
	
	.menu {
		font-size:25px;
		font-family:'Lato';
	}
	
	.container {
		overflow: auto;
		background: #FFFFFF;
		border-radius: 15px;
		height: 85%;
	}
	
	.content {
		font-size: 20px;
		font-family:'Lato';
	}
	
	.jumbotron {
		margin-top: 15px;
	}
	
	.customerequipment{
		padding: 20px;
		display: none;
		margin-top: 20px;
		border: 1px solid #000;
	}
	
	.manufacturer{
		padding: 20px;
		display: none;
		margin-top: 20px;
		border: 1px solid #000;
	}
	
	.headoffice{
		padding: 20px;
		display: none;
		margin-top: 20px;
		border: 1px solid #000;
	}
	
	.customer_id{
		padding: 20px;
		display: none;
		margin-top: 20px;
		border: 1px solid #000;
	}
	
	.panel{
		margin-top: 15px;
	}
	
	img {
		display: inline-block;
		vertical-align: middle;
		max-height: 100%;
		max-width: 100%;
	}
	
	.navbar-custom { 
		background-color: #0088CC;
		border-color: #007EBD;
		background-image: none; 
	}
	.navbar-custom .navbar-nav>.active>a:hover,.navbar-custom .navbar-nav>li>a:hover, .navbar-custom .navbar-nav>li>a:focus { 
		background-color: #FFFFFF
	}
	.navbar-custom .navbar-nav>.active>a,.navbar-custom .navbar-nav>.open>a,.navbar-custom .navbar-nav>.open>a, .navbar-custom .navbar-nav>.open>a:hover,.navbar-custom .navbar-nav>.open>a, .navbar-custom .navbar-nav>.open>a:hover, .navbar-custom .navbar-nav>.open>a:focus { 
		background-color: #00A0F0
	}
	.dropdown-menu { 
		background-color: #FFFFFF
	}
	.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { 
		background-color: #428BCA;
		background-image: none; 
	}

	.navbar-custom .navbar-brand { 
		color: #FFFFFF
	}
	.navbar-custom .navbar-brand:hover { 
		color: #FFFFFF
	}
	.navbar-custom .navbar-nav>li>a { 
		color: #FFFFFF
	}
	.navbar-custom .navbar-nav>li>a:hover, .navbar-custom .navbar-nav>li>a:focus { 
		color: #0088CC
	}
	.navbar-custom .navbar-nav>.active>a,.navbar-custom .navbar-nav>.open>a, .navbar-custom .navbar-nav>.open>a:hover, .navbar-custom .navbar-nav>.open>a:focus { 
		color: #FFFFFF
	}
	.navbar-custom .navbar-nav>.active>a:hover, .navbar-custom .navbar-nav>.active>a:focus { 
		color: #00A0F0
	}
	.dropdown-menu>li>a { 
		color: #0088CC
	}
	.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { 
		color: #FFFFFF
	}
	.navbar-custom .navbar-nav>.dropdown>a .caret { 
		border-top-color: #999999;
		border-bottom-color: #0088CC;
	}
	.navbar-custom .navbar-nav>.dropdown>a:hover .caret { 
		border-top-color: #FFFFFF;
		border-bottom-color: #FFFFFF
	}
	
	.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form {
		font-family: Arial, Helvetica, sans-serif; 
		color: black
	}
	
	.bootstrap-iso form button, .bootstrap-iso form button:hover {
		color: white !important;
	} 
	
	.asteriskField {
		color: red;
	}
		
	</style>
	
</head>
<body>
<div class="page">
	<header class="navbar navbar-custom">
		<div class="menu">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a href="/home"><span class="fa fa-home" aria-hidden="true"></span>
						Home
					</a></li>
					<li><a href="/customers"><span class="fa fa-users" aria-hidden="true"></span>
						Customers
					</a></li>
					<li><a href="/equipments"><span class="fa fa-briefcase" aria-hidden="true"></span>
						Equipment
					</a></li>
					<li><a href="/contracts"><span class="fa fa-book" aria-hidden="true"></span>
						Contracts
					</a></li>
					<li><a href="/manufacturers"><span class="fa fa-wrench" aria-hidden="true"></span>
						Manufacturers
					</a></li>
					<li><a href="/manufacturers"><span class="fa fa-user" aria-hidden="true"></span>
						Log in
					</a></li>
				</ul>
			</div> <!-- container fluid -->
		</div> <!-- menu -->
	</header>
	
	<div class="container">
		<div class="content">
			@yield('content')
		</div>
	</div>
		<script src="http://code.jquery.com/jquery.js"></script>
	
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				
		<!-- select 2 -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		<!-- morris.js -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
		
		<!-- fonts -->
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:100">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		
		@yield('footer')
		<div style="text-align:right; color:white; margin-right:10pt; margin-top:5pt">
			Created by Casey Denner   
		</div>

</div>
</body>



