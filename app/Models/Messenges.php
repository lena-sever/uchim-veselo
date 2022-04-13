<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messenges extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'messenges';

	protected $fillable = [
        'user_id',
        'email',
        'message',
        'answer',
	];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
