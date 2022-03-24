<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

	public static $availableFields = [
		'id',
        'title',
        'course_id',
        'test_id',
        'description',
        'created_at'
	];

	protected $fillable = [
        'title',
        'course_id',
        'test_id',
        'description'
	];

}
