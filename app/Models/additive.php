<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class additive extends Model
{
    // RELATION
    public function offertas()
    {
        $this->hasMany(offerta::class, 'id_additives', 'id');
    }

    public function scopeAll(Builder $query)
    {
        return $query
            ->get();
    }
}
