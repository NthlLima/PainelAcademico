@extends('layout.base')
@section('titulo','Adicionar Curso')

@section('conteudo')
<div ng-controller="ctrlCurso" ng-init="initAdd()">
<toast></toast>
<div class="main-header">
	<h2>Adicionar Curso</h2>
	<div class="menu-header">
		<li>Home</li>
		<li>Cursos</li>
		<li><b>Adicionar Curso</b></li>
	</div>
</div>

<div class="widget">
	<form ng-submit="addCurso()">
		<small>Insira o nome do curso:</small>
		<div class="login-input">
			<input type="text" placeholder="Nome" ng-model="curso.curso_nome" required="required">					
		</div>
		<small>Número de Horas:</small>
		<div class="login-input">
			<input type="text" placeholder="Ex.: 60" ng-model="curso.num_horas" required="required">					
		</div>
		<small>Número de Créditos:</small>
		<div class="login-input">
			<input type="text" placeholder="Ex.: 40" ng-model="curso.num_creditos" required="required">					
		</div>
		<small>Escolha a Area de Atuação do curso:</small>
		<div class="login-input">
			<select required="required" ng-change="getProfs()" ng-model="curso.area_fk">
				<option value="">Selecione</option>
				<option ng-repeat="area in areas track by $index" ng-value="area.id" ng-bind="area.nome"></option>	
			</select>
		</div>
		<small>Escolha o Professor que será o Coordenador do curso:</small>
		<div class="login-input">
			<select required="required" ng-model="curso.coordenador">
				<option value="">Selecione</option>
				<option ng-repeat="prof in profs track by $index" ng-value="prof.id" ng-bind="(prof.nome) + (' - ') + (prof.matricula)"></option>	
			</select>
		</div>
		<button class="btn btn-red"> Adicionar </button>
	</form>
</div>
</div>
@endsection
