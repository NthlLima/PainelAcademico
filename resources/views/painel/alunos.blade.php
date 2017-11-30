@extends('layout.base')
@section('titulo','Alunos')

@section('conteudo')
<div ng-controller="ctrlAluno" ng-init="init()">
<toast></toast>
<div class="main-header">
	<h2>Alunos</h2>
	<div class="menu-header">
		<li>Home</li>
		<li><b>Alunos</b></li>
	</div>
</div>

<div class="widget">
	<div class="buttons">
		<a href="{{ route('painel.alunos.matricula') }}"><button class="btn btn-red"> Matricular Novo Aluno</button></a>
		<a href="{{ route('painel.alunos.rematricula') }}"><button class="btn btn-red"> Matricular Aluno</button></a>
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
<!-- 			<tr ng-repeat="curso in cursos track by $index">
				<td ng-bind="curso.nome"></td>
				<td ng-bind="curso.horas"></td>
				<td ng-bind="curso.creditos"></td>
				<td ng-bind="curso.coord"></td>
				<td ng-bind="curso.area"></td>
				<td ng-bind="curso.dep"></td>
			</tr> -->
		</tbody>
	</table>
</div>
</div>
@endsection
