<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumenAkreditasi extends Model
{
    use HasFactory;

    protected $table = 'dokumen_akreditasi_prodi';

    protected $fillable = [
        'prodi_id',
        'name',
        'link'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}