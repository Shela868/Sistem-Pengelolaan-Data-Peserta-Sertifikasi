<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pekerjaan extends Model
{
    use HasFactory;
    protected $table ='pekerjaan';
    protected $primaryKey = 'id';
    protected $fillable =['id', 'pekerjaan', 'created_at', 'updated_at'];

    public function asesmens(){
        return $this->hasMany(asesmen::class);
    }

}
