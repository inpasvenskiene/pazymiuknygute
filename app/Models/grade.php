<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    public $fillable = ['lecture_id', 'student_id', 'grade'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function lecture()
    {
        return $this->belongsTo('App\Models\Lecture');
    }

}
