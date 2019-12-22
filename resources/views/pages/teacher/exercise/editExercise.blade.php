@extends('layouts.dash')

@section('title', 'Edit Exercise')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Exercise</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Exercise</li>
                    <li class="breadcrumb-item active">Edit Exercise</li>
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
                    <h3 class="card-title">Edit Exercise</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                <p>Lihat di "Sidebar->Exercise->List Exercise"...</p>
                            </div>
                        @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                    <!-- Info Data Materi Lama sesuai id -->
                    <div class="callout callout-info">
                        <h6>Data lama untuk Materi ini :</h6>
                        <ul>
                            <li>Mata Pelajaran : {{ $exercise->mapel }}</li>
                            <li>Kelas : {{ $exercise->kelas }}</li>
                        </ul>
                    </div>

                <form role="form" action="/Teacher/Exercise/Update/{{ $exercise->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <select name="mapel" class="form-control">
                                @foreach($mapel as $m)
                                    <option value="{{ $m->nama_mapel }}">{{ $m->nama_mapel }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mapel'))
                                <div class="text-danger">
                                    {{ $errors->first('mapel')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                            <select name="kelas[]" multiple class="form-control">
                                @foreach($kelas as $k)
                                    <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kelas'))
                                <div class="text-danger">
                                    {{ $errors->first('kelas')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Nama Exercise</label>
                        <div class="col-sm-10">
                          <input name="nama_exercise" value="{{ $exercise->nama_exercise}}" type="text" class="form-control" id="input2" placeholder="Nama Exercise">
                            @if($errors->has('nama_exercise'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_exercise')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Deskripsi Exercise</label>
                        <div class="col-sm-10">
                            <input name="deskripsi" value="{{ $exercise->deskripsi }}" type="text" class="form-control" id="input2" placeholder="Deskripsi Exercise">
                            @if($errors->has('deskripsi'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi')}}
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
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->

@endsection
