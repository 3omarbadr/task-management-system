<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeTopStatistics($query, $number)
    {
        return $query->orderByDesc('task_count')
            ->limit($number)
            ->get();
    }
}
