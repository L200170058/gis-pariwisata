<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoWisataModel extends Model
{
    use HasFactory;

    protected $table = 'tb_foto_wisata';
    protected $guarded = ['id'];

    public function wisata()
    {
    	return $this->belongsTo(\App\Models\WisataModel::class, 'id_wisata', 'id_wisata');
    }
}
