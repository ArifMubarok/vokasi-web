<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penelitian_dosen extends Model
{
    use HasFactory;

    protected $table = 'penelitian_dosen';

    protected $guarded = ['id'];

    /**
     * Get the prodi that owns the penelitian_dosen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
