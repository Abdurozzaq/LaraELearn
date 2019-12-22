@extends('layouts.dash')

@section('title', 'List Kelas')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Kelas</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Kelas</li>
                    <li class="breadcrumb-item active">List Kelas</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table Daftar Kelas</h3>
                    <div class="card-tools">
                        <form action="/Okemin/Kelas/List/Search/" method="get">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button name="submit" type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                        <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: auto;">
                  <table class="table table-head-fixed">
                    <thead>
                      <tr>
                        <th>Nama Kelas</th>
                        <th>Deskripsi Kelas</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($kelas as $k )
                        <tr>
                            <td>{{ $k->nama_kelas }}</td>
                            <td>{{ $k->deskripsi }}</td>
                            <td>
                                <a type="button" class="btn btn-block bg-gradient-primary btn-xs" href="/Okemin/Kelas/Edit/{{ $k->id }}">Edit</a>
                                <a type="button" class="btn btn-block bg-gradient-danger btn-xs" href="/Okemin/Kelas/Delete/{{ $k->id }}">Delete</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
