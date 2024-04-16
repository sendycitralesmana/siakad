<?php

namespace App\Models\DataMaster;

use App\Models\Akademik\Krs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DataMaster\Fakultas\Jurusan\ProgramStudi;

class ProdiMataKuliah extends Model
{
    use HasFactory;

    protected $table = 'prodi_mata_kuliah';
    protected $fillable = [
        'program_studi_id',
        'dosen_mata_kuliah_id',
        'semester_wajib',
    ];

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id', 'id');
    }

    public function dosenMatkul(): BelongsTo
    {
        return $this->belongsTo(DosenMataKuliah::class, 'dosen_mata_kuliah_id', 'id');
    }

    public function krs(): HasMany
    {
        return $this->hasMany(Krs::class, 'prodi_mata_kuliah_id', 'id');
    }
}
