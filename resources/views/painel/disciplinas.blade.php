@extends('layout.base')
@section('titulo','Disciplinas')

@section('conteudo')
<div ng-controller="ctrlDisciplina" ng-init="init()">
<toast></toast>
<div class="main-header">
	<h2>Disciplinas</h2>
	<div class="menu-header">
		<li>Home</li>
		<li><b>Disciplinas</b></li>
	</div>
</div>

<div class="widget">
	<div class="buttons">
		<a href="{{ route('painel.disciplinas.adicionar') }}"><button class="btn btn-red"> Adicionar Disciplina</button></a>
		<a href="{{ route('painel.disciplinas.pre_requisito') }}"><button class="btn btn-red"> Adicionar Disciplina Pré-requisito</button></a>
		<a href="{{ route('painel.disciplinas.adicionar.grade') }}"><button class="btn btn-red"> Adicionar Disciplina a Grade do Curso</button></a>
	</div>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<td>Nome</td>
				<td>Professor</td>
				<td>No. de Horas</td>
				<td>No. de Créditos</td>
				<td>Departamento</td>
				<td>Pré-requisitos</td>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="disciplina in disciplinas track by $index">
				<td ng-bind="disciplina.nome"></td>
				<td ng-bind="disciplina.professor"></td>
				<td ng-bind="disciplina.horas"></td>
				<td ng-bind="disciplina.creditos"></td>
				<td ng-bind="disciplina.departamento"></td>
				<td ng-bind="disciplina.requisito"></td>
			</tr>
		</tbody>
	</table>
</div>
</div>
@endsection
