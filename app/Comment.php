<?php

namespace App;

class Comment extends Model
{

    protected $table = 'comments';
    protected $fillable = [
        'ad_id',
        'text',
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
