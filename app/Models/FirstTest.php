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
        'lesson_id',
        'test_title',
        'word',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'answer_5',
        'right_answer',
        'description'
	];

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

}
