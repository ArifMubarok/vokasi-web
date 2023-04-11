<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hakiProdiModel extends Model
{
    use HasFactory;

    protected $table = 'haki_prodi';

    protected $guarded = ['id'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function grup()
    {
        return $this->belongsTo(GrupRisetModel::class);
    }


}
