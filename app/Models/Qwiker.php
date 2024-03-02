<?php

namespace App\Models;

use App\Services\SlugService;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qwiker extends Model
{
    use HasFactory, HasUuids;
    // protected $with = ['author'];

    public function setSlugAttribute()
    {
        $newSlug = new SlugService($this);
        $this->attributes['slug'] = $newSlug->createSlug($this->message);
        // print($this->slug);
        // die();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
