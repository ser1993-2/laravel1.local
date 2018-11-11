<div class="messages">

    @if ( ! $messages->isEmpty() )
      @foreach($messages as $message)

    <div class="panel panel-default col-lg-6">

        <div class="panel-heading">
            <h3 class="panel-title">
                <span><i class="glyphicon glyphicon-user"></i>&nbsp&nbsp{{ $message->username }} </span>
                <span class="pull-right label label-info">{{$message->created_at}}</span>
                <br/>
                <span>
                   <i class="glyphicon glyphicon-earphone"></i>&nbsp&nbsp{{$message->phone}}</span>
            </h3>
        </div>
        <div class="panel-body">
            <b>Марка:</b> {{$message->brand}}<br/>
            <b>Модель:</b>{{$message->model}}<br/>
            <b>Цвет:</b> {{$message->color}}<br/>
            <b>Номер:</b> {{$message->number_auto}}<br/>
            <b>Состояние:</b> {{$message->status}}
            <hr/>
            <div class="pull-right">
                <a href="{{$message->user_id}}/edit" class="btn btn-info">
                   <i class="glyphicon glyphicon-pencil"></i>
                </a>
                <a href="{{$message->user_id}}/delete" class="btn btn-danger">
                    <i class="glyphicon glyphicon-trash"></i>
                    </a>
            </div>
        </div>
    </div>
        @endforeach
        @endif

</div>
