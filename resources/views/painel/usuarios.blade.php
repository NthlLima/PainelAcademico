
@extends('layout.base')
@section('titulo','Usuários')

@section('conteudo')
<div ng-controller="ctrlUsuarios">
<toast></toast>
<div class="main-header">
	<h2>Usuários</h2>
	<div class="menu-header">
		<li>Home</li>
		<li><b>Usuários</b></li>
	</div>
</div>

<div class="widget">
	<div class="buttons">
		@if(Session::get('type') == 1 || Session::get('type') == 2)
           	<button ng-click="addAdmin()" class="btn btn-red"><i class="fa fa-user-plus" aria-hidden="true"></i> Adicionar Administrador</button>
        @else
        @endif
		@if(Session::get('type') == 1 || Session::get('type') == 2 || Session::get('type') == 3)
           	<button ng-click="addCord()" class="btn btn-red"><i class="fa fa-user-plus" aria-hidden="true"></i> Adicionar Coordenador</button>
        @else
        @endif
		<button ng-click="addSecr()" class="btn btn-red"><i class="fa fa-user-plus" aria-hidden="true"></i> Adicionar Secretário</button>
	</div>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<td>#</td>
				<td>Nome</td>
				<td>Função</td>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="usuario in usuarios track by $index">
				<td ng-bind="usuario.id"></td>
				<td ng-bind="usuario.nome"></td>
				<td ng-bind="usuario.funcao"></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="wrapper" ng-style="modal">
	<div class="modal medium animated slideInDown" id="modal-newuser" ng-style="modaladd">
		<div class="modal-header">
			<button class="btn-close" ng-click="closeModal()"><i class="fa fa-times" aria-hidden="true"></i></button>
			<div class="title">
				<i class="fa fa-user-plus" aria-hidden="true"></i>
				<p>Adicionar Usuário</p>
			</div>
		</div>
		<div class="modal-body">
			<form name="form.Usuario">
				<div class="login-input">
					<input type="text" placeholder="Primeiro Nome" required="required" ng-model="user.username">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
				<div class="login-input">
					<input type="password" placeholder="Senha" required="required" ng-model="user.password">
					<i class="fa fa-lock" aria-hidden="true"></i>
				</div>
				<div class="login-input">
					<input type="password" placeholder="Repetir Senha" required="required" ng-model="user.passrep">
					<i class="fa fa-lock" aria-hidden="true"></i>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<div class="align-right">
				<button class="btn-modal red" ng-click="closeModal()">Cancelar</button>
				<button class="btn-modal green" ng-click="addUser()">Adicionar</button>
			</div>
		</div>
	</div>
</div> 
</div>
@endsection