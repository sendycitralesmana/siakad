<?php

namespace App\Models\DataMaster\Fakultas\Jurusan;

use Illuminate\Database\Eloquent\Model;
use App\Models\DataMaster\ProdiMataKuliah;
use App\Models\DataMaster\Fakultas\Jurusan;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function matkul(): HasMany
    {
        return $this->hasMany(ProdiMataKuliah::class, 'program_studi_id', 'id');
    }
}
