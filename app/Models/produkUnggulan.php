<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkUnggulan extends Model
{
    use HasFactory;

    protected $table = 'produk_unggulan_prodi';

    protected $fillable = [
        'prodi_id',
        'produk',
        'leaflet',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
