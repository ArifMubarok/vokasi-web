<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitasUNS extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_uns';

    protected $guarded = ['id'];
}