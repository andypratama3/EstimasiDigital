<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class JurnalDigital extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

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

    protected $deleted_at = 'deleted_at';

    protected $casts = [
        'judul' => 'string',
        'pengarang' => 'string',
        'penerbit' => 'string',
        'tahun_publikasi' => 'string',
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
        'tahun_publikasi' => 'nullable|string|max:4',
        'volume' => 'nullable|string|max:20',
        'nomor' => 'nullable|string|max:20',
        'issn' => 'nullable|string|max:20',
        'deskripsi' => 'nullable|string',
        'bidang_ilmu' => 'nullable|string|max:100',
        // 'jurnal_file' => 'nullable|mimes:pdf,doc,docx|max:10240',
        'is_protected' => 'nullable|boolean',
        'created_by' => 'required',
        'updated_by' => 'nullable',
        'is_deleted' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * Register media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('jurnal_file')
            ->singleFile();
    }

    /**
     * Register media conversions
     */
    public function registerMediaConversions($media = null): void
    {
        // Add any conversions if needed
    }

    /**
     * Get jurnal file
     */
    public function getJurnalFile()
    {
        return $this->getFirstMedia('jurnal_file');
    }

    /**
     * Get jurnal file URL
     */
    public function getJurnalFileUrl(): ?string
    {
        $media = $this->getFirstMedia('jurnal_file');
        return $media ? $media->getFullUrl() : null;
    }

    /**
     * Get jurnal file name
     */
    public function getJurnalFileName(): ?string
    {
        $media = $this->getFirstMedia('jurnal_file');
        return $media ? $media->file_name : null;
    }

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }
}
