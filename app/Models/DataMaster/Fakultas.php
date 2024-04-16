<?php

namespace App\Models\DataMaster;

use Illuminate\Database\Eloquent\Model;
use App\Models\DataMaster\Fakultas\Jurusan;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultas extends Model
{
    use HasFactory;

    public function jurusan(): HasMany
    {
        return $this->hasMany(Jurusan::class, 'fakultas_id', 'id');
    }
}
