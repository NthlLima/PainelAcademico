@extends('layout.base')
@section('titulo','Adicionar Disciplina a Grade')

@section('conteudo')
<div ng-controller="ctrlDisciplina" ng-init="initGrade()">
<toast></toast>
<div class="main-header">
	<h2>Adicionar Disciplina a Grade</h2>
	<div class="menu-header">
		<li>Home</li>
		<li>Disciplinas</li>
		<li><b>Adicionar Disciplina a Grade</b></li>
	</div>
</div>

<div class="widget">
	<form ng-submit="addDiscGrade()">
		<small>Selecione a Disciplina:</small>
		<div class="login-input">
			<select required="required" ng-model="grade.disciplina" ng-change="getCursos()">
				<option value="">Selecione</option>
				<option ng-repeat="disciplina in disciplinas track by $index" ng-value="disciplina.disciplina_id" ng-bind="disciplina.disciplina_nome"></option>	
			</select>
		</div>
		<small>Selecione o Curso:</small>
		<div class="login-input">
			<select required="required" ng-model="grade.curso">
				<option value="">Selecione</option>
				<option ng-repeat="c in cursos track by $index" ng-value="c.curso_id" ng-bind="c.curso_nome"></option>	
			</select>
		</div>
		<small>Insira o Período:</small>
		<div class="login-input">
			<input type="text" required="required" ng-model="grade.periodo" placeholder="Período">
		</div>
		<button class="btn btn-red"> Adicionar </button>
		
	</form>
</div>
</div>
@endsection
