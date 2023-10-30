<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class sm extends Model
{
    use HasFactory;
    
    protected $table = 'sms';
    protected $primaryKey = 'id';

    protected $fillable = [
        'No_surat',
        'Instansi_pengirim',
        'Tgl_surat',
        'Tgl_surat_di_terima',
        'Perihal',
        'Lampiran_jumlah',
        'kls_id',
        'foto',
        'scannedText', // Kolom baru untuk teks yang dipindai
        'classification', // Kolom baru untuk klasifikasi
    ];
    public function dispo()
    {
        return $this->hasMany(dispo::class);
    }
    public function kls()
    {
        return $this->belongsTo(kl::class);
    }
    
}
