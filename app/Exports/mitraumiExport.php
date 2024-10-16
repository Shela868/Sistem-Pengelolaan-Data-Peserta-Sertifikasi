<?php

namespace App\Exports;

use App\Models\asesmen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class mitraumiExport implements FromView,
WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.export_mitraumi');
    }



    public function headings(): array
    {
        return [
            'id',
            'nama lengkap',
            'nik',
            'tempat_lahir',
            'tgl_lahir',
            'jenis_kelamin',
            'alamat_rumah',
            'kabupaten',
            'provinsi',
            'telp_hp',
            'email',
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
           'unit'
        ];
    }
}
