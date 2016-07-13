<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome</title>	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style>
	
	html, body {
		height: 100%;
	}
	
	body {
		margin: 0;
		padding: 0;
		width: 100%;
		display: table;
		font-weight: 100;
		font-family: 'Lato';
		font-size: 20px;
	}

	.container {
		text-align: center;
		display: table-cell;
		vertical-align: middle;
		font-family:'Lato';
		font-size:20px;
		background-color: #0088cc;
	}

	.title {
		font-size: 96px;
		margin-bottom: 40px;
	}

	.menu {
		font-size:25px;
		font-family:'Lato';
	}
	
	.content {
		width: 100%;
		vertical-align: middle;
		font-size:20px;
		font-family:'Lato';
	}
	
	.btn-custom {
		color: #FFFFFF;
		background-color: #60BFD5;
		border-color: #60BFD5;
		/* 778899 - grey */
	}
		
	</style>
	
</head>
<body>
	<div class="container">
		<div class="content">
			<div class="container">
				<div class="col-md-12">
					<a href="/customertest">
						<img src="{{('/images/Customers.jpeg')}}" alt="" class="img-center">
					</a>
					<a href="/manufacturers">
						<img src="{{('/images/Manufacturers.jpeg')}}" alt="" class="img-center">
					</a>
					<a href="/equipmentServices">
						<img src="{{('/images/Equipment.jpeg')}}" alt="" class="img-center">
					</a>
					<a href="/contracts">
						<img src="{{('/images/Contracts.jpeg')}}" alt="" class="img-center">
					</a>
				</div>
			</div>
		</div>
		
		<!-- select 2 -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- morris graphs -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
		@yield('footer')
		
	</div> <!--container-->
</body>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- select 2 -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<!-- morris.js -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<!-- fonts -->
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:100">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

