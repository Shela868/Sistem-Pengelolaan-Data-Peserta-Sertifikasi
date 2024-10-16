<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggaran extends Model
{
    use HasFactory;
    protected $table = 'sumber_anggaran';
    public $timestamps = false;
   // protected $guarded = [];
   protected $fillable= [ 'id','sumber_anggaran'];


public function asesmen(){
return $this->hasMany(asesmen::class);
}


}
