<div class="col-md-2">
    <strong>Filter by Month</strong>
    <ul class="list-unstyled">
    @foreach($archives as $item)
        <li>
            <a href="{{ route('ad.index', array_merge($queries, ['month' => $item['month'], 'year' => $item['year'],])) }}">
                {{ $item['month'] }} - {{ $item['year'] }}
            </a>
        </li>
    @endforeach
    </ul>
</div>