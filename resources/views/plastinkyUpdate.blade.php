<?php
?>
@extends('layouts.app')
@section('title-block')Пластины@endsection

@section('content')
    <h2>Изменить пластинки</h2>

    <form action="{{  route('plastinky-update-submit', $data->id) }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Введите названия</label>
            <input type="text" name="name" value="{{$data->name}}" class="form-control" id="name">
        </div>

        <div class="form-group">
            <label for="genre">Введите жанр</label>
            <input type="text" name="genre" value="{{$data->genre}}" class="form-control" id="genre">
        </div>

        <div class="form-group">
            <label for="date">Введите дату релиза</label>
            <input type="date" name="date" value="{{$data->date}}" class="form-control" id="date">
        </div>

        <div class="form-group">
            <label for="desc">Введите описание</label>
            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{$data->desc}}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Изменить</button>
    </form>

@endsection

