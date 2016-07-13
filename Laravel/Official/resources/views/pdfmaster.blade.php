<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style>
	
	table {
		width: 100%;
		border-collapse: collapse;
		text-align: center;
	}

	table, th, td {
		border: 1px solid black;
	}
	
	</style>
	
</head>
<body>
	@yield('content')
		
	@yield('footer')
</body>



