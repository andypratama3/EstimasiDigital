<?php

namespace App\Repositories;

use App\Models\KlipingDigital;
use App\Repositories\BaseRepository;

class KlipingDigitalRepository extends BaseRepository
{
    protected $fieldSearchable = [
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

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return KlipingDigital::class;
    }
}
