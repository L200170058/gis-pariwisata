<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemetaanModel;

class PemetaanController extends Controller
{
    public function __construct()
    {
        $this->PemetaanModel = new PemetaanModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Pemetaan',
            'kecamatan' => $this->PemetaanModel->DataKecamatan(),
        ];
        return view('admin.pemetaan.v_index', $data);
    }
}
