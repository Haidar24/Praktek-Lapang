<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primarykey = 'id';
    // use HasFactory;

    protected $fillable = [
        'jabatan',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    

    public function jabatan(){
        return $this->hasMany(Jabatan::class);
}
}