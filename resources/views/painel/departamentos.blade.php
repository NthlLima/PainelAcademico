
@extends('layout.base')
@section('titulo','Departamentos')

@section('conteudo')
<div ng-controller="ctrlDep" ng-init="init()">
<toast></toast>
<div class="main-header">
	<h2>Departamentos</h2>
	<div class="menu-header">
		<li>Home</li>
		<li><b>Departamentos</b></li>
	</div>
</div>

<div class="widget">
	<div class="buttons">
		<button ng-click="openModal()" class="btn btn-red"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Departamento</button>
		<button ng-click="openArea()" class="btn btn-red"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Area de Atuação</button>
	</div>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<td>#</td>
				<td>Nome</td>
				<td>Area de Atuação</td>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="departamento in departamentos track by $index">
				<td ng-bind="departamento.id"></td>
				<td ng-bind="departamento.nome"></td>
				<td ng-bind="departamento.area"></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="wrapper" ng-style="modal">
	<div class="modal medium animated slideInDown" ng-style="modalarea">
		<div class="modal-header">
			<button class="btn-close" ng-click="closeArea()"><i class="fa fa-times" aria-hidden="true"></i></button>
			<div class="title">
				<i class="fa fa-plus" aria-hidden="true"></i>
				<p>Adicionar Area de Atuação</p>
			</div>
		</div>
		<div class="modal-body">
			<form>
				<div class="login-input">
					<input type="text" placeholder="Nome" required="required" ng-model="area.area_nome">
				</div>
				<div class="login-input">
					<select required="required" ng-model="area.dep_fk">
						<option value="">Selecionar Departamento </option>
						<option ng-repeat="dep_a in dep_atuacao track by $index" ng-value="dep_a.id" ng-bind="dep_a.nome"></option>	
					</select>
					<i class="fa fa-angle-down" aria-hidden="true"></i>			
				</div>				
			</form>
		</div>
		<div class="modal-footer">
			<div class="align-right">
				<button class="btn-modal red" ng-click="closeArea()">Cancelar</button>
				<button class="btn-modal green" ng-click="addArea()">Adicionar</button>
			</div>
		</div>
	</div>
	<div class="modal medium animated slideInDown" id="modal-newuser" ng-style="modaladd">
		<div class="modal-header">
			<button class="btn-close" ng-click="closeModal()"><i class="fa fa-times" aria-hidden="true"></i></button>
			<div class="title">
				<i class="fa fa-plus" aria-hidden="true"></i>
				<p>Adicionar Departamento</p>
			</div>
		</div>
		<div class="modal-body">
			<form>
				<div class="login-input">
					<input type="text" placeholder="Nome" required="required" ng-model="dep.dep_nome">					
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<div class="align-right">
				<button class="btn-modal red" ng-click="closeModal()">Cancelar</button>
				<button class="btn-modal green" ng-click="addDep()">Adicionar</button>
			</div>
		</div>
	</div>
</div> 
</div>
@endsection