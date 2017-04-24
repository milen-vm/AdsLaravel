{!! Form::open(['url' => url('/ads/' . $id), 'method' => 'delete', 'style' => 'display:inline-block;']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}