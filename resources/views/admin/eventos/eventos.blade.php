@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>SISTEMA ESCOLA!</h1>
@stop

@section('content') 
    @if ($eventos == [''] || $eventos == "")
        <p>NÃO HÁ EVENTOS CADASTRADOS</p> 
    @else
        @include('includes.alerts')
        <div class="container">
            <div class="row">
                <div class="card">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Titulo do Evento</th>
                                <th scope="col">Data</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        @foreach ($eventos as $evento)
                            <tbody>
                                <tr>
                                    <td><a href="/eventos/<?php echo str_replace('' $evento->title)?>">{{$evento->title}}</a></td>
                                    <td><a href="/eventos/<?php echo $evento->title?>">{{$evento->date}}</a></td>
                                    <td><a href="/eventos/<?php echo $evento->title?>/adicionar">Adicionar Fotos</a> - <a href="#">Editar</a> - <a href="#">Excluir</a></td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endif
    <br>
    <div class="botoes">
        <a href="eventos/cadastro" class="button btn btn-primary">Cadastrar Novo Evento</a>
    </div>
@stop