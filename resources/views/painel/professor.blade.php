@extends('layout.base')
@section('titulo','Professor')

@section('conteudo')
<div ng-controller="ctrlProf" ng-init="init()">
<toast></toast>
<div class="main-header">
	<h2>Professores</h2>
	<div class="menu-header">
		<li>Home</li>
		<li><b>Professores</b></li>
	</div>
</div>

<div class="widget">
	<div class="buttons">
		<a href="{{ route('painel.professor.adicionar') }}"><button class="btn btn-red"> Adicionar Novo Professor</button></a>
		<a href="{{ route('painel.professor.cadastrar') }}"><button class="btn btn-red"> Cadastrar Professor</button></a>
	</div>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<td>Nome</td>
				<td>Matrícula</td>
				<td>CEF</td>
				<td>Departamento</td>
				<td>Disciplinas</td>
				<td>Turmas</td>
				<td>+</td>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="prof in professores track by $index">
				<td ng-bind="prof.nome"></td>
				<td ng-bind="prof.mat"></td>
				<td ng-bind="prof.cef"></td>
				<td ng-bind="prof.dep"></td>
				<td ng-bind="prof.Disciplinas"></td>
				<td ng-bind="prof.Turmas"></td>
				<td><button class="btn-more" ng-click="infoProf(prof.id)"><i class="fa fa-angle-double-right" aria-hidden="true"></i></button></td>
			</tr>
		</tbody>
	</table>
</div>
</div>
@endsection