<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontenProdi extends Model
{
    use HasFactory;

    protected $table = 'kontenProdi';

    protected $fillable = ['name', 'value'];

    public function detailProdi()
    {
        return $this->hasMany(Detail_prodi::class);
    }
}
