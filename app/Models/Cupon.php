<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'cupones';
    public $timestamps = false;
}
