<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    use HasFactory;
    protected $table = 'survey';
    protected $fillable = [
        'id',
        'pertanyaan1',
        'pertanyaan2',
        'pertanyaan3',
        'created_at',
        'updated_at'
    ];

    public function jawaban()
    {
        return $this->hasMany(survey::class,'survey_id');
    }
}
