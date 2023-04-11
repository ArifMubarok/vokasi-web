<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoPenting extends Model
{
    use HasFactory;

    protected $table = 'info_penting';

    protected $guarded = ['id'];
}