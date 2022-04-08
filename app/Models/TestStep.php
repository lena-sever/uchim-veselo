<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestStep extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'test_steps';

    protected $fillable = [
        'test_steps_title',
    ];    

    public function tests() {
        return $this->hasMany(Test::class);
    }

}
