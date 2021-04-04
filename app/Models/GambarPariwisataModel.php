<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarPariwisataModel extends Model
{
    public function gambar()
    {
     $this->hasMany(GambarPariwisataModel::class, 'id_pariwisata', 'id_pariwisata');
    }
}
