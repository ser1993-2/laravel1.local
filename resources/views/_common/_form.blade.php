@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

<form method="post" action="0/addClient" id="id-form_messages">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="InputName">Имя</label>
        <input type="text" class="form-control" id="InputName" name="name" placeholder="ФИО">
    </div>

    <div class="form-group">
        <label for="Inputgender">Пол</label>
        <input type="text" class="form-control" id="Inputgender" name="gender" placeholder="Пол">
    </div>

    <div class="form-group">
        <label for="Inputtel">Телефон</label>
        <input type="tel" class="form-control" id="Inputtel" name="tel" placeholder="8-xxx-xxx-xx-xx">
    </div>

    <div class="form-group">
        <label for="Inputadress">Адрес</label>
        <input type="tel" class="form-control" id="Inputadress" name="adress" placeholder="Пр.Ленина 54 - 21">
    </div>

    <hr/>

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
        <input type="submit" class="btn btn-success" value="Добавить">
    </div>

</form>