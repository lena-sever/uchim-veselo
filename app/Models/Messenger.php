<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messenger extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'messengers';

	protected $fillable = [
        'user_id',
        'name',
        'email',
        'message',
        'answer',
	];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
