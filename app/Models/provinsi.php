<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';
    public $timestamps = false;
    protected $primaryKey = 'id';
    // protected $guarded = [];
    protected $fillable= [ 'id', 'provinsi'];

    public function asesmen(){
        return $this->hasMany(asesmen::class);
    }
}
