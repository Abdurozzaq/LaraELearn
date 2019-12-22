@extends('layouts.dash')

@section('title', 'Create Materi')

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
                    <li class="breadcrumb-item active">Mata Materi</li>
                    <li class="breadcrumb-item active">Edit/Update Materi</li>
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
                    <h3 class="card-title">Edit/Update Materi</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                <p>Lihat di "Sidebar -> Materi -> List Materi"...</p>
                            </div>
                        @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                    <!-- Info Data Materi Lama sesuai id -->
                    <div class="callout callout-info">
                        <h6>Data lama untuk Materi ini :</h6>
                        <ul>
                            <li>Mata Pelajaran : {{ $materi->mapel }}</li>
                            <li>Kelas : {{ $materi->kelas }}</li>
                        </ul>
                    </div>


                <form role="form" action="/Teacher/Materi/Update/{{ $materi->id }}" method="post">
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
                        <label for="input2" class="col-sm-2 col-form-label">Judul Materi</label>
                        <div class="col-sm-10">
                          <input name="judul" type="text" class="form-control" id="input2" placeholder="Judul Materi" value="{{ $materi->judul }}">
                            @if($errors->has('judul'))
                                <div class="text-danger">
                                    {{ $errors->first('judul')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Isi Materi</label>
                        <div class="col-sm-10">
                            <textarea id="ckeditor" name="isi" class="textarea" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $materi->isi }}</textarea>
                              @if($errors->has('isi'))
                                <div class="text-danger">
                                    {{ $errors->first('isi')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Kesimpulan</label>
                        <div class="col-sm-10">
                          <input name="kesimpulan" type="text" class="form-control" id="input2" placeholder="Kesimpulan" value="{{ $materi->kesimpulan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                          <input name="keterangan" type="text" class="form-control" id="input2" placeholder="Keterangan" value="{{ $materi->keterangan }}">
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
    <script>
        var CSRFToken = $('meta[name="csrf-token"]').attr('content');
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+CSRFToken,
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+CSRFToken
        };
    </script>
    <script>
        CKEDITOR.replace('ckeditor', options);
    </script>

@endsection
