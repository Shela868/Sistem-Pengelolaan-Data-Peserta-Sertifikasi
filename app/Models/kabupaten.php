<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kabupaten';
    public $timestamps = false;
    protected $primaryKey = 'id';
    // protected $guarded = [];
    protected $fillable= [ 'id', 'kabupaten'];

    public function asesmen(){
        return $this->hasMany(asesmen::class);
    }
}
