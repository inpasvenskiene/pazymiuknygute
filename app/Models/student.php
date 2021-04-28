<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lecture;

class student extends Model
{
    public $fillable = ['name', 'surname', 'email', 'phone'];

    public function grades()
    {
        return $this->hasMany('App\Models\Grade');
    }

    public function lectures()
    {
        return $this->belongsToMany('App\Models\Lecture', 'grades');
    }
}
