@extends('layouts.dash')

@section('title', 'Student Home')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student's Home</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="#">Home</a></li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('dash/dist/img/welcome-student.png') }}" class="mx-auto d-block" alt="Welcome Admin" width="45%">
                <br>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
