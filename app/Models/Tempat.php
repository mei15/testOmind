<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tempat extends Model
{
    use HasFactory;

    protected $table = 'tempat';

    protected $appends = [
        'penjaga',  
    ];

    public function getTanggalAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getPenjagaAttribute()
    {
        return $this->penjaga()->first();
    }


    public function penjaga()
    {
        return $this->belongsTo('App\Models\Penjaga');
    }


    public function scopeUser($query, $user)
    {

        if ($user->userable_type == 'App\Models\Penjaga') {
            return $query->where('penjaga_id', $user->userable_id);
        }
       
    }
}
