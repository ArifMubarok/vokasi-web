<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitasGedung extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_gedung';

    protected $guarded = ['id'];
}