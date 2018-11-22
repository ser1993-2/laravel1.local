@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/dependencyLibs/inputmask.dependencyLib.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Регистрация</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Логин</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Логин" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" placeholder="example@mail.ru" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Подтвердите пароль</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Пол</label>

                            <div class="col-md-6">
                                <select class="form-control" id="Inputgender" name="gender">
                                    <option>Мужской</option>
                                    <option>Женский</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Телефон</label>

                            <div class="col-md-6">
                                <input type="tel" class="form-control" id="Inputtel" name="tel" pattern="^\+\d{1}\(\d{3}\)\s\d{3}[-]\d{2}[-]\d{2}$" placeholder="+7(999) 999-99-99" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Адрес</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Inputadress" name="adress" placeholder="Пр.Ленина 54-21" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Марка</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Inputbrend" name="brend" pattern="[A-Za-zА-Яа-яЁё]{3,}" placeholder="Lada" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Модель</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Inputmodel" name="model" pattern="[A-Za-zА-Яа-яЁё0-9]{3,}" placeholder="Vesta" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Цвет</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Inputcolor" name="color"  pattern="[A-Za-zА-Яа-яЁё]{3,}" placeholder="Белый" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Гос. номер</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Inputnumber" name="number" pattern="[A-Za-zА-Яа-яЁё0-9]{3,}" placeholder="x111xx34" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

@endsection
