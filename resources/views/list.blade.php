@extends('layouts.app')
@section('title-block')Список Пластинки@endsection


@section('content')
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Названия</th>
            <th scope="col">Описание</th>
            <th scope="col">Жанр</th>
            <th scope="col">Дата релиза</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $el)
        <tr>
            <th scope="row">{{$el->id}}</th>
            <td>{{$el->name}}</td>
            <td>{{$el->desc}}</td>
            <td>{{$el->genre}}</td>
            <td>{{$el->date}}</td>
            <td><a href="{{route('vinylrecords-one', $el->id)}}">view</a> <a href="{{route('vinylrecords-update', $el->id)}}">update</a> <a href="{{route('vinylrecords-delete', $el->id)}}">delete</a></td>

        </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links()}}

@endsection


