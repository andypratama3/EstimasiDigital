<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BukuDigital extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

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
        'tahun_terbit' => 'string', // gunakan string biar bisa simpan "YYYY"
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
        'tahun_terbit' => 'nullable|string|max:4',
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

    /**
     * Media Collection for Buku File
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('buku_file')
            ->singleFile();
            
        $this->addMediaCollection('cover')
            ->singleFile(); // cover hanya satu
    }

    /**
     * Media Conversions (optional)
     */
    public function registerMediaConversions($media = null): void
    {
        // tambahkan jika butuh preview image / thumbnail
    }

    /**
     * Get Buku File Media Object
     */
    public function getBukuFile()
    {
        return $this->getFirstMedia('buku_file');
    }

    /**
     * Get Buku File URL
     */
    public function getBukuFileUrl(): ?string
    {
        $media = $this->getFirstMedia('buku_file');
        return $media ? $media->getFullUrl() : null;
    }

    /**
     * Get Buku File Name
     */
    public function getBukuFileName(): ?string
    {
        $media = $this->getFirstMedia('buku_file');
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
