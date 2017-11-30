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
				<td>Matricula</td>
				<td>Nome</td>
				<td>CPF</td>
				<td>Curso</td>
				<td>Data de Ingresso</td>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="aluno in alunos track by $index">
				<td ng-bind="aluno.matricula"></td>
				<td ng-bind="aluno.nome"></td>
				<td ng-bind="aluno.cpf"></td>
				<td ng-bind="aluno.curso"></td>
				<td ng-bind="aluno.data"></td>
			</tr>
		</tbody>
	</table>
</div>
</div>
@endsection
