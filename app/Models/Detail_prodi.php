<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_prodi extends Model
{
    use HasFactory;

    protected $table = 'detail_prodi';

    protected $fillable = ['prodi_id', 'name', 'value'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    // public function kontenProdi()
    // {
    //     return $this->belongsTo(kontenProdi::class);
    // }
}
