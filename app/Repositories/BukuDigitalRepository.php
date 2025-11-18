<?php

namespace App\Repositories;

use App\Models\BukuDigital;
use App\Repositories\BaseRepository;

class BukuDigitalRepository extends BaseRepository
{
    protected $fieldSearchable = [
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

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return BukuDigital::class;
    }
}
