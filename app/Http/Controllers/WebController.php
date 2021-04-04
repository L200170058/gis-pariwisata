<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;
use App\Models\WisataModel;

class WebController extends Controller
{
    
    public function __construct()
    {
        $this->WebModel = new WebModel();
      
    }
    
    public function index()
    {
        $data = [
			
            'title' => '',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'wisata' => $this->WebModel->AllDataWisata(),
            'jenis' => $this->WebModel->DataJenis(),
        ];
        return view('v_web', $data);
    }

    public function pariwisata()
    {
        $data = [
            'title' => 'Daftar Pariwisata Klaten',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'wisata' => $this->WebModel->AllDataWisata(),
            'jenis' => $this->WebModel->DataJenis(),
        ];
        return view('v_pariwisata', $data);
    }

    public function peta()
    {
        $data = [
            'title' => 'Pemetaan Pariwisata Klaten',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'wisata' => $this->WebModel->AllDataWisata(),
            'jenis' => $this->WebModel->DataJenis(),
        ];
        return view('v_peta', $data);
    }

    public function Kecamatan($id_kecamatan)
    {
        $kec = $this->WebModel->DetailKecamatan($id_kecamatan);
        $data = [
            'title' => 'Kecamatan ' .$kec->kecamatan,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'wisata' => $this->WebModel->DataWisata($id_kecamatan),
            'jenis' => $this->WebModel->DataJenis(),
            'kec' => $kec,
        ];
        return view('v_kecamatan', $data);
    }

    public function jenis($id_jenis)
    {
        $jeni = $this->WebModel->DetailJenis($id_jenis);
        $data = [
            'title' => 'Berdasarkan Jenis Wisata ' . $jeni->jenis,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'wisata' => $this->WebModel->DataWisataJenis($id_jenis),
            'jenis' => $this->WebModel->DataJenis(),
        ];
        return view('v_jenis', $data);
    }

    public function detailwisata($id_wisata)
    {
        $wisata = WisataModel::with(['jenis','kecamatan'])->where('id_wisata', $id_wisata)->first();
        $data = [
            'title' => 'Detail '. $wisata->nama_wisata,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'jenis' => $this->WebModel->DataJenis(),
            'wisata' => $wisata,
        ];
        return view('v_detailwisata', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'wisata' => $this->WebModel->AllDataWisata(),
            'jenis' => $this->WebModel->DataJenis(),
        ];
        return view('v_about', $data);
    }
}
