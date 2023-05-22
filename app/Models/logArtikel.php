<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logArtikel extends Model
{
    use HasFactory;
    protected $table = 'log_artikel';
    protected $fillable = [
        'judul',
        'penyusun',
        'waktu',
        'status',
    ];
}
