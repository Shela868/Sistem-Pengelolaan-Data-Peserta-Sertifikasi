<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\asesmen;
use App\Models\logadmin;
use App\Models\pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class userController extends Controller
{
    //midleware user
    public function index( request $request)
    {

        $user = Auth::user()->with('asesmen');
        return view('users.frontend', compact('user'));

    }
    public function sertifikasi(request $request)
    {
         $users =Auth::user()->with('asesmen');
        return view('users.sertifikasi', compact( 'users'));
    }
    public function peserta_profile(request $request)
    {
         $users =Auth::user()->with('asesmen');
        return view('users.peserta_profile', compact( 'users'));
    }
    public function edit_peserta( request $request)
    {
         $users =Auth::user()->with('asesmen');
        return view('users.edit_peserta', compact( 'users'));
    }
    public function update_peserta($id, request $request)
    {
        $users = user::find($id);
        $this->validate($request,
            [
                'id' => 'required|numeric',
                'name' => 'required',

                'NIK' => 'required',
                'jenis_kelamin' => 'required|in:L,P',
                'email' => 'nullable',
                'HP' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ],

            [
                'id.required' => 'ID harus diisi',
                'name.required' => 'Nama Lengkap harus diisi',
                'NIK.required' => 'NIK harus diisi',
                'jenis_kelamin.required' => 'jenis kelamin harus diisi harus diisi',
                'email.required' => 'Email harus diisi',
                'HP.required' => 'No HP harus diisi harus diisi',

            ]
        );

        $avatar = '';
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $avatar = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $avatar);
            $request['image'] = $avatar;
        }
        ;

        $users->update($request->all());
        // $user=Auth::user();
        activity()->log('data peserta diperbarui oleh peserta');
        return redirect('/peserta_profile', )->with('sukses', 'data berhasil diinput');
    }


    //midleware admin
    public function tableuser(request $request)
    {

        $user = Auth::user();
        $data_user = user::all();

        return view('users.users', compact('user', 'data_user'));

    }

    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        activity()->log('menghapus data user');
        return redirect('/users')->with('sukses', 'data berhasil dihapus');

    }
    public function update($id, request $request)
    {
        $users = user::find($id);
        $this->validate($request,
            [
                'id' => 'required|numeric',
                'name' => 'required',
                'role' => 'required',
                'NIK' => 'required',
                'jenis_kelamin' => 'required|in:L,P',
                'email' => 'nullable',
                'HP' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ],

            [
                'id.required' => 'ID harus diisi',
                'name.required' => 'Nama Lengkap harus diisi',
                'NIK.required' => 'NIK harus diisi',
                'jenis_kelamin.required' => 'jenis kelamin harus diisi harus diisi',
                'role.required' => 'role harus diisi harus diisi',
                'email.required' => 'Email harus diisi',
                'HP.required' => 'No HP harus diisi harus diisi',

            ]
        );

        $avatar = '';
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $avatar = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $avatar);
            $request['image'] = $avatar;
        }
        ;

        $users->update($request->all());
        // $user=Auth::user();
        activity()->log('memperbarui data pengguna');
        return redirect('/users', )->with('sukses', 'data berhasil diinput');
    }


    public function edit_user($id)
    {
        $users = Auth::user()->find($id);
        $user = Auth::user();
        return view('admin.edit_user', compact('user', 'users'));
    }
    public function create(request $request)
    {
        $users = user::all();
        $user = Auth::user();
        return view('admin.createuser', compact(['user','users',]));
    }

    public function store(request $request){
        $this->validate($request, [
            'id' => 'required|numeric',
            'name' => 'required',
            'role' => 'required',
            'NIK' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'email' => 'nullable',
            'HP' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',],

            [
                'id.required' => 'ID harus diisi',
                'name.required' => 'Nama Lengkap harus diisi',
                'NIK.required' => 'NIK harus diisi',
                'jenis_kelamin.required' => 'jenis kelamin harus diisi harus diisi',
                'role.required' => 'role harus diisi harus diisi',
                'email.required' => 'Email harus diisi',
                'HP.required' => 'No HP harus diisi harus diisi',
        ]);

        $newimg = '';
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newimg = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $newimg);
        }


        $request['image'] = $newimg;
        $users = user::create($request->all());
        activity()->log('menambhakan data pengguna baru');
        return redirect('/users')->with('sukses', 'data berhasil diinput');


    }

}
