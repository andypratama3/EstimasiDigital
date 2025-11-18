<?php

namespace App\Repositories;

use App\Models\JurnalDigital;
use App\Repositories\BaseRepository;

class JurnalDigitalRepository extends BaseRepository
{
    protected $fieldSearchable = [
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

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return JurnalDigital::class;
    }
}
