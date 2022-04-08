<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tests';

	protected $fillable = [
        'lesson_id',
        'test_step_id',
        'test_type_id',
        'test_title',
        'description',
        'questions',
	];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function test_type() {
        return $this->belongsTo(TestType::class);
    }

    public function test_step() {
        return $this->belongsTo(TestStep::class);
    }

}
