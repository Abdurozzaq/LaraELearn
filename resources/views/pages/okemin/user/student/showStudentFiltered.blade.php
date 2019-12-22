@extends('layouts.dash')

@section('title', 'List User Student')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Dari User Student</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active">List User Student</li>
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
                    <h3 class="card-title">Table Daftar User Teacher</h3>
                    <div class="card-tools">
                        <form action="/Okemin/User/Teacher/List/Search" method="get">
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
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Username</th>
                        <th>E-Mail</th>
                        <th>No.Telp</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($search as $s )
                        <tr>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->nisn }}</td>
                            <td>{{ $s->username }}</td>
                            <td>{{ $s->email }}</td>
                            <td>{{ $s->no_telp }}</td>
                            <td>
                                <a type="button" class="btn btn-block bg-gradient-primary btn-xs" href="/Okemin/User/Student/Profile/{{ $s->id }}">Edit Profile</a>
                                <a type="button" class="btn btn-block bg-gradient-danger btn-xs" href="/Okemin/User/Student/Delete/{{ $s->id }}">Delete</a>
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
