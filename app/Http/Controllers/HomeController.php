<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'wisata' => DB::table('tbl_wisata')->count(),
            'jenis' => DB::table('tbl_jenis')->count(),
            'kecamatan' => DB::table('tbl_kecamatan')->count(),
            'user' => DB::table('users')->count(),

        ];
        return view('v_home', $data); 
    }
}
