<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logSkripsi extends Model
{
    use HasFactory;
    protected $table = 'log_skripsi';
    protected $fillable = [
        'judul',
        'penulis',
        'waktu',
        'status',
    ];
}
