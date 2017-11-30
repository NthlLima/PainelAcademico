@extends('layout.base')
@section('titulo','Cursos')

@section('conteudo')
<div ng-controller="ctrlCurso" ng-init="init()">
<toast></toast>
<div class="main-header">
	<h2>Cursos</h2>
	<div class="menu-header">
		<li>Home</li>
		<li><b>Cursos</b></li>
	</div>
</div>

<div class="widget">
	<div class="buttons">
		<a href="{{ route('painel.cursos.adicionar') }}"><button class="btn btn-red"> Adicionar Novo Curso</button></a>
	</div>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<td>Nome</td>
				<td>No. de Horas</td>
				<td>No. de Créditos</td>
				<td>Coordenador</td>
				<td>Area de Atuação</td>
				<td>Departamento</td>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="curso in cursos track by $index">
				<td ng-bind="curso.nome"></td>
				<td ng-bind="curso.horas"></td>
				<td ng-bind="curso.creditos"></td>
				<td ng-bind="curso.coord"></td>
				<td ng-bind="curso.area"></td>
				<td ng-bind="curso.dep"></td>
			</tr>
		</tbody>
	</table>
</div>
</div>
@endsection
