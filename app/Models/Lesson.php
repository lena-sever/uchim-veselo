<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lessons';

	protected $fillable = [
        'title',
        'description',
        'course_id',
	];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function sliders() {
        return $this->hasMany(Slider::class);
    }

}
