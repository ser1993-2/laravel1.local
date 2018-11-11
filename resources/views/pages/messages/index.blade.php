@extends('index')

@section('content')

    <div class="form-group">
        <a href="add" class="btn btn-success" >Добавить клиента</a>
    </div>

    <div class="text-right"><b>Всего автомобилей:</b><i class="badge">{{ $count }}</i></div><br/>

    <div class="row">
   @include('pages.messages._items')
    </div>
    @stop
