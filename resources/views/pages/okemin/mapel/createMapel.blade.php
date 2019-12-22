@extends('layouts.dash')

@section('title', 'Create Mata Pelajaran')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelas</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Mata Pelajaran</li>
                    <li class="breadcrumb-item active">Create Mata Pelajaran</li>
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
                    <h3 class="card-title">Create Mata Pelajaran</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                <p>Lihat di "Sidebar->Mapel->List Mapel"...</p>
                            </div>
                        @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                <form role="form" action="/Okemin/Mapel/Create/Send" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
                        <div class="col-sm-10">
                          <input name="nama_mapel" type="name" class="form-control" id="input1" placeholder="Nama Mata Pelajaran">
                            @if($errors->has('nama_mapel'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_mapel')}}
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
