@extends('adminlte::page')

@section('title', 'Professores')
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

@section('content_header')
    <h1>Professores</h1>

    <ol class="breadcrumb">
        <li><a href="home">Dashboard</a></li>   
        <li><a href="">Cadastrar Professor</a></li>
    </ol>
@stop

@section('content')
<div class="botoes">
    <a href="professores/cadastro" class="button btn btn-primary">Cadastrar Novo Professor</a>
</div>
<div class="container">
    @foreach ($professores as $professor)
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{url('storage/'.$professor->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{$professor->name}}</strong></h5>
                        <p class="card-text">{{$professor->phone1}} - {{$professor->phone2}}</p>
                        <p class="card-text">{{$professor->email}}</p>
                        <a href="professores/cadastro" class="button btn btn-success">Editar </a>
                        <a href="/admin/professor/<?php echo $professor->id?>" class="button btn btn-danger">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@stop