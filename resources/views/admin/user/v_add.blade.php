@extends('layouts.backend')

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        <h3 class="card-title">Add Data</h3>
        </div>
        <form action="/user/insert" method="POST" enctype="multipart/form-data">
            @csrf  
        <div class="card-body">                        
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama User">
                            <div class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input name="email" class="form-control" value="{{ old('email') }}" placeholder="E-Mail">
                            <div class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Level</label>
                            <select name="role" class="form-control">
                                <option value="">--Pilih Jenis Role--</option>
                                <option value="SuperAdmin">SuperAdmin</option>
                                <option value="Admin">Admin</option>
                              </select>
                            <div class="text-danger">
                                @error('role')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
                            <div class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Foto User</label>                            
                                <input type="file" name="foto" class="form-control" accept="image/png,image/jpg,image/jpeg">
                            <div class="text-danger">
                                @error('foto')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                </div>        
           
        </div>        
    
    <div class="card-footer">
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
        <a href="/user" class="btn btn-warning float-right">Cancel</a>
    </div>
</form>
</div>
</div>


@endsection


