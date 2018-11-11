
@extends('index')

@section('content')

        <div class=" col-lg-6">
            <div class="form-group">
                <label for="InputName">Имя</label>
                <input type="text" class="form-control" id="InputName" name="name" disabled="disabled" value="{{$message[0]->username}}">
            </div>

            <div class="form-group">
                <label for="Inputgender">Пол</label>
                <input type="text" class="form-control" id="Inputgender" name="gender" disabled="disabled" value="{{$message[0]->gender}}">
            </div>

            <div class="form-group">
                <label for="Inputtel">Телефон</label>
                <input type="tel" class="form-control" id="Inputtel" name="tel" disabled="disabled" value="{{$message[0]->phone}}">
            </div>

            <div class="form-group">
                <label for="Inputadress">Адрес</label>
                <input type="tel" class="form-control" id="Inputadress" name="adress" disabled="disabled" value="{{$message[0]->adress}}">
            </div>
        </div>

        <div class=" col-lg-6">
            <form method="post" action="addClient" id="id-form_messages">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="Inputbrend">Марка</label>
                <input type="text" class="form-control" id="Inputbrend" name="brend" placeholder="Lada">
            </div>

            <div class="form-group">
                <label for="Inputmodel">Модель</label>
                <input type="text" class="form-control" id="Inputmodel" name="model" placeholder="Vesta">
            </div>

            <div class="form-group">
                <label for="Inputcolor">Цвет</label>
                <input type="text" class="form-control" id="Inputcolor" name="color" placeholder="Белый">
            </div>

            <div class="form-group">
                <label for="Inputnumber">Гос. номер</label>
                <input type="text" class="form-control" id="Inputnumber" name="number" placeholder="x111xx34">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Добавить новый автомобиль">
            </div>

        </div>
    </form>

    @if ( ! $message->isEmpty() )
        @foreach($message as $item)
            <div class="panel panel-default col-lg-6">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span><i class="glyphicon glyphicon-user">&nbsp</i>Марка:  </b> {{$item->brand}} </span>
                        <span class="pull-right label label-info">{{$item->created_at}}</span>
                    </h3>
                </div>
                <div class="panel-body">
                    <b>Модель:</b>{{$item->model}}<br/>
                    <b>Цвет:</b> {{$item->color}}<br/>
                    <b>Номер:</b> {{$item->number_auto}}<br/>
                    <b>Состояние:</b> {{$item->status}}<br/>

                    <hr/>

                    <b>Текущее местоположение:  </b>
                    <form method="post" action="{{$item->auto_id}}/status" >
                        {{ csrf_field() }}
                        <select name="select">
                            <option>Находится на територии</option>
                            <option>Отсутствует на територии</option>
                        </select>
                        <div class="pull-right">
                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></button>

                        <a href="/message/{{$item->auto_id}}/delete" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                </div>
                    </form>

                </div>
            </div>
        @endforeach
    @endif

    @stop


