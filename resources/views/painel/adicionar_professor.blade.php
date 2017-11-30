@extends('layout.base')
@section('titulo','Professor')

@section('conteudo')
<div ng-controller="ctrlProf" ng-init="initAdd()">
<toast></toast>
<div class="main-header">
	<h2>Adicionar Professor</h2>
	<div class="menu-header">
		<li>Home</li>
		<li>Professor</li>
		<li><b>Adicionar Professor</b></li>
	</div>
</div>

<div class="widget">
	<form ng-submit="newProfessor()">
		<div class="login-input">
			<input type="text" placeholder="Primeiro Nome" required="required" ng-model="prof.pnome">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="Último Nome" required="required" ng-model="prof.unome">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="Email" required="required" ng-model="prof.email">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="CPF" required="required" ng-model="prof.cpf">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="Telefone" required="required" ng-model="prof.telefone">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="Rua" required="required" ng-model="prof.rua">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="Bairro" required="required" ng-model="prof.bairro">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="Cidade" required="required" ng-model="prof.cidade">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="Estado" required="required" ng-model="prof.estado">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="CEP" required="required" ng-model="prof.cep">					
		</div>
		<div class="login-input">
			<input type="text" placeholder="CEF" required="required" ng-model="prof.cef">					
		</div>
		<div class="login-input">
			<select required="required" ng-model="prof.dep">
				<option value=""> Departamento </option>
				<option ng-repeat="departamento in departamentos track by $index" ng-value="departamento.id" ng-bind="departamento.nome"></option>	
			</select>
			<i class="fa fa-angle-down" aria-hidden="true"></i>			
		</div>
		<button class="btn btn-red"> Adicionar </button>
	</form>
</div>
</div>
@endsection