<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjaga extends Model
{
    use HasFactory;

    protected $table = 'penjaga';
    protected $primaryKey = 'id';
    protected $fillable = ['userable_id', 'name'];


    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
