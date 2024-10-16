<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use App\Models\asesmen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\ValidationException;


class asesmenImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new asesmen([
            'id' => $row['id'],
            'nama_lengkap'=> $row['nama_lengkap'],
            'nik'=> $row['nik'],
           'tempat_lahir'=> $row['tempat_lahir'],
           'tgl_lahir'=> $row['tgl_lahir'],
           'jenis_kelamin'=> $row['jenis_kelamin'],
           'alamat_rumah'=> $row['alamat_rumah'],
           'kabupaten'=> $row['kabupaten'],
           'provinsi'=> $row['provinsi'],
           'telp_hp'=> $row['telp_hp'],
           'email'=> $row['email'],
           'pendidikan_id'=> $row['pendidikan_id'],
           'kode_pekerjaan'=> $row['kode_pekerjaan'],
          'kode_jadwal' => $row['kode_jadwal'],
        'start_event'=> $row['start_event'],
           'no_registrasi'=> $row['no_registrasi'],
           'nama_asesor'=> $row['nama_asesor'],
           'sumber_anggaran_id'=> $row['sumber_anggaran_id'],
           'instansi_id'=> $row['instansi_id'],
           'keputusan_asesmen'=> $row['keputusan_asesmen'],
           'tuk'=> $row['tuk'],
           'no_blanko'=> $row['no_blanko'],
          'mid' => $row['mid'],
           'nama_toko'=>$row['nama_toko'],
          'kc' => $row['kc'],
          'unit' => $row['unit'],
        ]);
    }
    public function rules(): array
    {
        return [
            'id' => 'required',
            'kabupaten' => 'numeric',
            // 'tgl_lahir' => 'date_format:d/m/Y',
            // 'start_event' => 'date_format:d/m/Y',
            // Definisikan aturan validasi lainnya sesuai kebutuhan
        ];
    }
    public function customValidationMessages()
    {
        return [
            'id.required' => 'Kolom id wajib diisi.',
            'kabupaten.numeric' => 'Pastikan kabupaten adalah  nomor, dan tidak ada rumus excel',
            // Definisikan pesan validasi kustom lainnya sesuai kebutuhan
        ];
    }
    public function withValidationErrors(ValidationException $e)
    {
        $messages = $e->validator->errors()->getMessages();
        // Lakukan apa pun yang Anda inginkan dengan pesan kesalahan, seperti menampilkannya atau menyimpannya dalam log

        // Misalnya, kita akan mengembalikan pesan kesalahan sebagai flash session dan mengarahkan pengguna kembali ke halaman impor
        return redirect()->back()->withInput()->withErrors($messages);
    }
}
?>
