<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebModel extends Model
{
    public function DataKecamatan()
    {
        return DB::table('tbl_kecamatan')
        ->get();
    }
    
    public function DataJenis()
    {
        return DB::table('tbl_jenis')
        ->get();
    }

    public function DetailJenis($id_jenis)
    {
        return DB::table('tbl_jenis')
            ->where('id_jenis', $id_jenis)->first();
    }

    public function DataWisataJenis($id_jenis)
    {
        return DB::table('tbl_wisata')
            ->join('tbl_jenis', 'tbl_jenis.id_jenis', '=', 'tbl_wisata.id_jenis')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_wisata.id_kecamatan')
            ->where('tbl_wisata.id_jenis', $id_jenis)
            ->get();
    }


    public function DetailKecamatan($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')
        ->where('id_kecamatan', $id_kecamatan)-> first();
    }

    public function DataWisata($id_kecamatan)
    {
        return DB::table('tbl_wisata')
        ->join('tbl_jenis', 'tbl_jenis.id_jenis', '=', 'tbl_wisata.id_jenis')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_wisata.id_kecamatan')
        ->where('tbl_wisata.id_kecamatan', $id_kecamatan)
        ->get();
    }

    public function AllDataWisata()
    {
        return DB::table('tbl_wisata')
        ->join('tbl_jenis', 'tbl_jenis.id_jenis', '=', 'tbl_wisata.id_jenis')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_wisata.id_kecamatan')
        ->get();
    }

    public function DetailDataWisata($id_wisata)
    {
        return DB::table('tbl_wisata')
        ->join('tbl_jenis', 'tbl_jenis.id_jenis', '=', 'tbl_wisata.id_jenis')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_wisata.id_kecamatan')
        ->where('id_wisata', $id_wisata)
        ->first();
    }
}
