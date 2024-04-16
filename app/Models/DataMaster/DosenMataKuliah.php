<?php

namespace App\Models\DataMaster;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DosenMataKuliah extends Model
{
    use HasFactory;

    protected $table = 'dosen_mata_kuliah';
    protected $fillable = [
        'dosen_id',
        'mata_kuliah_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the prodiMatkul for the DosenMataKuliah
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prodiMatkul(): HasMany
    {
        return $this->hasMany(ProdiMataKuliah::class, 'dosen_mata_kuliah_id', 'id');
    }

    public function matkul(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }
}
