<?php

namespace App\Http\Controllers;

use App\Models\asesmen;
use App\Models\user;
use App\Models\pekerjaan;
use App\Models\kabupaten;
use App\Models\instansi;
use App\Models\pendidikan_id;
use App\Models\anggaran;
use App\Models\provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Exports\mitraumiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\asesmenImport;
use Illuminate\Support\Facades\Auth;

class mitraumiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('tuk')) {
            $asesmen = asesmen::where('tuk', 'LIKE', '%' . $request->tuk . '%')->get();
        } else {
            $asesmen = asesmen::all();
        }
        $anggaran = anggaran::all();
        $instansi = instansi::all();
        $kabupaten = kabupaten::all();
        $pekerjaan = pekerjaan::all();
        $pendidikan = pendidikan_id::all();
        $provinsi = provinsi::all();
        $user=Auth::user();
        return response()->view('admin.mitra_umi', compact([
            'asesmen',
            'anggaran',
            'instansi',
            'kabupaten',
            'pekerjaan',
            'pendidikan',
            'provinsi',
            'user'
        ]));

    }

    public function edit($id)
    {
        $asesmen = asesmen::with(
            'pekerjaan',
            'pendidikan',
            'kabupaten_id',
            'provinsi_id',
            'anggaran',
            'instansi'
        )->get()->find($id);
        $anggaran = anggaran::all();
        $instansi = instansi::all();
        $kabupaten = kabupaten::all();
        $pekerjaan = pekerjaan::all();
        $pendidikan = pendidikan_id::all();
        $provinsi = provinsi::all();
        $user= Auth::user();
        return view('admin.edit', compact([
            'asesmen',
            'anggaran',
            'instansi',
            'kabupaten',
            'pekerjaan',
            'pendidikan',
            'provinsi',
            'user'
        ]));
    }


    public function update($id, Request $request)
    {
        $this->validate($request,[
        'id' => 'required|numeric',
        'nama_lengkap' => 'required',
        'nik' => 'required|numeric',
        'tempat_lahir' => 'required',
        'tgl_lahir' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'email' => 'nullable',
        'alamat_rumah' => 'required',
        'kabupaten' => 'required',
        'provinsi' => 'required',
        'telp_hp' => 'required',
        'pendidikan_id' => 'required',
        'kode_pekerjaan' => 'required',
        'kode_jadwal' => 'required',
        'start_event' => 'required',
        'no_registrasi' => 'required',
        'nama_asesor' => 'required',
        'sumber_anggaran_id' => 'required',
        'instansi_id' => 'required',
        'keputusan_asesmen' => 'required',
        'tuk' => 'required',
        'no_blanko' => 'nullable',
        'mid' => 'nullable',
        'nama_toko' => 'nullable',
        'kc' => 'required',
        'unit' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'blanko' => 'nullable|blanko|mimes:pdf'],

        [ 'id.required' => 'ID harus diisi',
        'nama_lengkap.required' => 'Nama Lengkap harus diisi',
        'nik.required' => 'NIK harus diisi',
        'tempat_lahir.required' => 'Tempat Lahir harus diisi',
        'tgl_lahir.required' => 'Tanggal Lahir harus diisi',
        'email.required' => 'Email harus diisi',
        'alamat_rumah.required' => 'Alamat harus diisi',
        'kabupaten.required' => 'Kabupaten harus diisi',
        'provinsi.required' => 'Provinsi harus diisi',
        'telp_hp.required' => 'Telpon/HP harus diisi',
        'pendidikan_id.required' => 'Pendidikan harus diisi',
        'kode_pekerjaan.required' => 'Pekerjaan harus diisi',
        'kode_jadwal.required' => 'Kode Jadwal harus diisi',
        'start_event.required' => 'Start Event harus diisi',
        'no_registrasi.required' => 'No Registrasi harus diisi',
        'nama_asesor.required' => 'Nama Asesor harus diisi',
        'sumber_anggaran_id.required' => 'Sumber anggaran harus diisi',
        'instansi_id.required' => 'Instansi pemberi anggaran harus diisi',
        'kc.required' => 'KC harus diisi',
        'unit.required' => 'Unit harus diisi',
    ]);
        $asesmen = asesmen::findOrFail($id);
        if ($request->hasFile('image')) {
            file::delete(public_path('photo/' . $asesmen->image));
        }
        ;


        $rand = '';
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $rand = $request->nama_lengkap . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $rand);
            $request['image'] = $rand;
        }
        ;

        $blank = '';
        if ($request->hasFile('sertifikat')) {
            $extension = $request->file('sertifikat')->getClientOriginalExtension();
            $blank = $request->nama_lengkap . '-' . now()->timestamp . '.' . $extension;
            $request->file('sertifikat')->storeAs('sertifikat', $blank);
            $request['blanko'] = $blank;


        }

        // $asesmen = asesmen::find($id);
        $asesmen->update($request->all());
        $user=Auth::user();
        activity()->log('memperbarui data peserta');
        return redirect('/mitra_umi', )->with('sukses', 'data berhasil diinput');

    }
    public function destroy($id)
    {

        $asesmen = asesmen::find($id);
        $asesmen->delete();
        session()->flash('warning', 'Data Berhasil Dihapus');
        activity()->log('menghapus data peserta');
        return redirect('/mitra_umi');

    }
    public function create(request $request)
    {
        $asesmen = asesmen::with(
            'pekerjaan',
            'pendidikan',
            'kabupaten_id',
            'provinsi_id',
            'anggaran',
            'instansi'
        )->get();
        $anggaran = anggaran::all();
        $instansi = instansi::all();
        $kabupaten = kabupaten::all();
        $pekerjaan = pekerjaan::all();
        $pendidikan = pendidikan_id::all();
        $provinsi = provinsi::all();
        $user = Auth::user();
        return view('admin.create', compact([
            'asesmen',
            'anggaran',
            'instansi',
            'kabupaten',
            'pekerjaan',
            'pendidikan',
            'provinsi',
            'user'
        ]));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric|unique:asesmen,id,',
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric|unique:asesmen',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'nullable',
            'alamat_rumah' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'telp_hp' => 'required',
            'pendidikan_id' => 'required',
            'kode_pekerjaan' => 'required',
            'kode_jadwal' => 'required',
            'start_event' => 'required',
            'no_registrasi' => 'required',
            'nama_asesor' => 'required',
            'sumber_anggaran_id' => 'required',
            'instansi_id' => 'required',
            'keputusan_asesmen' => 'required',
            'tuk' => 'required',
            'no_blanko' => 'nullable',
            'mid' => 'nullable',
            'nama_toko' => 'nullable',
            'kc' => 'required',
            'unit' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'blanko' => 'nullable|blanko|mimes:pdf'],

            [ 'id.required' => 'ID harus diisi',
             'id.unique' => 'ID Sudah Tersedia',
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nik.unique' => 'NIK sudah tersedia',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi',
            'tgl_lahir.required' => 'Tanggal Lahir harus diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'email.required' => 'Email harus diisi',
            'alamat_rumah.required' => 'Alamat harus diisi',
            'kabupaten.required' => 'Kabupaten harus diisi',
            'provinsi.required' => 'Provinsi harus diisi',
            'telp_hp.required' => 'Telpon/HP harus diisi',
            'pendidikan_id.required' => 'Pendidikan harus diisi',
            'kode_pekerjaan.required' => 'Pekerjaan harus diisi',
            'kode_jadwal.required' => 'Kode Jadwal harus diisi',
            'start_event.required' => 'Start Event harus diisi',
            'no_registrasi.required' => 'No Registrasi harus diisi',
            'nama_asesor.required' => 'Nama Asesor harus diisi',
            'sumber_anggaran_id.required' => 'Sumber anggaran harus diisi',
            'instansi_id.required' => 'Instansi pemberi anggaran harus diisi',
            'keputusan_asesmen.required' => 'Keputusan asesmen harus diisi',
            'tuk.required' => 'TUK harus diisi',
            'kc.required' => 'KC harus diisi',
            'unit.required' => 'Unit harus diisi',
        ]);

        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->nama_lengkap . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $newName);
        }
        $newblank = '';

        if ($request->file('sertifikat')) {
            $extension = $request->file('sertifikat')->getClientOriginalExtension();
            $newblank = $request->nama_lengkap . '-' . now()->timestamp . '.' . $extension;
            $request->file('sertifikat')->storeAs('sertifikat', $newblank);
        }

        $request['image'] = $newName;
        $request['blanko'] = $newblank;
        $asesmen = asesmen::create($request->all());
        activity()->log('menambhakan data peserta');
        return redirect('/mitra_umi')->with('sukses', 'data berhasil diinput');

    }

    public function show(request $request, $id)
    {
        $request['image'];
        $asesmen = asesmen::with(
            'pekerjaan',
            'pendidikan',
            'kabupaten_id',
            'provinsi_id',
            'anggaran',
            'instansi'
        )->get()->find($id);
        $user= Auth::user();

        // $pendidikan = asesmen::with('pendidikan_id');
        activity()->log('meanampilkan detail data peserta');
        return view('admin.detail_umi', compact('asesmen', 'user'));

    }
    public function export()
    {
    $templatePath = storage_path('app/public/Template/Template_MUC.xlsx');
    $fileName = 'template.xlsx';

    return response()->download($templatePath, $fileName);
    }

    public function import(request $request)
    {
        Excel::import(new asesmenImport, $request->file);
        activity()->log('melakukan import data peserta');
        return redirect('/mitra_umi')->with('success', 'All good!');
    }
    public function filtertuk(request $request)
    {
        $asesmen = asesmen::where('tuk')->get();
        return response()->json($asesmen);


    }

    public function admin_profile( request $request)
    {
       $user= Auth::user();
        return view('admin.admin_profile', compact('user'));
    }
    public function cetak($id, request $request)
    {
        $request['image'];
        $asesmen = asesmen::with(
            'pekerjaan',
            'pendidikan',
            'kabupaten_id',
            'provinsi_id',
            'anggaran',
            'instansi'
        )->get()->find($id);
        $user= Auth::user();
        return view('admin.cetak', compact('asesmen','user'));
    }



// public function download(){

//     return response()->streamDownload(function() {
//         echo view('detail_umi')->getClientOriginalExtension();
//     }
//     , 'Sertifikasi.pdf'
//     , ['Content-Type' => 'pdf']
// );
// }




}

?>
