<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\mitraumiController;
use App\Http\Controllers\userController;
use App\Models\asesmen;
use App\Models\user;
use Illuminate\Support\Facades\Route;


// Route::get('/export', function () { return view('admin.export_mitraumi');});
Route::get('/cetak/{id}', [mitraumiController::class,'cetak']);
Route::get('/admin_profile',[mitraumiController::class, 'admin_profile']);
//mitra umi routes
Route::get('/login', [AuthController::class,'index']);
Route::middleware(['auth','roleuser:admin'])->group (function () {
Route::get('/mitra_umi', [mitraumiController::class,'index']);
Route::get('/detail/blanko', [mitraumiController::class,'blanko']);
Route::get('/mitra_umi/create', [mitraumiController::class,'create']);
Route::post('/mitra_umi/store', [mitraumiController::class,'store']);
Route::get('/mitra_umi/{id}/edit', [mitraumiController::class,'edit']);
Route::put('/mitra_umi/{id}', [mitraumiController::class,'update']);
Route::get('/mitra_umi/{id}/delete', [mitraumiController::class,'destroy']);
Route::get('/download', [mitraumiController::class,'download']);
Route::get('/filter-tuk', [mitraumiController::class,'filtertuk']);
Route::post('mitra_umi/import', [mitraumiController::class, 'import'])->name('mitraumi.import');
Route::get('mitra_umi/export', [mitraumiController::class, 'export'])->name('mitraumi.export');
Route::resource('pendidikan', 'pendidikanController');
Route::resource('asesmen', 'asesmenController');
Route::get('/users/{id}/delete', [userController::class,'destroy']);
Route::put('/users/{id}', [userController::class,'update']);
Route::get('/mitra_umi/{id}/detail', [mitraumiController::class,'show']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['verified']);
Route::get('/logadmin',[HomeController::class,'logadmin']);
Route::get('/users/{id}/edit',[userController::class,'edit_user']);
Route::get('/users', [userController::class,'tableuser']);
Route::get('/pengguna_baru', [userController::class,'create']);
Route::post('/users/store', [userController::class,'store']);
});

// Route::middleware(['auth','roleuser:peserta'])->group (function () {});
Route::get('/frontend', [userController::class,'index'])->middleware(['verified']);
Route::get('/peserta_profile', [userController::class,'peserta_profile'])->middleware(['verified']);
Route::get('/peserta_edit', [userController::class,'edit_peserta'])->middleware(['verified']);
Route::put('/peserta/{id}', [userController::class,'update_peserta'])->middleware(['verified']);
Route::get('/sertifikasi', [userController::class,'sertifikasi'])->name('sertifikasi.peserta')->middleware(['verified']);

Auth::routes(['verify' => true]);
?>
