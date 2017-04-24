<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    const DAYS_VALID_PERIOD = 30;
    const ADS_LIST_PAGE_SIZE = 5;

    protected $table = 'ads';
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'text',
        'name',
        'phone',
        'is_free',
        'valid_until',
    ];

    public function scopeFree($query)
    {
        return $query->where('is_free', true);
//        return static::where('is_free', true)->get();
    }

    public static function payed()
    {
        return static::where('is_free', false)->get();
    }
}
