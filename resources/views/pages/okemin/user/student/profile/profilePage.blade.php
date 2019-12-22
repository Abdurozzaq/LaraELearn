@extends('layouts.dash')

@section('title', 'Admin - Student Profile Page Manager')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student Profile Page Manager</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item">Student</li>
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
                            @if($student->photo)
                                <img class="profile-user-img img-fluid img-circle" src="/storage/avatars/{{ $student->avatar }}" alt="User profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('/storage/avatars/defaultAvatar.png') }}" alt="User profile picture">
                            @endif
                        </div>

                      <h3 class="profile-username text-center">{{ $student->name }}</h3>

                      <p class="text-muted text-center">{{ $student->jabatan }}</p>

                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>NISN</b> <a class="float-right">{{ $student->nisn }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Kelas</b> <a class="float-right">{{ $student->kelas }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Jabatan</b> <a class="float-right">{{ $student->jabatan }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>User Role</b> <a class="float-right">
                                @if($student->hasRole('Admin'))
                                    Admin
                                @elseif($student->hasRole('Teacher'))
                                    Teacher
                                @else
                                    Student
                                @endif
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Ganti Photo Profile User Ini?</b> <a href="/Okemin/User/Student/Profile/Picture/{{ $student->id }}">Klik ini!</a>
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
                                            @if($student->name)
                                                <p>{{ $student->name }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Tempat Lahir :</h6>
                                            @if($student->tempat_lahir)
                                                <p>{{ $student->tempat_lahir }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Tanggal Lahir :</h6>
                                            @if($student->tgl_lahir)
                                                <p>{{ $student->tgl_lahir }}/{{ $student->bulan_lahir }}/{{ $student->tahun_lahir }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Jenis Kelamin :</h6>
                                            @if($student->jenis_kelamin)
                                                <p>{{ $student->jenis_kelamin }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Agama :</h6>
                                            @if($student->agama)
                                                <p>{{ $student->agama }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <h5>INFO AKADEMIK</h5>
                                            <h6>NIP :</h6>
                                            @if($student->nisn)
                                                <p>{{ $student->nisn }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>Jabatan :</h6>
                                            @if($student->jabatan)
                                                <p>{{ $student->jabatan }}</p>
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
                                            @if($student->username)
                                                <p>{{ $student->username }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>E-mail :</h6>
                                            @if($student->email)
                                                <p>{{ $student->email }}</p>
                                            @else
                                                <p>Kosong...</p>
                                            @endif

                                            <h6>No. Telp :</h6>
                                            @if($student->no_telp)
                                                <p>{{ $student->no_telp }}</p>
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
                                <form class="form-horizontal" method="post" action="/Okemin/User/Student/Profile/Send/{{ $student->id }}">
                                    @csrf
                                    {{ method_field('PUT') }}

                                    <h5>INFO PRIBADI</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama*</label>
                                        <div class="col-sm-10">
                                            <input  name="name" type="name" class="form-control" placeholder="Name" value="{{ $student->name }}">
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
                                            <input name="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" value="{{ $student->tempat_lahir }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Lahir*</label>
                                        <div class="col-sm-10">
                                            <input  name="tgl_lahir" type="text" class="form-control" placeholder="Tanggal Lahir, misal: 05" value="{{ $student->tgl_lahir }}">
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
                                            <input  name="bulan_lahir" type="text" class="form-control" placeholder="Bulan Lahir, misal: 12" value="{{ $student->bulan_lahir }}">
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
                                            <input  name="tahun_lahir" type="text" class="form-control" placeholder="Tahun Lahir, misal: 2003" value="{{ $student->tahun_lahir }}">
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
                                            <input name="jenis_kelamin" type="text" class="form-control" placeholder="Jenis Kelamin" value="{{ $student->jenis_kelamin }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-10">
                                            <input name="agama" type="text" class="form-control" placeholder="Agama" value="{{ $student->agama }}">
                                        </div>
                                    </div>

                                    <!-- Garis Pembatas -->
                                    <hr>
                                    <!-- End of Garis Pembatas -->

                                    <h5>INFO AKADEMIK</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NISN*</label>
                                        <div class="col-sm-10">
                                            <input  name="nisn" type="text" class="form-control" placeholder="Nomor NISN" value="{{ $student->nisn }}">
                                            @if($errors->has('nisn'))
                                                <div class="text-danger">
                                                    {{ $errors->first('nisn')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="input8" class="col-sm-2 col-form-label">Kelas*</label>
                                        <div class="col-sm-10">
                                            <select name="kelas" class="form-control">
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
                                        <label class="col-sm-2 col-form-label">Tahun Masuk*</label>
                                        <div class="col-sm-10">
                                            <input  name="tahun_masuk" type="text" class="form-control" placeholder="Tahun Masuk" value="{{ $student->tahun_masuk }}">
                                            @if($errors->has('tahun_masuk'))
                                                <div class="text-danger">
                                                    {{ $errors->first('tahun_masuk')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input name="jabatan" type="text" class="form-control" placeholder="Jabatan, misal: Komandan Kompi RPL" value="{{ $student->jabatan }}">
                                        </div>
                                    </div>

                                    <!-- Garis Pembatas -->
                                    <hr>
                                    <!-- End of Garis Pembatas -->

                                    <h5>INFO AKUN</h5>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Username*</label>
                                        <div class="col-sm-10">
                                            <input  name="username" type="text" class="form-control" placeholder="Username" value="{{ $student->username }}">
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
                                            <input  name="email" type="email" class="form-control" placeholder="E-mail" value="{{ $student->email }}">
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
                                            <input  name="no_telp" type="text" class="form-control" placeholder="No. Telp" value="{{ $student->no_telp }}">
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
                                <form class="form-horizontal" method="post" action="/Okemin/User/Student/Profile/changePassword/{{ $student->id }}">
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
