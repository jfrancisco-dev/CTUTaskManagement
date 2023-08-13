<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function tasklists()
    {
        return $this->belongsTo(Tasklist::class);
    }
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
