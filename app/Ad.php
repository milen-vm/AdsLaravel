<?php

namespace App;

use Carbon\Carbon;

class Ad extends Model
{

    const DAYS_VALID_PERIOD = 30;
const ADS_LIST_PAGE_SIZE = 5;

    protected $table = 'ads';
    protected $fillable = [
        'user_id',
        'title',
        'text',
        'name',
        'phone',
        'is_free',
        'valid_until',
    ];
    public static $filterPrams = [
        'is_free',
        'month',
        'year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'ad_category');
    }

    public function scopeFilter($query, $filters)
    {
        foreach ($filters as $key => $value) {
            if (! in_array($key, self::$filterPrams)) {
                continue;
            }

            if ($key == 'month') {
                $query->whereMonth('created_at', Carbon::parse($value)->month);
            } elseif ($key == 'year') {
                $query->whereYear('created_at', $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query;
    }

    public function scopeFree($query)
    {
        return $query->where('is_free', true);
//        return static::where('is_free', true)->get();
    }

    public static function payed()
    {
        return static::where('is_free', false)->get();
    }

    public function addComment($text)
    {
        $this->comments()->create(['text' => $text]);
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) as `year`, monthname(created_at) as `month`, count(id) as `count`')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()->toArray();
    }
}
