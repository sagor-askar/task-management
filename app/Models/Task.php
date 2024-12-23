<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'start_date',
        'end_date',
        'status',
        'user_id',
    ];

    // foreignkey relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
