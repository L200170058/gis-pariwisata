<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WisataModel;
use App\Models\FotoWisataModel;
use App\Models\JenisModel;
use App\Models\KecamatanModel;
use Dompdf\Dompdf;
use App\Exports\WisataExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class WisataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->WisataModel = new WisataModel();
        $this->JenisModel = new JenisModel();
        $this->KecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Wisata',
            'wisata' => $this->WisataModel->AllData(),
        ];
        return view('admin.wisata.v_index', $data);
    }

    public function export()
    {
        $data = [
            'title' => 'export',
            'wisata' => $this->WisataModel->AllData(),
        ];
        return view('admin.wisata.v_export', $data);
    }

    public function add()
    {
        $data = [
            'title' => ' Tambah Data Wisata',
            'jenis' => $this->JenisModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];
        return view('admin.wisata.v_add', $data);
    }

    public function insert()
    {
        Request()->validate(
            [
                'nama_wisata' => 'required',
                'id_jenis' => 'required',
                'id_kecamatan' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'foto' => 'required|max:1024',
                'deskripsi' => 'required',

            ],
            [
                'nama_wisata.required' => 'Wajib diisi!',
                'id_jenis.required' => 'Wajib diisi!',
                'id_kecamatan.required' => 'Wajib diisi!',
                'alamat.required' => 'Wajib diisi!',
                'posisi.required' => 'Wajib diisi!',
                'foto.required' => 'Wajib diisi!',
                'foto.max' => 'Foto Max 1024 KB!',
                'deskripsi.required' => 'Wajib diisi!',
            ]
        );
        //jika validasi tidak ada makalakukan simpan datakedata base
        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);
        $data = [
            'nama_wisata' => request()->nama_wisata,
            'id_jenis' => request()->id_jenis,
            'id_kecamatan' => request()->id_kecamatan,
            'alamat' => request()->alamat,
            'posisi' => request()->posisi,
            'foto' => $filename,
            'deskripsi' => request()->deskripsi,
        ];
        $this->WisataModel->InsertData($data);
        return redirect()->route('wisata')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function ft(Request $request, $id_wisata)
    {
        if (request()->method() == 'GET'){

            $wisata = WisataModel::with(['foto_wisata'])->where('id_wisata',$id_wisata)->first();
            $data = [
                'title' => 'Tambah foto',
                'wisata' => $wisata
            ];
            return view('admin.wisata.v_foto', $data);

        } else {

            foreach ($request->foto as $foto) {

                $filename = $foto->getClientOriginalName();
                $foto->move(public_path('foto'), $filename);

                FotoWisataModel::create([
                    'nama' => $filename,
                    'id_wisata' => $id_wisata
                ]);
            }

            return redirect()->back();

        }
    }

    public function ftDelete($id)
    {
        $delete = FotoWisataModel::find($id)->delete();
        if ($delete) {
            return redirect()->back();
        }
        return "Terjadi kesalahan";
    }

    public function edit($id_wisata)
    {
        $data = [
            'title' => ' Edit Data Wisata',
            'jenis' => $this->JenisModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
            'wisata' => $this->WisataModel->DetailData($id_wisata),
        ];
        return view('admin.wisata.v_edit', $data);
    }

    public function update($id_wisata)
    {
        Request()->validate(
            [
                'nama_wisata' => 'required',
                'id_jenis' => 'required',
                'id_kecamatan' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'foto' => 'max:1024',
                'deskripsi' => 'required',

            ],
            [
                'nama_wisata.required' => 'Wajib diisi!',
                'id_jenis.required' => 'Wajib diisi!',
                'id_kecamatan.required' => 'Wajib diisi!',
                'alamat.required' => 'Wajib diisi!',
                'posisi.required' => 'Wajib diisi!',

                'foto.max' => 'Foto Max 1024 KB!',
                'deskripsi.required' => 'Wajib diisi!',
            ]
        );
        //jika validasi tidak ada makalakukan simpan datakedata base
        if (Request()->foto <> "") {
            //hapus foto lama
            $wisata = $this->WisataModel->DetailData($id_wisata);

            //jika ingin ganti foto
            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);

            $data = [
                'nama_wisata' => request()->nama_wisata,
                'id_jenis' => request()->id_jenis,
                'id_kecamatan' => request()->id_kecamatan,
                'alamat' => request()->alamat,
                'posisi' => request()->posisi,
                'foto' => $filename,
                'deskripsi' => request()->deskripsi,
            ];
            $this->WisataModel->UpdateData($id_wisata, $data);
        } else {
            //jika tidak ganti foto
            $data = [
                'nama_wisata' => request()->nama_wisata,
                'id_jenis' => request()->id_jenis,
                'id_kecamatan' => request()->id_kecamatan,
                'alamat' => request()->alamat,
                'posisi' => request()->posisi,

                'deskripsi' => request()->deskripsi,
            ];
            $this->WisataModel->UpdateData($id_wisata, $data);
        }
        return redirect()->route('wisata')->with('pesan', 'Data Berhasil Di Update.!!!');
    }

    public function delete($id_wisata)
    {
        //hapus foto lama
        $wisata = $this->WisataModel->DetailData($id_wisata);


        $this->WisataModel->DeleteData($id_wisata);
        return redirect()->route('wisata')->with('pesan', 'Data Berhasil Di Delete.!!!');
    }

    public function print()
    {
        $data = [
            'title' => 'print',
            'wisata' => $this->WisataModel->AllData(),
        ];
        return view('admin.wisata.v_print', $data);
    }

    public function pdf()
    {
        $data = [
            'title' => 'Pdf',
            'wisata' => $this->WisataModel->AllData(),
        ];
        $html = view('admin.wisata.v_pdf', $data);
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
