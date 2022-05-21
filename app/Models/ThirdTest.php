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
        'course_id',
        'right_sentence',
        'variant_1',
        'variant_2',
        'words'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

}
