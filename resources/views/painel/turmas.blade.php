@extends('layout.base')
@section('titulo','Turmas')

@section('conteudo')
<div>   <!-- ng-controller="ctrlGrade" ng-init="init()" -->
<toast></toast>
<div class="main-header">
	<h2>Turmas</h2>
	<div class="menu-header">
		<li>Home</li>
		<li><b>Turmas</b></li>
	</div>
</div>

<div class="widget">
	<a href="{{ route('painel.turmas.adicionar') }}"><button class="btn btn-red">Adicionar Turma</button></a>
</div>
</div>
@endsection
