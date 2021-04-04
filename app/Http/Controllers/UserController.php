<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role != 'SuperAdmin') {
                return redirect('/home');
            }
            return $next($request);
        });
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->UserModel->AllData(),
        ];
        return view('admin.user.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add User',
        ];
        return view('admin.user.v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'name'   => 'required',
            'email'   => 'required|unique:users,email',
            'role'   => 'required',
            'foto'      => 'required|max:1024',
            'password'      => 'required|min:8',
        ], [
            'name.required' => 'Wajib Diisi !!!',
            'email.required' => 'Wajib Diisi !!!',
            'email.unique' => 'Email Ini Sudah Terdaftar, Masukkan Email Lain !!!',
            'role.required' => 'Wajib Diisi!!!',
            'foto.required' => 'Wajib Diisi !!!',
            'password.required' => 'Wajib Diisi !!!',
            'password.min' => 'Password Minimal 8 Karakter!!!',
        ]);

        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);

        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'role' => Request()->role,
            'password' => Hash::make(Request()->password),
            'foto' => $filename,
        ];
        $this->UserModel->InsertData($data);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Di Simpan.!!!');
    }
    
    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user'  => $this->UserModel->DetailData($id),
        ];
        return view('admin.user.v_edit', $data);
    }
    
    public function update($id)
    {
        Request()->validate([
            'name'   => 'required',
            'email'   => 'required',
            'role'   => 'required',
            'password'      => 'required|min:8',
        ], [
            'name.required' => 'Wajib Diisi !!!',
            'email.required' => 'Wajib Diisi !!!',
            'role.required' => 'Wajib Diisi !!!',
            'password.required' => 'Wajib Diisi !!!',
            'password.min' => 'Password Minimal 8 Karakter!!!',
            ]);
            
        if (Request()->foto <> "") {
            //hapus icon lama
            $user = $this->UserModel->DetailData($id);
            // if ($user->foto <> "") {
            //     unlink(public_path('foto') . '/' . $user->foto);
            // }
            //jika ingin ganti icon
            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);
            $data = [
                'name' => Request()->name,
                'role' => Request()->role,
                'foto' => $filename,
            ];
            $this->UserModel->UpdateData($id, $data);
        } else {
            //jika tidak ganti icon
            $data = [
                'name' => Request()->name,
                'role' => Request()->role,
            ];
            $this->UserModel->UpdateData($id, $data);
        }
        return redirect()->route('user')->with('pesan', 'Data Berhasil Di Update.!!!');
    }

    public function delete($id)
    {
        //hapus foto lama
        $user = $this->UserModel->DetailData($id);
        // if ($user->foto <> "") {
        //     unlink(public_path('foto') . '/' . $user->foto);
        // }

        $this->UserModel->DeleteData($id);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Di Delete.!!!');
    }
}
