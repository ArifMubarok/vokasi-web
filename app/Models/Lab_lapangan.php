<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab_lapangan extends Model
{
    use HasFactory;

    protected $table = 'lab_lapangan';

    protected $guarded = ['id'];

    public function fasilitasLabLap()
    {
        return $this->hasMany(fasilitasLab_Lapangan::class, foreignKey: 'lap_id');
    }
}