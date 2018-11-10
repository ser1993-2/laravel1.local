<div class="messages">

    @if ( ! $messages->isEmpty() )
      @foreach($messages as $message)

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">
                <span>
                    #{{$message->id}}  {{ $message->username }} </span>
                <span class="pull-right label label-info">{{$message->created_at}}</span>
                <br/>
                <span>
                   {{$message->email}}</span>
            </h3>
        </div>
        <div class="panel-body">
            {{$message->message}}
            <hr/>
            <div class="pull-right">
                <a href="/message/{{$message->id}}/edit" class="btn btn-info">
                   <i class="glyphicon glyphicon-pencil"></i>
                </a>
                <a href="/message/{{$message->id}}/delete" class="btn btn-info">
                    <i class="glyphicon glyphicon-trash"></i>
                    </a>
            </div>
        </div>
    </div>
        @endforeach
        @endif

    <div class="text-center">
       пагенация
    </div>
</div>