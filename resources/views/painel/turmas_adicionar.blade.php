@extends('layout.base')
@section('titulo','Adicionar Turma')

@section('conteudo')
<div ng-controller="ctrlTurmas" ng-init="initAdd()"> 
<toast></toast>
<div class="main-header">
	<h2>Adicionar Turma</h2>
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
		<small>Escolher Horários</small>
		<div class="login-input">
			<select required="required" ng-model="turma.horario[0]">
				<option value=""> Selecione o Primerio Horário</option>
				<option value="AB"> AB = 07:30 - 09:10</option>
				<option value="CD"> CD = 09:20 - 11:00 </option>
				<option value="EF"> EF = 11:10 - 12:50 </option>
				<option value="GH"> GH = 13:00 - 14:40 </option>
				<option value="IJ"> IJ = 14:50 - 16:30 </option>
				<option value="LM"> LM = 16:40 - 18:20 </option>
				<option value="NO"> NO = 18:30 - 20:10 </option>
				<option value="PQ"> PQ = 20:20 - 22:00 </option>
			</select>
			<i class="fa fa-angle-down" aria-hidden="true"></i>			
		</div>
		<div class="login-input">
			<select required="required" ng-model="turma.horario[1]">
				<option value=""> Selecione o Segundo Horário</option>
				<option value="AB"> AB = 07:30 - 09:10</option>
				<option value="CD"> CD = 09:20 - 11:00 </option>
				<option value="EF"> EF = 11:10 - 12:50 </option>
				<option value="GH"> GH = 13:00 - 14:40 </option>
				<option value="IJ"> IJ = 14:50 - 16:30 </option>
				<option value="LM"> LM = 16:40 - 18:20 </option>
				<option value="NO"> NO = 18:30 - 20:10 </option>
				<option value="PQ"> PQ = 20:20 - 22:00 </option>
			</select>
			<i class="fa fa-angle-down" aria-hidden="true"></i>			
		</div>
		<small>Escolher Dias</small>
		<div class="login-input">
			<select required="required" ng-model="turma.dia[0]">
				<option value=""> Selecione o Primerio Dia</option>
				<option value="2"> 2 = Segunda</option>
				<option value="3"> 3 = Terça </option>
				<option value="4"> 4 = Quarta </option>
				<option value="5"> 5 = Quinta </option>
				<option value="6"> 6 = Sexta </option>
				<option value="7"> 7 = Sábado </option>
			</select>
			<i class="fa fa-angle-down" aria-hidden="true"></i>			
		</div>
		<div class="login-input">
			<select required="required" ng-model="turma.dia[1]">
				<option value=""> Selecione o Segundo Dia</option>
				<option value="2"> 2 = Segunda</option>
				<option value="3"> 3 = Terça </option>
				<option value="4"> 4 = Quarta </option>
				<option value="5"> 5 = Quinta </option>
				<option value="6"> 6 = Sexta </option>
				<option value="7"> 7 = Sábado </option>
			</select>
			<i class="fa fa-angle-down" aria-hidden="true"></i>			
		</div>
		<button class="btn btn-red"> Adicionar </button>
	</form>
</div>
</div>
@endsection