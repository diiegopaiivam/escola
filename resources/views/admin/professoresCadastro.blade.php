@extends('adminlte::page')

@section('title', 'Professores')
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

@section('content_header')
    <h1>Cadastrar Professor</h1>

    <ol class="breadcrumb">
        <li><a href="home">Dashboard</a></li>   
        <li><a href="">Cadastrar Professor</a></li>
    </ol>
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="card-form">
            <form action="/admin/professores/cadastro" method="POST" enctype="multipart/form-data" style="display: -webkit-box;">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="Name">Seu Nome Completo</label>
                    <input type="name" name="name" class="form-control" id="name" placeholder="Seu Nome">
                </div>
                <div class="form-group">
                    <label for="date">Data de Nascimento</label>
                    <input type="date" name="date" class="form-control" id="date">
                </div>
                <div class="form-group">
                    <label for="Email">Seu Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Seu Email">
                </div>
                <div class="form-group">
                    <label for="Disciplina">Disciplina</label>
                    <input type="name" name="disciplina" class="form-control" id="disciplina" placeholder="Disciplina">
                </div>
                <div class="form-group">
                    <label for="phone1">Celular</label>
                    <input type="tel" name="phone1"  class="form-control" id="phone1" placeholder="Celular">
                </div>
                <div class="form-group">
                    <label for="phone2">Celular</label>
                    <input type="tel" name="phone2" class="form-control" id="phone2" placeholder="Telefone">
                </div>
                <div class="form-group">
                    <label for="image">Imagem:</label>
                    <input type="file" name="image" placeholder="imagem" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" style="margin: 30px; width:63px;">Salvar</button>
            </form>
        </div>
    </div>
</div>
@stop