@extends('adminlte::page')

@section('title', 'Eventos')
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

@section('content_header')
    <h1>Cadastrar Evento</h1>

    <ol class="breadcrumb">
        <li><a href="home">Dashboard</a></li>   
        <li><a href="#">Cadastrar Evento</a></li>
    </ol>
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="card-form">
            <form action="/admin/eventos/cadastro" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="Title">Título</label>
                    <input type="name" name="title" class="form-control" id="title" placeholder="Titulo do evento">
                </div>
                <div class="form-group">
                    <label for="Body">Descrição do Evento</label>
                    <textarea type="text" name="body" class="form-control" id="body" placeholder="Descrição do evento"></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Data do Evento</label>
                    <input type="date" name="date" class="form-control" id="date">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@stop