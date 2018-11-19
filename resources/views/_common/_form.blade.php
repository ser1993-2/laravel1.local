@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/dependencyLibs/inputmask.dependencyLib.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js"></script>

<form method="post" action="addClient" id="id-form_messages">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="InputName">Логин</label>
        <input type="text" class="form-control" id="InputName" name="name" pattern="[A-Za-zА-Яа-яЁё]{2,}" placeholder="Логин" required>
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="example@yandex.ru" required>
    </div>

    <div class="form-group">
        <label for="Inputgender">Пол</label>
        <select class="form-control" id="Inputgender" name="gender">
            <option>Мужской</option>
            <option>Женский</option>
        </select>
    </div>

    <div class="form-group">
        <label for="Inputtel">Телефон</label>
        <input type="tel" class="form-control" id="Inputtel" name="tel" pattern="^\+\d{1}\(\d{3}\)\s\d{3}[-]\d{2}[-]\d{2}$" placeholder="+7(999) 999-99-99" required>
    </div>

    <div class="form-group">
        <label for="Inputadress">Адрес</label>
        <input type="text" class="form-control" id="Inputadress" name="adress" placeholder="Пр.Ленина 54-21" required>
    </div>

    <hr/>

    <div class="form-group">
        <label for="Inputbrend">Марка</label>
        <input type="text" class="form-control" id="Inputbrend" name="brend" pattern="[A-Za-zА-Яа-яЁё]{3,}" placeholder="Lada" required>
    </div>

    <div class="form-group">
        <label for="Inputmodel">Модель</label>
        <input type="text" class="form-control" id="Inputmodel" name="model" pattern="[A-Za-zА-Яа-яЁё0-9]{3,}" placeholder="Vesta" required>
    </div>

    <div class="form-group">
        <label for="Inputcolor">Цвет</label>
        <input type="text" class="form-control" id="Inputcolor" name="color"  pattern="[A-Za-zА-Яа-яЁё]{3,}" placeholder="Белый" required>
    </div>

    <div class="form-group">
        <label for="Inputnumber">Гос. номер</label>
        <input type="text" class="form-control" id="Inputnumber" name="number" pattern="[A-Za-zА-Яа-яЁё0-9]{3,}" placeholder="x111xx34" required>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Добавить">
    </div>

</form>

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