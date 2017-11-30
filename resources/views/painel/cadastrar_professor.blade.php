@extends('layout.base')
@section('titulo','Cadastrar Professor')

@section('conteudo')
<div ng-controller="ctrlProf" ng-init="initCad()">
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
	<form ng-submit="cadProfessor()">

		<small>Selecionar Pessoa já Cadastrada:</small>
		<div class="login-input">
			<select required="required" ng-model="prof.fk_pessoa">
				<option value="">Selecionar Pessoa </option>
				<option ng-repeat="pessoa in pessoas track by $index" ng-value="pessoa.id" ng-bind="(pessoa.nome) + (' - ') + (pessoa.CPF)"></option>	
			</select>
			<i class="fa fa-angle-down" aria-hidden="true"></i>			
		</div>
		
		<div class="login-input">
			<input type="text" placeholder="CEF" required="required" ng-model="prof.cef_professor">					
		</div>
		<small>Selecionar Departamento:</small>
		<div class="login-input">
			<select required="required" ng-model="prof.fk_departamento">
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