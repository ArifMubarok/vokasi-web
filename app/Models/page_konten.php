<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page_konten extends Model
{
    use HasFactory;

    protected $table = 'page_konten';
    public $timestamps = false;

    protected $fillable = [
        'konten_id',
        'pages_name',
    ];

    public function konten()
    {
        return $this->belongsTo(konten::class);
    }

    public function pages()
    {
        return $this->belongsTo(pages::class);
    }

}
