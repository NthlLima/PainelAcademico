@extends('layout.base')
@section('titulo','Informações do Professor')
@section('conteudo')
<div ng-controller="ctrlProf" ng-init="initInfo()">
<toast></toast>
<div class="main-header">
	<h2>Informações do Professor</h2>
	<div class="menu-header">
		<li>Home</li>
		<li>Professores</li>
		<li><b>Informações do Professor</b></li>
	</div>
</div>

<div class="widget">
	<small>Nome</small>
	<p ng-bind="professor.nome"></p>
	<small>Telefone</small>
	<p ng-bind="professor.telefone"></p>
	<small>Email</small>
	<p ng-bind="professor.email"></p>
	<small>CPF</small>
	<p ng-bind="professor.CPF"></p>
	<small>Matrícula</small>
	<p ng-bind="professor.mat"></p>
	<small>CEF</small>
	<p ng-bind="professor.cef"></p>
	<small>Departamento</small>
	<p ng-bind="professor.dep"></p>
	<h5>Endereço</h5>
	<small>CEP</small>
	<p ng-bind="professor.CEP"></p>
	<small>Rua</small>
	<p ng-bind="professor.rua"></p>
	<small>Bairro</small>
	<p ng-bind="professor.bairro"></p>
	<small>Cidade</small>
	<p ng-bind="professor.cidade"></p>
	<small>Estado</small>
	<p ng-bind="professor.estado"></p>
</div>
</div>
@endsection
