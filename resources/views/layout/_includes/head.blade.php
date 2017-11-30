<!DOCTYPE html>
<html ng-app="app">
<head>
	<base href="/">
	<meta charset="UTF-8">
	<title>Painel Acadêmico > @yield('titulo')</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport"/>
	<link rel="icon" href="img/favicon.png"/>
	<link rel="stylesheet" href="css/painel.css"/>
	<link rel="stylesheet" href="css/ngToast.min.css"/>
	<script src="js/angular/angular.min.js"></script>
	<script src="js/angular/angular-animate.min.js"></script> 
	<script src="js/angular/angular-sanitize.min.js"></script>
	<script src="js/angular/ngToast.min.js"></script> 
	<script src="js/jquery/dist/jquery.min.js"></script> 
	<script src="js/app.js"></script> 
	<script src="js/services.js"></script> 
	<script src="js/controllers.js"></script> 
	<script type="text/javascript">
		$(document).ready(function(){
			$(".navicon").click(function(){
		 		$(".item-text").toggle('slide');
		 	});
		});
	</script>
	 	 
</head>