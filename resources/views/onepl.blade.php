@extends('layouts.app')
@section('title-block'){{$data->name}}@endsection


@section('content')
    <h1>{{$data->name}}</h1>
    <div class="alert alert-info">
        <p>Описание: {{$data->desc}}</p>
        <p>Жанр: {{$data->genre}}</p>
        <p>Дата релиза: {{$data->date}}</p>
    </div>
    <a href="{{route('plastinky-update', $data->id)}}"><button class="btn btn-success">Изменить</button></a>
    <a href="{{route('plastinky-delete', $data->id)}}"><button class="btn btn-danger">Удалить</button></a>
@endsection


