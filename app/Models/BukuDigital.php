<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuDigital extends Model
{
    public $table = 'buku_digital';

    public $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'isbn',
        'deskripsi',
        'kategori',
        'is_protected',
        'created_by',
        'updated_by',
        'is_deleted'
    ];

    protected $casts = [
        'judul' => 'string',
        'pengarang' => 'string',
        'penerbit' => 'string',
        'tahun_terbit' => 'date',
        'isbn' => 'string',
        'deskripsi' => 'string',
        'kategori' => 'string',
        'is_protected' => 'boolean',
        'is_deleted' => 'boolean'
    ];

    public static array $rules = [
        'judul' => 'required|string|max:255',
        'pengarang' => 'nullable|string|max:100',
        'penerbit' => 'nullable|string|max:100',
        'tahun_terbit' => 'nullable',
        'isbn' => 'nullable|string|max:20',
        'deskripsi' => 'nullable|string',
        'kategori' => 'nullable|string|max:50',
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
