<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    use HasFactory;
    protected $table = 'jawaban';
    protected  $fillable = [
        'id',
        'user_id',
        'total_points',
    ];
}
