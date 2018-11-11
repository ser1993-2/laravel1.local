
@extends('index')

@section('content')

    <form method="post" id="id-form_messages">
        <div class="form-group">
            <label for="InputName">Имя</label>
            <input type="text" class="form-control" id="InputName" name="name" value="{{$message[0]->username}}">
        </div>

        <div class="form-group">
            <label for="Inputgender">Пол</label>
            <input type="text" class="form-control" id="Inputgender" name="gender" value="{{$message[0]->gender}}">
        </div>

        <div class="form-group">
            <label for="Inputtel">Телефон</label>
            <input type="tel" class="form-control" id="Inputtel" name="tel" value="{{$message[0]->phone}}">
        </div>

        <div class="form-group">
            <label for="Inputadress">Адрес</label>
            <input type="tel" class="form-control" id="Inputadress" name="adress" value="{{$message[0]->adress}}">
        </div>

    </form>

    @if ( ! $message->isEmpty() )
        @foreach($message as $item)
            <div class="panel panel-default col-lg-6">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span><i class="glyphicon glyphicon-user"></i>Марка:</b> {{$item->brand}} </span>
                        <span class="pull-right label label-info">{{$item->created_at}}</span>
                    </h3>
                </div>
                <div class="panel-body">
                    <b>Модель:</b>{{$item->model}}<br/>
                    <b>Цвет:</b> {{$item->color}}<br/>
                    <b>Номер:</b> {{$item->number_auto}}<br/>
                    <b>Состояние:</b> {{$item->status}}
                    <hr/>
                    <div class="pull-right">
                        <a href="/message/{{$item->id}}/edit" class="btn btn-info">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a href="/message/{{$item->id}}/delete" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


    @stop


