@extends('layouts.dash')

@section('title', 'Change Photo Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile Picture</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</a></li>
                    <li class="breadcrumb-item">Profile</a></li>
                    <li class="breadcrumb-item active">Profile Picture</li>
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
                    <h3 class="card-title">Change Photo Profile</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                        <div class="row">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                    <p>Please, Clear "Cache" if picture not appear... </p>
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- End of Success And Fail/Error Alert -->
                    <div class="widget-user-image">
                        @if($teacher->avatar)
                            <img class="img-circle mx-auto d-block" width="200px"  src="/storage/avatars/{{ $teacher->avatar }}" alt="User Avatar">
                        @else
                            <img class="img-circle mx-auto d-block" width="200px"  src="{{ asset('/storage/avatars/defaultAvatar.png') }}" alt="User Avatar">
                        @endif
                    </div>

                <form role="form" action="/Okemin/User/Teacher/Profile/Picture/Send/{{ $teacher->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>{{$teacher->name}}'s Photo</label>
                        <br>
                        <input name="avatar" type="file" id="exampleInputFile">
                    </div>
                    <div class="callout callout-warning">
                        <p>Please upload a valid image file. Size of image should not be more than 2MB.</p>
                    </div>
                    <div class="callout callout-info">
                        <p>Photo in preview is your old Profile Photo, just info.</p>
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
