@extends('layouts.dash')

@section('title', 'Admin - Teacher Profile Page Manager')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teacher Profile Page Manager</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Teacher</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                            @if($teacher->photo)
                                <img class="profile-user-img img-fluid img-circle" src="/storage/avatars/{{ $teacher->avatar }}" alt="User profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('/storage/avatars/defaultAvatar.png') }}" alt="User profile picture">
                            @endif
                        </div>

                      <h3 class="profile-username text-center">{{ $teacher->name }}</h3>

                      <p class="text-muted text-center">{{ $teacher->jabatan }}</p>

                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>NIP</b> <a class="float-right">{{ $teacher->nip }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Kelas</b> <a class="float-right">{{ $teacher->kelas }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Jabatan</b> <a class="float-right">{{ $teacher->jabatan }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>User Role</b> <a class="float-right">
                                @if($teacher->hasRole('Admin'))
                                    Admin
                                @elseif($teacher->hasRole('Teacher'))
                                    Teacher
                                @else
                                    Student
                                @endif
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Ganti Photo Profile User Ini?</b> <a href="/Okemin/User/Teacher/Profile/Picture/{{ $teacher->id }}">Klik ini!</a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.col -->
                <!-- Profile Details -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile Details</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
                        </ul>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                        <div class="tab-content">
                            <!-- Profile Details -->
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>INFO PRIBADI</h5>
                                            <h6>Name :</h6>
                                            @if($teacher->name)
                                                <p>{{ $teacher->name }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Tempat Lahir :</h6>
                                            @if($teacher->tempat_lahir)
                                                <p>{{ $teacher->tempat_lahir }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Tanggal Lahir :</h6>
                                            @if($teacher->tgl_lahir)
                                                <p>{{ $teacher->tgl_lahir }}/{{ $teacher->bulan_lahir }}/{{ $teacher->tahun_lahir }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Jenis Kelamin :</h6>
                                            @if($teacher->jenis_kelamin)
                                                <p>{{ $teacher->jenis_kelamin }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Agama :</h6>
                                            @if($teacher->agama)
                                                <p>{{ $teacher->agama }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <h5>INFO AKADEMIK</h5>
                                            <h6>NIP :</h6>
                                            @if($teacher->nip)
                                                <p>{{ $teacher->nip }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Jabatan :</h6>
                                            @if($teacher->jabatan)
                                                <p>{{ $teacher->jabatan }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Garis Pembatas -->
                                    <hr>
                                    <!-- End of Garis Pembatas -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>INFO AKUN</h5>
                                            <h6>Username :</h6>
                                            @if($teacher->username)
                                                <p>{{ $teacher->username }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>E-mail :</h6>
                                            @if($teacher->email)
                                                <p>{{ $teacher->email }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>No. Telp :</h6>
                                            @if($teacher->no_telp)
                                                <p>{{ $teacher->no_telp }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.post -->
                            </div>
                            <!-- /.tab-content -->

                            <!-- Profile Setting Part -->
                            <div class="tab-pane" id="settings">
                                <!-- Success And Fail/Error Alert -->
                                <div class="row">
                                    @if (session('message.profile'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ session('message.profile') }}</strong>
                                            <p>You can see it in the Profile Details</p>
                                        </div>
                                    @endif
                                </div>
                                <!-- End of Success And Fail/Error Alert -->
                                <form class="form-horizontal" method="post" action="/Okemin/User/Teacher/Profile/Send/{{ $teacher->id }}">
                                    @csrf
                                    {{ method_field('PUT') }}

                                    <h5>INFO PRIBADI</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama*</label>
                                        <div class="col-sm-10">
                                            <input  name="name" type="name" class="form-control" placeholder="Name" value="{{ $teacher->name }}">
                                            @if($errors->has('name'))
                                                <div class="text-danger">
                                                    {{ $errors->first('name')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <input name="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" value="{{ $teacher->tempat_lahir }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Lahir*</label>
                                        <div class="col-sm-10">
                                            <input  name="tgl_lahir" type="text" class="form-control" placeholder="Tanggal Lahir, misal: 05" value="{{ $teacher->tgl_lahir }}">
                                            @if($errors->has('tgl_lahir'))
                                                <div class="text-danger">
                                                    {{ $errors->first('tgl_lahir')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bulan Lahir*</label>
                                        <div class="col-sm-10">
                                            <input  name="bulan_lahir" type="text" class="form-control" placeholder="Bulan Lahir, misal: 12" value="{{ $teacher->bulan_lahir }}">
                                            @if($errors->has('bulan_lahir'))
                                                <div class="text-danger">
                                                    {{ $errors->first('bulan_lahir')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tahun Lahir*</label>
                                        <div class="col-sm-10">
                                            <input  name="tahun_lahir" type="text" class="form-control" placeholder="Tahun Lahir, misal: 2003" value="{{ $teacher->tahun_lahir }}">
                                            @if($errors->has('tahun_lahir'))
                                                <div class="text-danger">
                                                    {{ $errors->first('tahun_lahir')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <input name="jenis_kelamin" type="text" class="form-control" placeholder="Jenis Kelamin" value="{{ $teacher->jenis_kelamin }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-10">
                                            <input name="agama" type="text" class="form-control" placeholder="Agama" value="{{ $teacher->agama }}">
                                        </div>
                                    </div>

                                    <!-- Garis Pembatas -->
                                    <hr>
                                    <!-- End of Garis Pembatas -->

                                    <h5>INFO AKADEMIK</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIP*</label>
                                        <div class="col-sm-10">
                                            <input  name="nip" type="text" class="form-control" placeholder="Nomor NIP" value="{{ $teacher->nip }}">
                                            @if($errors->has('nip'))
                                                <div class="text-danger">
                                                    {{ $errors->first('nip')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input name="jabatan" type="text" class="form-control" placeholder="Jabatan, misal: Komandan Kompi RPL" value="{{ $teacher->jabatan }}">
                                        </div>
                                    </div>

                                    <!-- Garis Pembatas -->
                                    <hr>
                                    <!-- End of Garis Pembatas -->

                                    <h5>INFO AKUN</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Username*</label>
                                        <div class="col-sm-10">
                                            <input  name="username" type="text" class="form-control" placeholder="Username" value="{{ $teacher->username }}">
                                            @if($errors->has('username'))
                                                <div class="text-danger">
                                                    {{ $errors->first('username')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">E-mail*</label>
                                        <div class="col-sm-10">
                                            <input  name="email" type="email" class="form-control" placeholder="E-mail" value="{{ $teacher->email }}">
                                            @if($errors->has('email'))
                                                <div class="text-danger">
                                                    {{ $errors->first('email')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No. Telp*</label>
                                        <div class="col-sm-10">
                                            <input  name="no_telp" type="text" class="form-control" placeholder="No. Telp" value="{{ $teacher->no_telp }}">
                                            @if($errors->has('no_telp'))
                                                <div class="text-danger">
                                                    {{ $errors->first('no_telp')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-content -->

                            <!-- Change Password Part -->
                            <div class="tab-pane" id="password">
                                <!-- Success And Fail/Error Alert -->
                                <div class="row">
                                    @if (session('message.password'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ session('message.password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <!-- End of Success And Fail/Error Alert -->
                                <form class="form-horizontal" method="post" action="/Okemin/User/Teacher/Profile/changePassword/{{ $teacher->id }}">
                                    @csrf
                                    {{ method_field('POST') }}
                                    <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input name="new_password" type="password" class="form-control" id="inputName" placeholder="Your New Password">
                                                @if($errors->has('new_password'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('new_password')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Confirm New Password</label>
                                        <div class="col-sm-10">
                                            <input name="confirm_new_password" type="password" class="form-control" id="inputEmail" placeholder="Enter Your New Password, Again.">
                                            @if($errors->has('confirm_new_password'))
                                                <div class="text-danger">
                                                    {{ $errors->first('confirm_new_password')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button name="submit" type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
              <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
