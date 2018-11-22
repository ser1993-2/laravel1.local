@extends('index')

@section('content')

    <div class="container">

        @if (session('LogOut'))
            <div class="alert alert-danger">
                {{ session('LogOut') }}
            </div>
        @endif
        @if (session('LogIn'))
            <div class="alert alert-success">
                {{ session('LogIn') }}
            </div>
            @endif

            @if (empty(Session::has('Log')))
                <div class="col-lg-4">

                    <form method="post" action="authLogin" id="id-form_messages">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" id="Email" name="Email" placeholder="Email"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Пароль" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Вход">
                            <a href="add" class="btn btn-success">Регистрация</a>
                        </div>
                    </form>
                </div>
            @else
                <div class="form-group">
                    <a href="<?php echo Session::has('UserId')?>/edit" class="btn btn-success">Редактировать данные</a>

                    <a href="LogOut" class="btn btn-danger">Выход</a>
                </div>
        @endif
</div>
    @if (empty(Session::has('color')) || Session::has('color') == 'green')
    <input class="form-check-input" type="checkbox" id="Check">
    @else
       <input class="form-check-input" type="checkbox" checked="checked" id="Check">
       @endif
    <label class="form-check-label" for="Check">
        Сменить фон
    </label>

    <div class="text-right"><b>Всего автомобилей:</b><i class="badge">{{ $count }}</i></div><br/>

@if (empty(Session::has('Log')))
    <div class="text-left">Для просмотра вам необходимо авторизироватся</div>
@else
<div class="row">
@include('pages.messages._items')
</div>
@endif

@stop