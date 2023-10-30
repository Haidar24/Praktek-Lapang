<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kl extends Model
{
    use HasFactory;

    protected $table = 'kls';

    protected $primarykey = 'id';

    protected $fillable = [
        'kode',
        'klasifikasi',
        'keterangan',
    ];

    public function sms()
    {
        return $this->hasMany(sm::class);
    }

      public function sks()
    {
        return $this->hasMany(sk::class);
    }
}
