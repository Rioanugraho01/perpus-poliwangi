<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinat extends Model
{
    use HasFactory;
    protected $table = 'koordinat';

    protected $fillable = [
        'id',
        'koordinat1',
        'koordinat2',
        'koordinat3',
        'koordinat4',
    ];
}
