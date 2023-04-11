<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitasLab_Lapangan extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_lab_lapangan';

    protected $guarded = ['id'];

    public function lap()
    {
        return $this->belongsTo(Lab_lapangan::class);
    }
}