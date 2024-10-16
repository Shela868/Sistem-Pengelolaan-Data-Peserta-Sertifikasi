<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logadmin extends Model
{
    use HasFactory;

    protected $table = 'activity_log';

    public function user(){
        return $this->belongsTo(user::class, 'causer_id');
    }
}
