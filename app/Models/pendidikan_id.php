<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendidikan_id extends Model
{
    use HasFactory;
    protected $table = 'pendidikan_id';
    public $timestamps = false;
    protected $primaryKey = 'id';
    // protected $guarded = [];
    protected $fillable= [ 'id', 'pendidikan'];

    public function asesmen(){
        return $this->hasMany(asesmen::class);
    }
}
