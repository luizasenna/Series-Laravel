<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['number'];

    public function series()
    {
        return $this->belongsTo(Serie::class);
    }

    public function scopeWatched(Builder $query)
    {
        $query->where('watched', true);
    }
}
