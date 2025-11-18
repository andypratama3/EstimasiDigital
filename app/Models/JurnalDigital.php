<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalDigital extends Model
{
    public $table = 'jurnal_digital';

    public $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_publikasi',
        'volume',
        'nomor',
        'issn',
        'deskripsi',
        'bidang_ilmu',
        'is_protected',
        'created_by',
        'updated_by',
        'is_deleted'
    ];

    protected $casts = [
        'judul' => 'string',
        'pengarang' => 'string',
        'penerbit' => 'string',
        'tahun_publikasi' => 'date',
        'volume' => 'string',
        'nomor' => 'string',
        'issn' => 'string',
        'deskripsi' => 'string',
        'bidang_ilmu' => 'string',
        'is_protected' => 'boolean',
        'is_deleted' => 'boolean'
    ];

    public static array $rules = [
        'judul' => 'required|string|max:255',
        'pengarang' => 'nullable|string|max:100',
        'penerbit' => 'nullable|string|max:100',
        'tahun_publikasi' => 'nullable',
        'volume' => 'nullable|string|max:20',
        'nomor' => 'nullable|string|max:20',
        'issn' => 'nullable|string|max:20',
        'deskripsi' => 'nullable|string',
        'bidang_ilmu' => 'nullable|string|max:100',
        'is_protected' => 'nullable|boolean',
        'created_by' => 'required',
        'updated_by' => 'nullable',
        'is_deleted' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }
}
