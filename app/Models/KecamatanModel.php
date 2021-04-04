<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KecamatanModel extends Model
{

    protected $table = 'tbl_kecamatan';
    
    public function jenis()
    {
        return $this->hasMany(\App\Models\WisataModel::class, 'id_kecamatan', 'id_kecamatan');
        
    }
    
    public function AllData()
    {
        return DB::table('tbl_kecamatan')
        ->get();
    }

    public function InsertData($data)
        {
            DB::table ('tbl_kecamatan')
            ->insert($data);
        }

    public function DetailData($id_kecamatan)
        {
           return DB::table('tbl_kecamatan')
           ->where('id_kecamatan', $id_kecamatan)-> first();

        }

    public function UpdateData($id_kecamatan, $data)
        {
            DB::table ('tbl_kecamatan')
            ->where('id_kecamatan', $id_kecamatan)
            ->update($data);
        }
    
    public function DeleteData($id_kecamatan)
    {
        DB::table ('tbl_kecamatan')
        ->where('id_kecamatan', $id_kecamatan)
        ->delete();
    }
}