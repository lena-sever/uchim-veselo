<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCourse extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'user_courses';

    protected $fillable = [
		'price',
		'course_id',
        'user_id'
	];

    public function course() {
        return $this->hasMany(Course::class,'id');
    }

    public function user() {
        return $this->hasMany(User::class,'id');
    }
}
