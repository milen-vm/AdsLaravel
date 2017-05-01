<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function ads()
    {
        return $this->belongsToMany(Ad::class, 'ad_category');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
