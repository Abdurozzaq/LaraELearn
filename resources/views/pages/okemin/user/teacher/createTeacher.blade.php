@extends('layouts.dash')

@section('title', 'Create Teacher')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Teacher</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Teacher</li>
                    <li class="breadcrumb-item active">Create Teacher</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Teacher</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                    <p>Lihat di Sidebar->User Manager->Teacher Manager</p>
                                </div>
                            @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                <form role="form" action="/Okemin/User/Teacher/Create/Send" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5>DATA PRIBADI</h5>
                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 col-form-label">Nama*</label>
                        <div class="col-sm-10">
                          <input name="name" type="name" class="form-control" id="input1" placeholder="Nama Guru">
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                          <input name="tempat_lahir" type="text" class="form-control" id="input2" placeholder="Tempat Lahir">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input3" class="col-sm-2 col-form-label">Tanggal Lahir*</label>
                        <div class="col-sm-10">
                          <input name="tgl_lahir" type="text" class="form-control" id="input3" placeholder="Tanggal lahir, Misal: 26">
                            @if($errors->has('tgl_lahir'))
                                <div class="text-danger">
                                    {{ $errors->first('tgl_lahir')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input4" class="col-sm-2 col-form-label">Bulan Lahir*</label>
                        <div class="col-sm-10">
                          <input name="bulan_lahir" type="text" class="form-control" id="input4" placeholder="Bulan Lahir, Misal: 02">
                            @if($errors->has('bulan_lahir'))
                                <div class="text-danger">
                                    {{ $errors->first('bulan_lahir')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input5" class="col-sm-2 col-form-label">Tahun Lahir*</label>
                        <div class="col-sm-10">
                          <input name="tahun_lahir" type="text" class="form-control" id="input5" placeholder="Tahun lahir, Misal: 1998">
                            @if($errors->has('tahun_lahir'))
                                <div class="text-danger">
                                    {{ $errors->first('tahun_lahir')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input6" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <input name="jenis_kelamin" type="text" class="form-control" id="input6" placeholder="Jenis Kelamin">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input7" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                          <input name="agama" type="text" class="form-control" id="input7" placeholder="Agama">
                        </div>
                    </div>

                    <hr>

                    <h5>DATA AKADEMIK</h5>
                    <div class="form-group row">
                        <label for="input8" class="col-sm-2 col-form-label">NIP*</label>
                        <div class="col-sm-10">
                          <input name="nip" type="text" class="form-control" id="input8" placeholder="Nomor NIP">
                            @if($errors->has('nip'))
                                <div class="text-danger">
                                    {{ $errors->first('nip')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input9" class="col-sm-2 col-form-label">Jabatan*</label>
                        <div class="col-sm-10">
                          <input name="jabatan" type="text" class="form-control" id="input9" placeholder="Jabatan">
                        </div>
                    </div>

                    <hr>

                    <h5>DATA AKUN</h5>
                    <div class="form-group row">
                        <label for="input10" class="col-sm-2 col-form-label">Username*</label>
                        <div class="col-sm-10">
                          <input name="username" type="text" class="form-control" id="input10" placeholder="Username">
                            @if($errors->has('username'))
                                <div class="text-danger">
                                    {{ $errors->first('username')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input11" class="col-sm-2 col-form-label">E-mail*</label>
                        <div class="col-sm-10">
                          <input name="email" type="email" class="form-control" id="input11" placeholder="E-mail">
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input12" class="col-sm-2 col-form-label">No.Telp*</label>
                        <div class="col-sm-10">
                          <input name="no_telp" type="text" class="form-control" id="input12" placeholder="Nomor Telepon/HP">
                            @if($errors->has('no_telp'))
                                <div class="text-danger">
                                    {{ $errors->first('no_telp')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-block bg-gradient-primary">Upload</button>
                </form>

                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card -->
            <div class="d-none" id="card-refresh-content">
                The body of the card after card refresh
            </div>
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->
@endsection
