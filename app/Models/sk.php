<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sk extends Model
{
    use HasFactory;
    protected $table = 'sks';
    protected $fillable = [
    'no_surat',
    'instansi_pengirim',
    'tgl_surat',
    'tgl_surat_di_terima',
    'perihal',
    'lampiran_jumlah',
    'jenis',
    'kls_id',
    'foto',
    'created_at',
    'updated_at',
    ];
    public function kls()
    {
        return $this->belongsTo(kl::class);
    }
 }
