<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $timestamps = false;

    protected $table      = 'kategori_aset';
    protected $primaryKey = 'kategori_id';
    protected $fillable   = [
        'nama',
        'kode',
        'deskripsi',
    ];
}
