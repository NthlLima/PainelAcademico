 @extends('layout.base')
@section('titulo','Matricular Novo Aluno')

@section('conteudo')
<div ng-controller="ctrlAluno" ng-init="initMat()">
<toast></toast>
<div class="main-header">
	<h2>Matricular Novo Aluno</h2>
	<div class="menu-header">
		<li>Home</li>
		<li>Alunos</li>
		<li><b>Matricular Novo Aluno</b></li>
	</div>
</div>

<div class="widget">
	<form ng-submit="addAluno()">
		<small>Insira o Nome do Aluno:</small>
		<div class="login-input">
			<input type="text" placeholder="Primeiro Nome" ng-model="aluno.pnome" required="required">							
		</div>
		<div class="login-input">
			<input type="text" placeholder="Último Nome" ng-model="aluno.unome" required="required">							
		</div>
		<small>CPF:</small>
		<div class="login-input">
			<input type="text" ng-model="aluno.cpf" required="required">							
		</div>
		<small>Informações de Contato:</small>
		<div class="login-input">
			<input type="text" placeholder="Email" ng-model="aluno.email" required="required">							
		</div>
		<div class="login-input">
			<input type="text" placeholder="Telefone" ng-model="aluno.telefone" required="required">							
		</div>
		<small>Endereço do Aluno:</small>
		<div class="login-input">
			<input type="text" placeholder="CEP" ng-model="aluno.cep" required="required">							
		</div>
		<div class="login-input">
			<input type="text" placeholder="Rua" ng-model="aluno.rua" required="required">							
		</div>
		<div class="login-input">
			<input type="text" placeholder="Bairro" ng-model="aluno.bairro" required="required">							
		</div>
		<div class="login-input">
			<input type="text" placeholder="Cidade" ng-model="aluno.cidade" required="required">							
		</div>
		<div class="login-input">
			<input type="text" placeholder="Estado" ng-model="aluno.estado" required="required">							
		</div>
		<small>Curso:</small>
		<div class="login-input">
			<select required="required" ng-model="aluno.curso">
				<option value="">Selecione</option>
				<option ng-repeat="curso in cursos track by $index" ng-value="curso.id" ng-bind="curso.nome"></option>	
			</select>
		</div>
		<small>Tipo Admissão:</small>
		<div class="login-input">
			<select required="required" ng-change="alunoAdm()" ng-model="aluno.admissao">
				<option value="">Selecione</option>
				<option value="1">Matriculado</option>
				<option value="2">Transferido</option>
			</select>
		</div>
		<div ng-show="transf">
			<small>Faculdade de Origem:</small>
		<div class="login-input">
			<input type="text" ng-model="aluno.transf">							
		</div>
		</div>
		
		<button class="btn btn-red"> Adicionar </button>
	</form>
</div>
</div>
@endsection
