@extends('layout.base')
@section('titulo','Adicionar Turma')

@section('conteudo')
<div ng-controller="ctrlTurmas" ng-init="initAdd()"> 
<toast></toast>
<div class="main-header">
	<h2>Adicionar Professor</h2>
	<div class="menu-header">
		<li>Home</li>
		<li>Turmas</li>
		<li><b>Adicionar Turma</b></li>
	</div>
</div>

<div class="widget">
	<form ng-submit="AddTurma()">
		<small>Turma</small>
		<div class="login-input">
			<input type="text" placeholder="Insira a Turma, Ex.: NSF1201" required="required" ng-model="turma.turma_num">					
		</div>
		<small>Escolher Disciplina</small>
		<div class="login-input">
			<select required="required" ng-model="turma.turma_disciplina">
				<option value=""> Selecione </option>
				<option ng-repeat="disc in disciplinas track by $index" ng-value="disc.disciplina_id" ng-bind="disc.disciplina_nome"></option>	
			</select>
			<i class="fa fa-angle-down" aria-hidden="true"></i>			
		</div>
		<button class="btn btn-red"> Adicionar </button>
	</form>
</div>
</div>
@endsection