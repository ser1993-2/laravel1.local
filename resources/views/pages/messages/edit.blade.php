
@extends('index')

@section('content')

    <form method="post" id="id-form_messages">
        <div class="form-group">
            <label for="InputName">Имя</label>
            <input type="text" class="form-control" id="InputName" name="name" placeholder="Имя" value="{{$message[0]->username}}">
        </div>

        <div class="form-group">
            <label for="InputEmail1">Email</label>
            <input type="email" class="form-control" id="InputEmail1" name="email" placeholder="Email" value="{{$message[0]->email}}">
        </div>

        <div class="form-group">
            <label for="InputMessages">Сообщение</label>
            <textarea class="form-control" placeholder="Сообщение" name="Message" rows="5" cols="50" id="InputMessages"> {{$message[0]->message}}</textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Добавить">
        </div>

    </form>

    @stop


