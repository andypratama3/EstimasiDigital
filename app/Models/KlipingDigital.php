<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KlipingDigital extends Model
{
    use SoftDeletes;

    public $table = 'kliping_digital';

    public $fillable = [
        'judul',
        'sumber',
        'tanggal_publikasi',
        'penulis',
        'isi',
        'kategori',
        'url_sumber',
        'is_protected',
        'created_by',
        'updated_by',
        'is_deleted'
    ];

    protected $deleted_at = ['deleted_at'];

    protected $casts = [
        'judul' => 'string',
        'sumber' => 'string',
        'tanggal_publikasi' => 'date',
        'penulis' => 'string',
        'isi' => 'string',
        'kategori' => 'string',
        'url_sumber' => 'string',
        'is_protected' => 'boolean',
        'is_deleted' => 'boolean'
    ];

    public static array $rules = [
        'judul' => 'required|string|max:255',
        'sumber' => 'nullable|string|max:100',
        'tanggal_publikasi' => 'nullable',
        'penulis' => 'nullable|string|max:100',
        'isi' => 'nullable|string',
        'kategori' => 'nullable|string|max:50',
        'url_sumber' => 'nullable|string|max:255',
        'is_protected' => 'nullable|boolean',
        'created_by' => 'nullable',
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
