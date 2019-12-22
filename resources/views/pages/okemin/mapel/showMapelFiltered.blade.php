@extends('layouts.dash')

@section('title', 'List Mata Pelajaran')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Mata Pelajaran</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Mata Pelajaran</li>
                    <li class="breadcrumb-item active">List Mata Pelajaran</li>
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
                    <h3 class="card-title">Table Daftar Mata Pelajaran</h3>
                    <div class="card-tools">
                        <form action="/Okemin/Mapel/List/Search/" method="get">
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
                        <th>Nama Mata Pelajaran</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($search as $s )
                        <tr>
                            <td>{{ $s->nama_mapel }}</td>
                            <td>
                                <a type="button" class="btn btn-block bg-gradient-primary btn-xs" href="/Okemin/Mapel/Edit/{{ $s->id }}">Edit</a>
                                <a type="button" class="btn btn-block bg-gradient-danger btn-xs" href="/Okemin/Mapel/Delete/{{ $s->id }}">Delete</a>
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
