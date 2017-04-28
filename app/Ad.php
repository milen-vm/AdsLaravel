<?php

namespace App;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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
}
