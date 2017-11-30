@extends('layout.base')
@section('titulo','Adicionar Disciplina')

@section('conteudo')
<div ng-controller="ctrlDisciplina" ng-init="initAdd()">
<toast></toast>
<div class="main-header">
	<h2>Disciplinas</h2>
	<div class="menu-header">
		<li>Home</li>
		<li>Disciplinas</li>
		<li><b>Adicionar Disciplina</b></li>
	</div>
</div>

<div class="widget">
	<form ng-submit="addDisc()">
		<small>Insira o nome da disciplina:</small>
		<div class="login-input">
			<input type="text" placeholder="Nome" ng-model="disciplina.disciplina_nome" required="required">					
		</div>
		<small>Insira a ementa disciplina:</small>
		<div class="login-input">
			<textarea ng-model="disciplina.ementa" required="required" rows="5"></textarea>					
		</div>
		<small>Número de Horas:</small>
		<div class="login-input">
			<input type="text" placeholder="Ex.: 60" ng-model="disciplina.num_horas" required="required">					
		</div>
		<small>Número de Créditos:</small>
		<div class="login-input">
			<input type="text" placeholder="Ex.: 40" ng-model="disciplina.num_creditos" required="required">					
		</div>
		<small>Escolha o Departamento:</small>
		<div class="login-input">
			<select required="required" ng-change="getProfs()" ng-model="disciplina.departamento">
				<option value="">Selecione</option>
				<option ng-repeat="dep in deps track by $index" ng-value="dep.id" ng-bind="dep.nome"></option>	
			</select>
		</div>
		<small>Escolha o Professor:</small>
		<div class="login-input">
			<select required="required" ng-model="disciplina.professor">
				<option value="">Selecione</option>
				<option ng-repeat="prof in profs track by $index" ng-value="prof.id" ng-bind="(prof.nome) + (' - ') + (prof.matricula)"></option>	
			</select>
		</div>
		<button class="btn btn-red"> Adicionar </button>
		
	</form>
</div>
</div>
@endsection
