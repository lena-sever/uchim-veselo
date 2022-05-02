<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecondTest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'second_tests';

    protected $fillable = [
        'course_id',
        'img',
        'part_sentence_1',
        'part_sentence_2',
        'part_sentence_3',
        'part_sentence_4',
        'right_word_1',
        'right_word_2',
        'right_word_3',
        'right_word_4',
        'wrong_word_1',
        'wrong_word_2',
        'wrong_word_3',
        'wrong_word_4',
        'etymology',
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

}
