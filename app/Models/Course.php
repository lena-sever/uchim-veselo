<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
	use SoftDeletes;

    protected $table = 'courses';

	protected $fillable = [
		'title',
		'description',
		'price',
        'img',
        'author_id',
        'painter_id',
	];
    public function author() {
        return $this->belongsTo(Author::class,'id');
    }
    public function painter() {
        return $this->belongsTo(Painter::class,'id');
    }

    public function user_courses() {
        return $this->hasMany(UserCourse::class,'course_id');
    }

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }

	public function courseReviews() {
		return $this->hasMany(CourseReview::class);
	}

    public function first_tests() {
        return $this->hasMany(FirstTest::class);
    }
    public function second_tests() {
        return $this->hasMany(SecondTest::class);
    }
    public function third_tests() {
        return $this->hasMany(ThirdTest::class);
    }

}
