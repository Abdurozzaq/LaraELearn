@extends('layouts.dash')

@section('title', 'Edit Soal')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Soal</h1>
                    </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Exercise</li>
                    <li class="breadcrumb-item active">Edit Soal</li>
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
                    <h3 class="card-title">Create Soal</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                     <!-- Success And Fail/Error Alert -->
                     <div class="row">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                                <p>Lihat tabel diatas Halaman...</p>
                            </div>
                        @endif
                    </div>
                    <!-- End of Success And Fail/Error Alert -->

                <form id="dynamicForm" role="form" action="/Teacher/Exercise/Question/Create/Send" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="grubsoal">
                        <div id="soalsatuan">
                            <div class="form-group row">
                                <label for="input1" class="col-sm-2 col-form-label">Untuk Exercise :</label>
                                <div class="col-sm-10">
                                    <select name="exercise[]" class="form-control">
                                        @foreach($exercise as $e)
                                            <option value="{{ $e->nama_exercise }}">{{ $e->nama_exercise }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('exercise'))
                                        <div class="text-danger">
                                            {{ $errors->first('exercise')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input2" class="col-sm-2 col-form-label">Pertanyaan</label>
                                <div class="col-sm-10">
                                    <textarea id="ckeditor" name="question[]" class="textarea" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    @if($errors->has('question'))
                                        <div class="text-danger">
                                            {{ $errors->first('question')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input2" class="col-sm-2 col-form-label">Option 1</label>
                                <div class="col-sm-10">
                                <input name="opt1[]" type="text" class="form-control" id="input2" placeholder="Nama Exercise">
                                    @if($errors->has('opt1'))
                                        <div class="text-danger">
                                            {{ $errors->first('opt1')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input2" class="col-sm-2 col-form-label">Option 2</label>
                                <div class="col-sm-10">
                                    <input name="opt2[]" type="text" class="form-control" id="input2" placeholder="Deskripsi Exercise">
                                    @if($errors->has('opt2'))
                                        <div class="text-danger">
                                            {{ $errors->first('opt2')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input2" class="col-sm-2 col-form-label">Option 3</label>
                                <div class="col-sm-10">
                                    <input name="opt3[]" type="text" class="form-control" id="input2" placeholder="Deskripsi Exercise">
                                    @if($errors->has('opt3'))
                                        <div class="text-danger">
                                            {{ $errors->first('opt3')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input2" class="col-sm-2 col-form-label">Option 4</label>
                                <div class="col-sm-10">
                                    <input name="opt4[]" type="text" class="form-control" id="input2" placeholder="Deskripsi Exercise">
                                    @if($errors->has('opt4'))
                                        <div class="text-danger">
                                            {{ $errors->first('opt4')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <hr>
                        </div>
                    </div>
                    <button name="addMoreSoal" id="addMoreSoal" type="button" class="btn btn-block bg-gradient-success addMoreSoal">Add More Soal</button>
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
        $(document).ready(function() {
        var max_fields = 20; //maximum input boxes allowed
        var wrapper = $(".grubsoal"); //Fields wrapper
        var add_button = $(".addMoreSoal"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div id="soalsatuan"><div class="form-group row"><label for="input1" class="col-sm-2 col-form-label">Untuk Exercise :</label><div class="col-sm-10"><select name="exercise[]" class="form-control">@foreach($exercise as $e)<option value="{{ $e->nama_exercise }}">{{ $e->nama_exercise }}</option>@endforeach</select>@if($errors->has('exercise'))<div class="text-danger">{{ $errors->first('exercise')}}</div>@endif</div></div><div class="form-group row"><label for="input2" class="col-sm-2 col-form-label">Pertanyaan</label><div class="col-sm-10"><textarea id="ckeditor" name="question[]" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>@if($errors->has('question'))<div class="text-danger">{{ $errors->first('question')}}</div>@endif</div></div><div class="form-group row"><label for="input2" class="col-sm-2 col-form-label">Option 1</label><div class="col-sm-10"><input name="opt1[]" type="text" class="form-control" id="input2" placeholder="Nama Exercise">@if($errors->has('opt1'))<div class="text-danger">{{ $errors->first('opt1')}}</div>@endif</div></div><div class="form-group row"><label for="input2" class="col-sm-2 col-form-label">Option 2</label><div class="col-sm-10"><input name="opt2[]" type="text" class="form-control" id="input2" placeholder="Deskripsi Exercise">@if($errors->has('opt2'))<div class="text-danger">{{ $errors->first('opt2')}}</div>@endif</div></div><div class="form-group row"><label for="input2" class="col-sm-2 col-form-label">Option 3</label><div class="col-sm-10"><input name="opt3[]" type="text" class="form-control" id="input2" placeholder="Deskripsi Exercise">@if($errors->has('opt3'))<div class="text-danger">{{ $errors->first('opt3')}}</div>@endif</div></div><div class="form-group row"><label for="input2" class="col-sm-2 col-form-label">Option 4</label><div class="col-sm-10"><input name="opt4[]" type="text" class="form-control" id="input2" placeholder="Deskripsi Exercise">@if($errors->has('opt4'))<div class="text-danger">{{ $errors->first('opt4')}}</div>@endif</div></div><hr><hr></div><button name="removeSoal" type="button" class="btn btn-block bg-gradient-danger removeSoal">Hapus Soal Ini</button><hr><hr></div>'); //add input box
        }
        });
        $(wrapper).on("click",".removeSoal", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent(".soalsatuan").remove(); x--;
        })
        });
    </script>
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

