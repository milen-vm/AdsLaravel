@extends('layout.main')

@section('content')
<div class="col-lg-6 col-lg-offset-3">
    <h3 class="text-center">{{ $ad->title }} - {{ $ad->user->name }}</h3>
    <div>
        <p>{{ $ad->text }}</p>
    </div>
    <div class="pull-left">
        <p>{{ $ad->name }}</p>
        <span>Phone: <strong>{{ $ad->phone }}</strong></span>
    </div>
    <div class="pull-right">
        <p class="pull-right">Type: {{ $ad->is_free ? 'Free' : 'Payed' }}</p>
        <br>
        <span class="pull-right">Published: {{ $ad->created_at->format('M j, Y G:i:s') }}</span>
    </div>
    <div class="clearfix"></div>
    <br>
    <div class="text-right">
        <a class="btn btn-success" href="{{ url('/ads/' . $ad->id) . '/edit' }}">Edit</a>
        @include('ads.partial.delete', ['id' => $ad->id])
    </div>

    <hr>

    <div class="comments">
        <ul class="list-group">

        @foreach($ad->comments as $item)
            <li class="list-group-item">
                <strong>{{ $item->created_at->diffForHumans() }}:&nbsp;</strong>
                {{ $item->text }}
            </li>
        @endforeach

        </ul>
    </div>

@if(\Illuminate\Support\Facades\Auth::check())
    @include('layout.errors')

    <div>
        {!! Form::open(['url' => url('/ads/' . $ad->id . '/comments'), 'method' => 'post',]) !!}

        @include('comments.partial.form', ['comment' => $comment])

        {!! Form::submit('Add Comment', ['class' => 'btn btn-info',]) !!}
        {!! Form::close() !!}
    </div>
@else
    <p>Login to add a comment.</p>
@endif

</div>
@endsection