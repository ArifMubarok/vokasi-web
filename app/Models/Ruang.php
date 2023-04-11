<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $table = 'ruang';

    protected $guarded = ['id'];

    public function fasilitasRuang()
    {
        return $this->hasMany(fasilitasRuang::class, foreignKey: 'ruang_id');
    }
}