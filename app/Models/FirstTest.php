<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FirstTest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'first_tests';

	protected $fillable = [
        'course_id',
        'word',
        'img',
        'author',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'answer_5',
        'right_answer',
        'description',
	];

    public function course() {
        return $this->belongsTo(Course::class);
    }

}
