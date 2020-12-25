<?php
?>
@extends('layouts.app')
@section('title-block')Пластины@endsection

@section('content')
    <h2>Добавить пластинки</h2>

    <form action="{{  route('vinylrecords-form') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Введите названия</label>
            <input type="text" name="name" placeholder="Введите названия" class="form-control" id="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="genre">Введите жанр</label>
            <input type="text" name="genre" placeholder="Введите жанр" class="form-control" id="genre" value="{{ old('genre') }}">
        </div>

        <div class="form-group">
            <label for="date">Введите дату релиза</label>
            <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}">
        </div>

        <div class="form-group">
            <label for="desc">Введите описание</label>
            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{ old('desc') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Добавить</button>
    </form>

@endsection

