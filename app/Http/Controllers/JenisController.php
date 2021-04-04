<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisModel;

class JenisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->JenisModel = new JenisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jenis',
            'jenis' => $this->JenisModel->AllData(),
        ];
        return view('admin.jenis.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Jenis',
        ];
        return view('admin.jenis.v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'jenis'   => 'required',
            'keterangan'   => 'required',
            'icon'      => 'required|max:1024',
        ], [
            'jenis.required' => 'Wajib Diisi !!!',
            'keterangan.required' => 'Wajib Diisi !!!',
            'icon.required' => 'Wajib Diisi !!!',
        ]);

        $file = Request()->icon;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('icon'), $filename);

        $data = [
            'jenis' => Request()->jenis,
            'keterangan' => Request()->keterangan,
            'icon' => $filename,
        ];
        $this->JenisModel->InsertData($data);
        return redirect()->route('jenis')->with('pesan', 'Data Berhasil Di Simpan.!!!');
    }

    public function edit($id_jenis)
    {
        $data = [
            'title' => 'Edit Jenis',
            'jenis' => $this->JenisModel->DetailData($id_jenis),
        ];
        return view('admin.jenis.v_edit', $data);
    }

    public function update($id_jenis)
    {
        Request()->validate([
            'jenis'   => 'required',
            'keterangan'   => 'required',
        ], [
            'jenis.required' => 'Wajib Diisi !!!',
            'keterangan.required' => 'Wajib Diisi !!!',
        ]);

        if (Request()->icon <> "") {
            //hapus icon lama
            $jenis = $this->JenisModel->DetailData($id_jenis);
            if ($jenis->icon <> "") {
                unlink(public_path('icon') . '/' . $jenis->icon);
            }
            //jika ingin ganti icon
            $file = Request()->icon;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('icon'), $filename);
            $data = [
                'jenis' => Request()->jenis,
                'keterangan' => Request()->keterangan,
                'icon' => $filename,
            ];
            $this->JenisModel->UpdateData($id_jenis, $data);
        } else {
            //jika tidak ganti icon
            $data = [
                'jenis' => Request()->jenis,
                'keterangan' => Request()->keterangan,
            ];
            $this->JenisModel->UpdateData($id_jenis, $data);
        }
        return redirect()->route('jenis')->with('pesan', 'Data Berhasil Di Update.!!!');
    }

    public function delete($id_jenis)
    {
        //hapus icon lama
        $jenis = $this->JenisModel->DetailData($id_jenis);
        if ($jenis->icon <> "") {
            unlink(public_path('icon') . '/' . $jenis->icon);
        }

        $this->JenisModel->DeleteData($id_jenis);
        return redirect()->route('jenis')->with('pesan', 'Data Berhasil Di Delete.!!!');
    }
}
