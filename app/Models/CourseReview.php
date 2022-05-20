<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseReview extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'course_reviews';

    protected $fillable = [
		'text',
		'course_id',
        'user_id',
        'publish'
	];
    protected $casts = [
        'publish' => 'boolean'
    ];

    public function course() {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
