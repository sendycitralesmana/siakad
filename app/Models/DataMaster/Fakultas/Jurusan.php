<?php

namespace App\Models\DataMaster\Fakultas;

use App\Models\DataMaster\Fakultas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DataMaster\Fakultas\Jurusan\ProgramStudi;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }

    public function prodi(): HasMany
    {
        return $this->hasMany(ProgramStudi::class, 'jurusan_id', 'id');
    }
}
