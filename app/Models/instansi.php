<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instansi extends Model
{
    use HasFactory;
    protected $table = 'instansi_pemberi_anggaran';
    public $timestamps = false;
    protected $primaryKey = 'id';
    // protected $guarded = [];
    protected $fillable= [ 'id', 'instansi'];

    public function asesmen(){
        return $this->hasMany(asesmen::class);
    }
}
