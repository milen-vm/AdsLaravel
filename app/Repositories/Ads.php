<?php

namespace App\Repositories;

use App\Ad;

class Ads
{

    protected $ads;

    public function __construct()
    {
        $this->ads = new Ad();
    }

    public function filteredAndSorted(array $query)
    {
        $allowed = Ad::$filterPrams;
        $filters = array_filter(
            $query,
            function ($key) use ($allowed) {
                return in_array($key, $allowed);
            },
            ARRAY_FILTER_USE_KEY
        );

        if (count($filters) > 0) {
            $ads = $this->ads->filter($filters);
        }

        if (array_key_exists('sort', $query)) {
            $ads = $ads->orderBy('created_at', $query['sort']);
            $queries['sort'] = $request->get('sort');
        } else {
            $ads = $ads->orderBy('created_at', 'desc');
        }
    }
}