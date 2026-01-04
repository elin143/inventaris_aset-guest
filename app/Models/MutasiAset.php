<?php
namespace App\Models;

use App\Models\Aset;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiAset extends Model
{
    use HasFactory;

    protected $table      = 'mutasi_aset';
    protected $primaryKey = 'mutasi_id';

    protected $fillable = [
        'aset_id',
        'tanggal',
        'jenis_mutasi',
        'keterangan',
    ];

    // Relasi ke Aset
    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id', 'aset_id');
    }
    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'like', '%' . $request->search . '%');
                }
            });
        }
    }
}
