@extends('layouts.dash')

@section('title', 'List Exercise')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Materi</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Exercise</li>
                    <li class="breadcrumb-item">List Exercise</li>
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
                    <h3 class="card-title">Table Daftar Exercise</h3>
                    <div class="card-tools">
                        <form action="/Teacher/Exercise/List/Search/" method="get">
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
                        <th>Mapel</th>
                        <th>Kelas</th>
                        <th>Nama Exercise</th>
                        <th>Deskripsi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($search as $s )
                            <tr>
                                <td>{{ $s->mapel }}</td>
                                <td>{{ $s->kelas }}</td>
                                <td>{{ $s->nama_exercise }}</td>
                                <td>{{ $s->deskripsi }}</td>
                                <td>
                                    <a class="btn btn-app" href="/Teacher/Exercise/Question">
                                        <i class="fas fa-edit"></i>
                                         Edit Soals
                                    </a>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-block bg-primary btn-xs" href="/Teacher/Exercise/Edit/{{ $s->id }}">Edit</a>
                                    <a type="button" class="btn btn-block bg-danger btn-xs" href="/Teacher/Exercise/Delete/{{ $s->id }}">Delete</a>
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
