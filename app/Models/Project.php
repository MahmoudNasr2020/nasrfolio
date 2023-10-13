<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'date', 'category', 'client', 'location',
                            'executor', 'overview', 'main_image', 'images','video','status'];

    public function ratings()
    {
        return $this->hasMany(Rating::class,'project_id');
    }

}
