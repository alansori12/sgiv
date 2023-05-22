<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{

    public function mahasiswa(){
    	return $this->belongsTo('App\Mahasiswa');
    }

    use HasFactory;
    protected $table = 'table_jurnal';
    protected $fillable = [
        'tanggal',
        'judul',
        'penyusun',
        'volume',
        'abstrak',
        'artikel',
        'status',
        'id_mahasiswa',
    ];
}