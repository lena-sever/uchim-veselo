<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThirdTest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'third_tests';

    protected $fillable = [
        'lesson_id',
        'test_title',
        'description',
        'questions',
    ];

    public function lesson() {
        return $this->hasMany(Lesson::class);
    }
}
