<?php

namespace App;

class Comment extends Model
{

    protected $table = 'comments';
    protected $fillable = [
        'ad_id',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
