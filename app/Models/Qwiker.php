<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qwiker extends Model
{
    use HasFactory;
    // protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
