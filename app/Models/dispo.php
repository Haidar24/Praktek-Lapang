<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dispo extends Model
{
    use HasFactory;

    protected $table = 'dispo';

    protected $fillable = [
        // 'tanggal_jatuh_tempo',
        'isi',
        'catatan',
        'No_surat_id',
        'jabatan_id',
       
    ] ;

    public function sms()
    {
        return $this->belongsTo(sm::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
    }
}
