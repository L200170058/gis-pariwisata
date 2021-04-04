<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecamatanModel;

class KecamatanController extends Controller
{
    
    public function __construct()
    {
      $this->KecamatanModel = new KecamatanModel;
      $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
            'title' => 'Kecamatan',
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];
        return view('admin.kecamatan.v_index', $data); 
    }

    public function add()
    {
        $data = [
            'title' => ' Tambah Data Kecamatan',
        ];
        return view('admin.kecamatan.v_add', $data); 
    }

    public function insert()
    {
        Request()->validate(
        [
            'kecamatan' => 'required',
            'warna' => 'required',
            'geojson' => 'required',
        ],
        [
            'kecamatan.required' => 'Wajib diisi!',
            'warna.required' => 'Wajib diisi!',
            'geojson.required' => 'Wajib diisi!',
        ]
    );
    //jika validasi tidak ada makalakukan simpan datakedata base
    $data = [
        'kecamatan' => request()->kecamatan,
        'warna' => request()->warna,
        'geojson' => request()->geojson,
        ];
        $this->KecamatanModel->InsertData($data);
        return redirect()->route('kecamatan')->with('pesan','Data Berhasil Ditambahkan');
    }
    

    public function edit($id_kecamatan)
    {
        $data = [
            'title' => 'Edit Data Kecamatan',
            'kecamatan' => $this->KecamatanModel->DetailData($id_kecamatan),
        ];
        return view('admin.kecamatan.v_edit', $data); 
    }

    public function update($id_kecamatan)
    {
        Request()->validate([
            'kecamatan' => 'required',
            'warna' => 'required',
            'geojson' => 'required',
        ],
        [
            'kecamatan.required' => 'Wajib diisi!',
            'warna.required' => 'Wajib diisi!',
            'geojson.required' => 'Wajib diisi!',
        ]
    );
    //jika validasi tidak ada makalakukan simpan datakedata base
    $data = [
        'kecamatan' => request()->kecamatan,
        'warna' => request()->warna,
        'geojson' => request()->geojson,
        ];
        $this->KecamatanModel->UpdateData($id_kecamatan, $data);
        return redirect()->route('kecamatan')->with('pesan','Data Berhasil DiUpdate');
    }
    
    public function delete($id_kecamatan)
    {
        $this->KecamatanModel->DeleteData($id_kecamatan);
        return redirect()->route('kecamatan')->with('pesan','Data Berhasil Dihapus');
    }
}
