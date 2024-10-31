<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryKunjungan extends Model
{
    use HasFactory;
    protected $table = 'history_kunjungan';
    protected $fillable = ['user_id', 'activity', 'tanggal'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
