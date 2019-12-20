@extends('adminlte::page')

@section('title', 'Professores')

@section('content_header')
    <h1>Professores</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Cadastrar Professor</a></li>
    </ol>
@stop

@section('content')
    @foreach ($professores as $professor)
        <div class="container">
            <div class="card">
                <img class="card-img-top" src="{{url('storage/'.$professor->image) }}" alt="Card image cap" style="max-width: 250px;">
                <div class="card-body">
                <h5 class="card-title">{{$professor->name}}</h5>
                <p class="card-text">{{$professor->phone1}} - {{$professor->phone2}}</p>
                <p class="card-text">{{$professor->email}}</p>
                </div>
            </div>
        </div>
    @endforeach
@stop