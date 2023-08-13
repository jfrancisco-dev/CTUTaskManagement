<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasklist extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
