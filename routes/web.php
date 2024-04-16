<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Akademik\KhsController;
use App\Http\Controllers\Akademik\KrsController;
use App\Http\Controllers\Pengguna\AdminController;
use App\Http\Controllers\Pengguna\DosenController;
// use App\Http\Controllers\Akademik\FakultasController;
use App\Http\Controllers\Akademik\PenilaianController;
use App\Http\Controllers\Pengguna\MahasiswaController;
use App\Http\Controllers\DataMaster\FakultasController;
// use App\Http\Controllers\Akademik\MataKuliahUmumController;
// use App\Http\Controllers\Akademik\DosenMataKuliahController;
// use App\Http\Controllers\Akademik\ProdiMataKuliahController;
// use App\Http\Controllers\Akademik\Fakultas\JurusanController;
// use App\Http\Controllers\Akademik\Fakultas\Jurusan\ProgramStudiController;
use App\Http\Controllers\DataMaster\MataKuliahController;
use App\Http\Controllers\Akademik\TahunAkademikController;
use App\Http\Controllers\DataMaster\DosenMataKuliahController;
use App\Http\Controllers\DataMaster\ProdiMataKuliahController;
use App\Http\Controllers\DataMaster\Fakultas\JurusanController;
use App\Http\Controllers\DataMaster\Fakultas\Jurusan\ProgramStudiController;
// use App\Http\Controllers\Akademik\Fakultas\Jurusan\ProgramStudi\MataKuliahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// grup middleware guest
Route::group(['middleware' => 'guest'], function () {
    
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_action']);
    Route::get('/daftar', [AuthController::class, 'daftar']);
    Route::post('/daftar', [AuthController::class, 'daftarAksi']);
    Route::get('/lupa-password', [AuthController::class, 'lupaPassword']);
    Route::post('/lupa-password', [AuthController::class, 'lupaPasswordAksi']);
    Route::get('/verify/{token}', [AuthController::class, 'verify']);
    Route::get('/atur-ulang/{token}', [AuthController::class, 'aturUlang']);
    Route::put('/atur-ulang/{token}', [AuthController::class, 'aturUlangPassword']);
});



