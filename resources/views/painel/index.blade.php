
@extends('layout.base')
@section('titulo','Dasboard')

@section('conteudo')
logado no painel

{{ Session::get('type') }}

@endsection