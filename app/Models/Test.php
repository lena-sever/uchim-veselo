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
        'title',
        'description',
        'questions',
        'lesson_id'
	];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