// middleware login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return redirect('/backoffice/dashboard');
    });

    // logout
    Route::get('/logout', [AuthController::class, 'logout']);

    // grup backoffice
    Route::group(['prefix' => 'backoffice'], function () {

        // grup dashboard
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [DashboardController::class, 'dashboard']);
        });

        // grup user
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'user']);
            Route::get('/tambah', [UserController::class, 'tambah']);
            Route::post('/tambah', [UserController::class, 'tambahAksi']);
            Route::get('/{id}/hapus', [UserController::class, 'hapus']);
            Route::get('/{id}/profil', [UserController::class, 'profil']);
            Route::get('/{id}/ubah-data', [UserController::class, 'ubahData']);
            Route::put('/{id}/ubah-data', [UserController::class, 'ubahDataAksi']);
            Route::get('/{id}/ubah-status', [UserController::class, 'ubahStatus']);
            Route::put('/{id}/ubah-status', [UserController::class, 'ubahStatusAksi']);
            Route::get('/{id}/ubah-password', [UserController::class, 'ubahPassword']);
            Route::put('/{id}/ubah-password', [UserController::class, 'ubahPasswordAksi']);
        });

        // grup pengguna
        Route::group(['prefix' => 'pengguna'], function () {

            // grup admin
            Route::group(['prefix' => 'admin'], function () {
                Route::get('/', [AdminController::class, 'admin']);
                Route::get('/tambah', [AdminController::class, 'tambah']);
                Route::post('/tambah', [AdminController::class, 'tambahAksi']);
                Route::get('/{id}/hapus', [AdminController::class, 'hapus']);
            });

            // grup dosen
            Route::group(['prefix' => 'dosen'], function () {
                Route::get('/', [DosenController::class, 'dosen']);
                Route::get('/tambah', [DosenController::class, 'tambah']);
                Route::post('/tambah', [DosenController::class, 'tambahAksi']);
                Route::get('/{id}/hapus', [DosenController::class, 'hapus']);
            });

            // grup mahasiswa
            Route::group(['prefix' => 'mahasiswa'], function () {
                Route::get('/', [MahasiswaController::class, 'mahasiswa']);
                Route::get('/tambah', [MahasiswaController::class, 'tambah']);
                Route::post('/tambah', [MahasiswaController::class, 'tambahAksi']);
                Route::get('/{id}/hapus', [MahasiswaController::class, 'hapus']);
            });
        });

        // grup data-master
        Route::group(['prefix' => 'data-master'], function () {

            // grup fakultas
            Route::group(['prefix' => 'fakultas'], function () {
                Route::get('/', [FakultasController::class, 'fakultas']);
                Route::get('/{id}/ubah', [FakultasController::class, 'ubah']);
                Route::put('/{id}/ubah', [FakultasController::class, 'ubahAksi']);
                Route::get('/tambah', [FakultasController::class, 'tambah']);
                Route::post('/tambah', [FakultasController::class, 'tambahAksi']);
                Route::get('/{id}/hapus', [FakultasController::class, 'hapus']);

                // grup fakultas id
                Route::group(['prefix' => '{fakultas_id}'], function () {
                    // grup jurusan
                    Route::group(['prefix' => 'jurusan'], function () {
                        Route::get('/', [JurusanController::class, 'jurusan']);
                        Route::get('/tambah', [JurusanController::class, 'tambah']);
                        Route::post('/tambah', [JurusanController::class, 'tambahAksi']);
                        Route::get('/{id}/ubah', [JurusanController::class, 'ubah']);
                        Route::put('/{id}/ubah', [JurusanController::class, 'ubahAksi']);
                        Route::get('/{id}/hapus', [JurusanController::class, 'hapus']);

                        // grup jurusan id
                        Route::group(['prefix' => '{jurusan_id}'], function () {
                            // grup prodi
                            Route::group(['prefix' => 'prodi'], function () {
                                Route::get('/', [ProgramStudiController::class, 'prodi']);
                                Route::get('/tambah', [ProgramStudiController::class, 'tambah']);
                                Route::post('/tambah', [ProgramStudiController::class, 'tambahAksi']);
                                Route::get('/{id}/ubah', [ProgramStudiController::class, 'ubah']);
                                Route::put('/{id}/ubah', [ProgramStudiController::class, 'ubahAksi']);
                                Route::get('/{id}/hapus', [ProgramStudiController::class, 'hapus']);

                                // grup prodi id
                                Route::group(['prefix' => '{prodi_id}'], function () {
                                    // grup matkul
                                    Route::group(['prefix' => 'matkul'], function () {
                                        Route::get('/', [MataKuliahController::class, 'matkul']);
                                        Route::get('/tambah', [MataKuliahController::class, 'tambah']);
                                        Route::post('/tambah', [MataKuliahController::class, 'tambahAksi']);
                                        Route::get('/{id}/hapus', [MataKuliahController::class, 'hapus']);
                                    });
                                });

                            });

                        });
                    });

                });

            });

            // grup matkul
            Route::group(['prefix' => 'matkul'], function () {
                Route::get('/', [MataKuliahController::class, 'matkul']);
                Route::get('/tambah', [MataKuliahController::class, 'tambah']);
                Route::post('/tambah', [MataKuliahController::class, 'tambahAksi']);
                Route::get('/{id}/ubah', [MataKuliahController::class, 'ubah']);
                Route::put('/{id}/ubah', [MataKuliahController::class, 'ubahAksi']);
                Route::get('/{id}/hapus', [MataKuliahController::class, 'hapus']);
            });

            // grup dosen matkul
            Route::group(['prefix' => 'dosen-matkul'], function () {
                Route::get('/', [DosenMataKuliahController::class, 'dosenMatkul']);
                Route::get('/tambah', [DosenMataKuliahController::class, 'tambah']);
                Route::post('/tambah', [DosenMataKuliahController::class, 'tambahAksi']);
                Route::get('/{id}/hapus', [DosenMataKuliahController::class, 'hapus']);
            });

            // grup prodi matkul
            Route::group(['prefix' => 'prodi-matkul'], function () {
                Route::get('/', [ProdiMataKuliahController::class, 'prodiMatkul']);
                // Route::get('/tambah', [ProdiMataKuliahController::class, 'tambah']);
                // Route::post('/tambah', [ProdiMataKuliahController::class, 'tambahAksi']);
                // Route::get('/{id}/ubah', [ProdiMataKuliahController::class, 'ubah']);
                // Route::put('/{id}/ubah', [ProdiMataKuliahController::class, 'ubahAksi']);
                // Route::get('/{id}/hapus', [ProdiMataKuliahController::class, 'hapus']);
                Route::get('/umum', [ProdiMataKuliahController::class, 'umum']);
                Route::get('/umum-tambah', [ProdiMataKuliahController::class, 'umumTambah']);
                Route::post('/umum-tambah', [ProdiMataKuliahController::class, 'umumTambahAksi']);
                Route::get('/{id}/umum/ubah-semester', [ProdiMataKuliahController::class, 'umumUbahSemester']);
                Route::put('/{id}/umum/ubah-semester', [ProdiMataKuliahController::class, 'umumUbahSemesterAksi']);
                Route::get('/prodi/{prodi_id}', [ProdiMataKuliahController::class, 'prodi']);
                Route::get('/prodi/{prodi_id}/tambah', [ProdiMataKuliahController::class, 'prodiTambah']);
                Route::post('/prodi/{prodi_id}/tambah', [ProdiMataKuliahController::class, 'prodiTambahAksi']);
                Route::get('/{id}/prodi/{prodi_id}/ubah-semester', [ProdiMataKuliahController::class, 'prodiUbahSemester']);
                Route::put('/{id}/prodi/{prodi_id}/ubah-semester', [ProdiMataKuliahController::class, 'prodiUbahSemesterAksi']);
            });

        });

        // grup akademik
        Route::group(['prefix' => 'akademik'], function () {
            
            // grup tahun akademik
            Route::group(['prefix' => 'tahun-akademik'], function () {
                Route::get('/', [TahunAkademikController::class, 'tahunAkademik']);
                Route::get('/tambah', [TahunAkademikController::class, 'tambah']);
                Route::post('/tambah', [TahunAkademikController::class, 'tambahAksi']);
                Route::get('/{id}/ubah', [TahunAkademikController::class, 'ubah']);
                Route::put('/{id}/ubah', [TahunAkademikController::class, 'ubahAksi']);
                Route::get('/{id}/hapus', [TahunAkademikController::class, 'hapus']);
            });

            // grup krs
            Route::group(['prefix' => 'krs'], function () {
                Route::get('/', [KrsController::class, 'krs']);
                Route::get('/semester/{semester}/tambah', [KrsController::class, 'tambah']);
                Route::post('/semester/{semester}/tambah', [KrsController::class, 'tambahAksi']);
                Route::get('/{id}/ubah', [KrsController::class, 'ubah']);
                Route::put('/{id}/ubah', [KrsController::class, 'ubahAksi']);
                Route::get('/semester/{semester}', [KrsController::class, 'semester']);
                Route::get('/{id}/semester/{semester}/hapus', [KrsController::class, 'hapus']);
            });

            // grup penilaian
            Route::group(['prefix' => 'penilaian'], function () {
                Route::get('/', [PenilaianController::class, 'penilaian']);
                Route::get('/matkul/{matkul_id}', [PenilaianController::class, 'matkul']);
                Route::get('/{id}/matkul/{matkul_id}/ubah-nilai', [PenilaianController::class, 'ubahNilai']);
                Route::post('/{id}/matkul/{matkul_id}/ubah-nilai', [PenilaianController::class, 'ubahNilaiAksi']);
            });

            // grup khs
            Route::group(['prefix' => 'khs'], function () {
                Route::get('/', [KhsController::class, 'khs']);
                Route::get('/semester/{semester}', [KhsController::class, 'semester']);
            });

        });

    });

});