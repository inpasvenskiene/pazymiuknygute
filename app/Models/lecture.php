<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\student;

class lecture extends Model
{
    public $fillable = ['name', 'description'];
    
    public function students()
    {
        return $this->belongsToMany('App\Models\Student', 'grades');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Grade');
    }
}
