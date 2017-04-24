@extends('layout.main')

@section('content')
<h2 class="text-center">Ads List</h2>

<div class="col-lg-10 col-lg-offset-1">
    <strong>Filter: </strong>
    <a href="{{ url('/?is_free=1') }}">Free</a>
    <a href="{{ url('/?is_free=0') }}">Payed</a>
    <a href="{{ url('/') }}">All</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Ago</th>
                    <th >Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($ads as $ad)
                <tr>
                    <td>
                        <a class="" href="{{ url('/ads/' . $ad->id) }}" title="View more">{{ $ad->title }}</a>
                    </td>
                    <td>
                        <span>{{ $ad->created_at->diffForHumans() }}</span>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-success" href="{{ url('/ads/' . $ad->id) . '/edit' }}">Edit</a>
                        @include('ads.partial.delete', ['id' => $ad->id])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center">
    {{ $ads->links() }}
    </div>
</div>
@endsection
