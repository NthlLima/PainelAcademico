@extends('layout.base')
@section('titulo','Matricular Alunos')

@section('conteudo')
<div><!-- ng-controller="" ng-init="init()" -->
<toast></toast>
<div class="main-header">
	<h2>Matricular Alunos em Disciplinas</h2>
	<div class="menu-header">
		<li>Home</li>
		<li><b>Matricular Alunos em Disciplinas</b></li>
	</div>
</div>

<div class="widget">
<!-- 	<div class="search">
		<div class="login-input">
			<select ng-model="search">
				<option value="">Selecione Curso</option>
				<option ng-repeat="curso in cursos track by $index" ng-value="curso.curso_id" ng-bind="curso.curso_nome"></option>	
			</select>
			<i class="fa fa-angle-down" aria-hidden="true"></i>							
		</div>
		<button class="btn btn-red" ng-click="buscarGrade()"><i class="fa fa-search" aria-hidden="true"></i>		Pesquisar</button>
	</div> -->
	<br>
	<br>
<!-- 	<table ng-show="table">
		<thead>
			<tr>
				<td>Periodo</td>
				<td>Disciplina</td>
				<td>No. de Horas</td>
				<td>No. de Créditos</td>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="g in grade track by $index">
				<td ng-bind="g.periodo"></td>
				<td ng-bind="g.disciplina"></td>
				<td ng-bind="g.horas"></td>
				<td ng-bind="g.creditos"></td>
			</tr>
		</tbody>
	</table> -->

</div>
</div>
@endsection
