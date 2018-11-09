@extends('index')

@section('content')

   @include('_common._form')

    <div class="text-right"><b>Всего сообщений:</b><i class="badge">0</i></div><br/>

    <div class="messages">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">
                    <span>Карлсон</span>
                    <span class="pull-right label label-info">17:15:00 / 03.07.20016</span>
                </h3>
            </div>
            <div class="panel-body">
                Я спешил к вам, друзья,
                С жутким нетерпеньем.
                Я моторчик не зря
                Смазывал вареньем.
                У меня за спиной
                Вертится пропеллер
                <hr/>
                <div class="pull-right">
                    <a href="#" class="btn btn-info">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <button class="btn btn-danger">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @stop
