<!DOCTYPE html>
<html ng-app="app">
<head>
	<base href="/">
	<meta charset="UTF-8">
	<title>Painel Acadêmico &lsaquo; Fazer Login</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport"/>
	<link rel="icon" href="img/favicon.png"/>
	<link rel="stylesheet" href="css/painel.css"/>
	<link rel="stylesheet" href="css/ngToast.min.css"/>
	<script src="js/angular/angular.min.js"></script>
	<script src="js/angular/angular-animate.min.js"></script> 
	<script src="js/angular/angular-sanitize.min.js"></script>
	<script src="js/angular/ngToast.min.js"></script> 
	<script src="js/app.js"></script> 
	<script src="js/services.js"></script> 
	<script src="js/controllers.js"></script> 
	 	 
</head>
<body ng-controller="ctrlLogin">
	<toast></toast>
	<div class="login">
		<div class="title">
			 <p>Painel Acadêmico</p> 
			 <img src="img/favicon.png"> 
		</div>
		<div class="content">
			<form ng-submit="fazerlogin()">
				<div class="group-input">
					<input type="text" placeholder="Usuário" required="required" ng-model="usuario.username">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
				<div class="group-input">
					<input type="password" placeholder="Senha" required="required" ng-model="usuario.password">
					<i class="fa fa-lock" aria-hidden="true"></i>
				</div>
				<button class="btn">Entrar</button>
			</form>
		</div>
	</div>
</body>
</html>