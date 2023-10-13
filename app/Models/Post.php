<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'main_image','status'];

    public function reactions()
    {
        return $this->hasMany(Reaction::class,'post_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
}
