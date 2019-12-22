@extends('layouts.dash')

@section('title', 'Lihat Materi' )

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $singleMateri->judul }}</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Materi</li>
                    <li class="breadcrumb-item">Pilih Mapel</li>
                    <li class="breadcrumb-item">Pilih Materi</li>
                    <li class="breadcrumb-item">Lihat Materi</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $singleMateri->judul }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! $singleMateri->isi !!}

                        <h2>Kesimpulan :</h2>
                        <p>{{ $singleMateri->kesimpulan }}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-md-4">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Description</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h4><strong>Info :</strong></h4>
                            <p><strong>Mata Pelajaran :</strong>  {{ $singleMateri->mapel }}</p>
                            <p><strong>Untuk Kelas :</strong>  {{ $singleMateri->kelas }}</p>
                            <br>
                            <h4><strong>Keterangan :</strong></h4>
                            <p>{{ $singleMateri->keterangan }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Export To PDF</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="/Student/Materi/singleMateri/exportPdf/{{ $singleMateri->id }}" class="btn btn-block btn-outline-success" target="_blank">Export PDF</a>
                            <p>Catatan: Gambar tidak termasuk di file PDF...</P>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

        </div>

    </section>
    <!-- /.content -->
@endsection
