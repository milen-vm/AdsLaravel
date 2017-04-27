@extends('layout.main')

@section('content')
    <div class="col-lg-6 col-lg-offset-3">

        @include('layout.errors', ['errors' => $errors])

        {!! Form::open(['url' => url('/ads/' . $ad->id), 'method' => 'patch']) !!}

        @include('ads.partial.form', ['ad' => $ad])

        {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
        {!! Form::close() !!}
    </div>
@endsection