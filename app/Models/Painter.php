<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Painter extends Model
{
    use HasFactory;
	use SoftDeletes;

    protected $table = 'painters';

	protected $fillable = [
        'name',
        'photo',
	];
    public function courses() {
        return $this->hasMany(Course::class,'painter_id');
    }

}
