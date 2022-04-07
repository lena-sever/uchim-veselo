<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'test_types';

    protected $fillable = [
        'test_type_title',
    ];    

    public function tests() {
        return $this->hasMany(Test::class);
    }
}
