<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisModel extends Model
{
    protected $table = 'tbl_jenis';

    public function jenis()
    {
        return $this->hasMany(\App\Models\WisataModel::class, 'id_jenis', 'id_jenis');
    }
    
     public function AllData()
    {
        return DB::table('tbl_jenis')
        ->get();
    }

    public function InsertData($data)
        {
            DB::table ('tbl_jenis')
            ->insert($data);
        }

     public function DetailData($id_jenis)
      {
         return DB::table('tbl_jenis')
        ->where('id_jenis', $id_jenis)-> first();
     }

     public function UpdateData($id_jenis, $data)
     {
         DB::table ('tbl_jenis')
         ->where('id_jenis', $id_jenis)
         ->update($data);
     }

     public function DeleteData($id_jenis)
    {
        DB::table ('tbl_jenis')
        ->where('id_jenis', $id_jenis)
        ->delete();
    }
 

}