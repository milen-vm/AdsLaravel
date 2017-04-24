@extends('layout.main')

@section('content')
    <div class="col-lg-6 col-lg-offset-3">

        @include('ads.partial.errors', ['errors' => $errors])

        {!! Form::open(['url' => url('/ads/'), 'method' => 'post']) !!}

        @include('ads.partial.form', ['ad' => $ad])

        {!! Form::submit('Create', ['class' => 'btn btn-info']) !!}
        {!! Form::close() !!}

    </div>
@endsection