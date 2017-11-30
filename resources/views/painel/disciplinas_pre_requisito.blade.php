@extends('layout.base')
@section('titulo','Adicionar Disciplina Pré-requisito')

@section('conteudo')
<div ng-controller="ctrlDisciplina" ng-init="initPre()">
<toast></toast>
<div class="main-header">
	<h2>Disciplinas</h2>
	<div class="menu-header">
		<li>Home</li>
		<li>Disciplinas</li>
		<li><b>Adicionar Disciplina Pré-requisito</b></li>
	</div>
</div>

<div class="widget">
	<form ng-submit="addDiscPre()">
		<small>Selecione a Disciplina:</small>
		<div class="login-input">
			<select required="required" ng-change="getPreR()" ng-model="prereq.disciplina">
				<option value="">Selecione</option>
				<option ng-repeat="disciplina in disciplinas track by $index" ng-value="disciplina.disciplina_id" ng-bind="disciplina.disciplina_nome"></option>	
			</select>
		</div>
		<small>Selecione a Disciplina Pré-requisito:</small>
		<div class="login-input">
			<select required="required" ng-model="prereq.pre_requisito">
				<option value="">Selecione</option>
				<option ng-repeat="PRdisciplina in PRdisciplinas track by $index" ng-value="PRdisciplina.id" ng-bind="PRdisciplina.nome"></option>	
			</select>
		</div>
		<button class="btn btn-red"> Adicionar </button>
		
	</form>
</div>
</div>
@endsection
