<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    use HasFactory;

    protected $table = 'lab';

    protected $guarded = ['id'];

    public function fasilitasLab()
    {
        return $this->hasMany(fasilitasLab::class, foreignKey: 'lab_id');
    }
}