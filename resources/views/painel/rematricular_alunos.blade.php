 @extends('layout.base')
@section('titulo','Matricular Aluno')

@section('conteudo')
<div ng-controller="ctrlAluno" ng-init="initReMat()">
<toast></toast>
<div class="main-header">
	<h2>Matricular Aluno</h2>
	<div class="menu-header">
		<li>Home</li>
		<li>Alunos</li>
		<li><b>Matricular Aluno</b></li>
	</div>
</div>

<div class="widget">
	<form ng-submit="addMatr()">
		<small>Aluno:</small>
		<div class="login-input">
			<select required="required" ng-model="mat.curso">
				<option value="">Selecione</option>
				<option ng-repeat="aluno in alunos track by $index" ng-value="aluno.id" ng-bind="(aluno.nome) + (' - ') + (aluno.cpf)"></option>	
			</select>
		</div>
		<small>Curso:</small>
		<div class="login-input">
			<select required="required" ng-model="mat.curso">
				<option value="">Selecione</option>
				<option ng-repeat="curso in cursos track by $index" ng-value="curso.curso_id" ng-bind="curso.curso_nome"></option>	
			</select>
		</div>
		<small>Tipo Admissão:</small>
		<div class="login-input">
			<select required="required" ng-change="alunoAdm()" ng-model="mat.admissao">
				<option value="">Selecione</option>
				<option value="1">Matriculado</option>
				<option value="2">Transferido</option>
			</select>
		</div>
		<div ng-show="transf">
			<small>Faculdade de Origem:</small>
		<div class="login-input">
			<input type="text" ng-model="mat.transf">							
		</div>
		</div>
		
		<button class="btn btn-red"> Adicionar </button>
	</form>
</div>
</div>
@endsection
