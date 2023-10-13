<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'project_id','rating', 'comment'];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
