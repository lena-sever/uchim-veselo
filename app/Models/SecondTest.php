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
        'test_title',
        'description',
        'questions',
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
