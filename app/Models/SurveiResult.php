<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveiResult extends Model
{
    use HasFactory;
    protected $table = 'survey_results';
    protected $fillable = ['user_id', 'total_points'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
