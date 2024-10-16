<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asesmen extends Model
{
    use HasFactory;
    protected $table = 'asesmen';
    public $timestamps = false;
    // protected $guarded = [];
    protected $fillable= [
'id',
    'nama_lengkap',
    'nik',
    'tempat_lahir',
    'tgl_lahir',
    'jenis_kelamin',
    'email',
    'alamat_rumah',
    'kabupaten',
    'provinsi',
    'telp_hp',
   'pendidikan_id',
    'kode_pekerjaan',
    'kode_jadwal',
    'start_event',
    'no_registrasi',
    'nama_asesor',
    'sumber_anggaran_id',
    'instansi_id',
    'keputusan_asesmen',
    'tuk',
    'no_blanko',
    'mid',
    'nama_toko',
    'kc',
    'unit',
    'image',
    'blanko'];

    public function pekerjaan()
    {
        return $this->belongsTo(pekerjaan::class, 'kode_pekerjaan', 'id');
    }
    public function pendidikan()
    {
        return $this->belongsTo(pendidikan_id::class, 'pendidikan_id', 'id');
    }
    public function kabupaten_id()
    {
        return $this->belongsTo(kabupaten::class, 'kabupaten', 'id');
    }
    public function provinsi_id()
    {
        return $this->belongsTo(provinsi::class, 'provinsi', 'id');
    }
    public function anggaran()
    {
        return $this->belongsTo(anggaran::class, 'sumber_anggaran_id', 'id');
    }
    public function instansi()
    {
        return $this->belongsTo(instansi::class, 'instansi_id', 'id');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'nik', 'NIK');
}


}
?>
