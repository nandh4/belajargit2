<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagging extends Model
{
    /**
     * Nama tabel yang digunakan model.
     */
    protected $table = 'taggings';

    /**
     * Kolom yang boleh diisi secara mass assignment.
     */
    protected $fillable = [
        'assignment_id',
        'assignment_status_alias',
        'level_6_full_code',
        'nama_usaha_bang',
        'nama_kk',
        'ada_keluarga_label',
        'ada_bang_usaha_label',
        'geotag_accuracy',
        'geotag_latitude',
        'geotag_longitude',
    ];

        public function getKodeKecamatanAttribute()
    {
        return substr($this->level_6_full_code, 0, 7);
    }
}