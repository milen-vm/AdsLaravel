<div class="col-md-2">
    <div>
        <strong>Months</strong>
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
    <div>
        <strong>Categories</strong>
        <ul class="list-unstyled">
            @foreach($categories as $category)
                <li>
                    <a href="/ads/categories/{{ $category }}">
                        {{ $category }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>