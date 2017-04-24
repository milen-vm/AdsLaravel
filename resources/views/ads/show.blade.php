@extends('layout.main')

@section('content')
<div class="col-lg-6 col-lg-offset-3">
    <h3 class="text-center">{{ $ad->title }}</h3>
    <p class="text-center"><a href="{{ url('/ads/' . $ad->id) . '/edit' }}">[edit]</a></p>
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
    <div class="text-center">
        @include('ads.partial.delete', ['id' => $ad->id])
    </div>
</div>

@endsection