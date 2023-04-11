<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitasLab extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_lab';

    protected $guarded = ['id'];

    public function lab()
    {
        return $this->belongsTo(Laboratorium::class);
    }
}