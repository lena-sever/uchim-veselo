<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRewiew extends Model
{
    use HasFactory;

    protected $table = 'course_rewiews';

	public static $availableFields = [
		'id', 'course_id', 'user_id', 'text','created_at'
	];
    protected $fillable = [
		'text','course_id', 'user_id',
	];

}
