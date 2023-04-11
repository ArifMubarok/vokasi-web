<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenstraModel extends Model
{
    use HasFactory;

    protected $table = 'renstra';

    protected $guarded = ['id'];
}
