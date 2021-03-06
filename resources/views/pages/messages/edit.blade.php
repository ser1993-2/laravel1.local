
@extends('index')

@section('content')

    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    @if (session('ok'))
        <div class="alert alert-success">
            {{ session('ok') }}
        </div>
    @endif

    <div class="form-group">
        <a href="/" class="btn btn-primary" >Главная</a>
    </div>

    <form method="post" action="editClient" id="id-form_messages">
        {{ csrf_field() }}

        <div class=" col-lg-6">

            <div class="form-group">
                <label for="InputName">Имя</label>
                <input type="text" class="form-control" id="InputName" name="name"  value="{{$user[0]->username}}" required>
            </div>

            <div class="form-group">
                <label for="Inputgender">Пол</label>
                <input type="text" class="form-control" id="Inputgender" name="gender"  value="{{$user[0]->gender}}" required>
            </div>

            <div class="form-group">
                <label for="Inputtel">Телефон</label>
                <input type="tel" class="form-control" id="Inputtel" name="tel" pattern="^\+\d{1}\(\d{3}\)\s\d{3}[-]\d{2}[-]\d{2}$" value="{{$user[0]->phone}}" required>
            </div>

            <div class="form-group">
                <label for="Inputadress">Адрес</label>
                <input type="text" class="form-control" id="Inputadress" name="adress" value="{{$user[0]->adress}}" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Сохранить изменения">
            </div>
        </div>

    </form>

        <form method="post" action="addAuto" id="id-form_messages">
            {{ csrf_field() }}
        <div class=" col-lg-6">


            <div class="form-group">
                <label for="Inputbrend">Марка</label>
                <input type="text" class="form-control" id="Inputbrend" name="brend" placeholder="Lada" required>
            </div>

            <div class="form-group">
                <label for="Inputmodel">Модель</label>
                <input type="text" class="form-control" id="Inputmodel" name="model" placeholder="Vesta" required>
            </div>

            <div class="form-group">
                <label for="Inputcolor">Цвет</label>
                <input type="text" class="form-control" id="Inputcolor" name="color" placeholder="Белый" required>
            </div>

            <div class="form-group">
                <label for="Inputnumber">Гос. номер</label>
                <input type="text" class="form-control" id="Inputnumber" name="number" placeholder="x111xx34" required>
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
                        <span><i class="glyphicon glyphicon-road">&nbsp</i> {{$item->brand}} - {{$item->model}} ({{$item->number_auto}}) </span>
                        <span class="pull-right label label-info">{{$item->created_at}}</span>
                    </h3>
                </div>
                <form method="post" action="{{$item->auto_id}}/editAuto" >
                    {{ csrf_field() }}
                <div class="panel-body">
                    <b>Марка:</b><input  type="text" class="form-control" id="Inputmodel" name="brend" value="{{$item->brand}}" required><br/>
                    <b>Модель:</b><input type="text" class="form-control" id="Inputmodel" name="model" value="{{$item->model}}" required><br/>
                    <b>Цвет:</b> <input type="text" class="form-control" id="Inputmodel" name="color" value="{{$item->color}}" required><br/>
                    <b>Номер:</b> <input type="text" class="form-control" id="Inputmodel" name="number" value="{{$item->number_auto}} required"><br/>
                    <b>Состояние:</b> {{$item->status}}<br/>

                    <hr/>

                    <b>Текущее местоположение:  </b>
                        <select name="select">
                            <option>Находится на територии</option>
                            <option>Отсутствует на територии</option>
                        </select>
                        <div class="pull-right">
                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></button>

                        <a href="{{$item->number_auto}}/deleteAuto" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                </div>
                    </form>

                </div>
            </div>
        @endforeach
    @endif

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/dependencyLibs/inputmask.dependencyLib.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js"></script>

    <script>
        var inputsTel = document.querySelectorAll('input[type="tel"]');

        Inputmask({
            "mask": "+7(999) 999-99-99",
            showMaskOnHover: false
        }).mask(inputsTel);

        $('#Inputbrend').autocomplete({
            source: 'brandSearch'
        });

    </script>

    @stop




