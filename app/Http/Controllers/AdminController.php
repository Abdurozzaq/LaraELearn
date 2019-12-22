<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Kelas;
use App\mataPelajaran;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Role;

class AdminController extends Controller
{
    //Index method for Admin Controller
    public function index()
    {
        $user = Auth::user();
        return view('pages.okemin.home', compact('user', $user));
    }

    //Role Middleware For Admin
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

     /*
     * This is For Profile Picture
     *
     */
    public function profilePicture()
    {
        $user = Auth::user();
        return view('pages.okemin.profile.picture', compact('user', $user));
    }

    public function updateAvatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');
    }


    /*
     * This is For Profile
     *
     */
    public function showProfile()
    {
    	$user = Auth::user();
    	return view('pages.okemin.profile.profilePage', compact('user', $user));
    }

    public function editProfile($id, Request $request)
    {

            $this->validate($request,[
                'name' => 'required',
                'email' => 'email|required',
                'username' => 'required',
                'no_telp' => 'required',
            ]);

            $user = Auth::user();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->no_telp = $request->no_telp;
            $user->save();

            $request->session()->flash('message.profile', 'Profile Details was successfully updated!');

            return redirect()->back();


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditPassword($id, Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Password was successfully updated!');

        return redirect()->back();
    }

    /* -------------------------------- KELAS SECTION ------------------------------------- */
    /*
     * This is For Kelas
     *
     */
    public function showCreateKelas()
    {
        $user = Auth::user(); // Untuk Photo Profile
    	return view('pages.okemin.kelas.createKelas', compact('user', $user));
    }

    public function createKelas(Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            "deskripsi" => 'required',
        ]);

        Kelas::create([
    		'nama_kelas' => $request->nama_kelas,
    		'deskripsi' => $request->deskripsi
    	]);

        return back()->with('success','You have successfully upload the file.');
    }

    /*
     * This is For Show Mapel List
     *
     */
    public function showKelasList(Request $request)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $kelas = Kelas::get(); // Show, atau Get All "Materi"
        return view('pages.okemin.kelas.showKelas', compact('kelas', 'user') );
    }

    /*
     * This is For Show Search Mapel
     *
     */
    public function searchKelas(Request $request)
	{
        $user = Auth::user(); // Untuk Photo Profile

		// menangkap data pencarian
		$search = $request->table_search;

    		// mengambil data dari table materi sesuai pencarian data
        $search = Kelas::where('nama_kelas','like',"%".$search."%")
                            ->orWhere('deskripsi','like',"%".$search."%")
                            ->get();

    		// mengirim data materi ke view index
		return view('pages.okemin.kelas.showKelasFiltered', compact('search', 'user') );

    }

    /*
     * This is For Show Update Kelas
     *
     */
    public function editKelas($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $kelas = Kelas::findOrFail($id);
        return view('pages.okemin.kelas.editKelas', compact('user', 'kelas',));
    }

    /*
     * This is For Update Mapel
     *
     */
    public function updateKelas(Request $request, $id)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'deskripsi' => 'required'
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->deskripsi = $request->deskripsi;
        $kelas->save();

        return back()->with('success','Kelas Berhasil diUpdate/diEdit.');
    }

    /*
     * This is For Delete Kelas
     * SUCCESS alertnya blum ada
     */
    public function deleteKelas($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->back()->with('success', 'Kelas Berhasil diHapus.');
    }

    //
    /* ----------------------------------------- END OF KELAS SECTION ------------------------------ */
    //




















    /* ------------------------------------------ MAPEL SECTION ----------------------------------- */
    /*
     * This is For Mata Pelajaran
     *
     */
    public function showCreateMapel()
    {
        $user = Auth::user(); // Untuk Photo Profile
        return view('pages.okemin.mapel.createMapel', compact('user', $user));
    }

    public function createMapel(Request $request)
    {
        $this->validate($request,[
            'nama_mapel' => 'required',
        ]);

        mataPelajaran::create([
    		'nama_mapel' => $request->nama_mapel,
    	]);

        return back()->with('success','Your Input is successfully send!');
    }

    /*
     * This is For Show Mapel List
     *
     */
    public function showMapelList(Request $request)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $mapels = mataPelajaran::get(); // Show, atau Get All "Materi"
        return view('pages.okemin.mapel.showMapel', compact('mapels', 'user') );
    }

    /*
     * This is For Show Search Mapel
     *
     */
    public function searchMapel(Request $request)
	{
        $user = Auth::user(); // Untuk Photo Profile

		// menangkap data pencarian
		$search = $request->table_search;

    		// mengambil data dari table materi sesuai pencarian data
        $search = mataPelajaran::where('nama_mapel','like',"%".$search."%")
                            ->get();

    		// mengirim data materi ke view index
		return view('pages.okemin.mapel.showMapelFiltered', compact('search', 'user') );

    }

    /*
     * This is For Show Update Mapel
     *
     */
    public function editMapel($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $mapel = mataPelajaran::findOrFail($id);
        return view('pages.okemin.mapel.editMapel', compact('user', 'mapel',));
    }

    /*
     * This is For Update Mapel
     *
     */
    public function updateMapel(Request $request, $id)
    {
        $this->validate($request,[
            'nama_mapel' => 'required',
        ]);

        $mapel = mataPelajaran::findOrFail($id);
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->save();

        return back()->with('success','Mata Pelajaran Berhasil diUpdate/diEdit.');
    }

    /*
     * This is For Delete Mapel
     * SUCCESS alertnya blum ada
     */
    public function deleteMapel($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $mapel = mataPelajaran::findOrFail($id);
        $mapel->delete();
        return redirect()->back()->with('success', 'Mata Pelajaran Berhasil diHapus.');
    }
    //
    /* ----------------------------------- END OF MAPEL SECTION --------------------------------- */
    //












    /* ----------------------------------- USER MANAGER SECTION ----------------------------------- */
    /*
     * This is For Show User List
     * ALL USER except Admin
     * Tapi dibagi beberapa table sesuai Role
     *
     */
    /**
     * FOR TEACHER
     *
     */
    // List
    public function showTeacherList()
    {
        $user = Auth::user(); // Untuk Photo Profile

        $teachers = User::whereHas('roles', function($q){
            $q->where('name', 'Teacher');
        })->get();

        return view('pages.okemin.user.teacher.showTeacherList', compact('user', 'teachers',));
    }

    /*
     * This is For Show Search Teacher
     *
     */
    public function searchTeacher(Request $request)
	{
        $user = Auth::user(); // Untuk Photo Profile

		// menangkap data pencarian
		$search = $request->table_search;

    		// mengambil data dari table materi sesuai pencarian data
        $search = User::whereHas('roles', function($q){
            $q->where('name', 'Teacher');
        })->where('name','like',"%".$search."%")
        ->orWhere('nip','like',"%".$search."%")
        ->orWhere('username','like',"%".$search."%")
        ->get();


    		// mengirim data materi ke view index
		return view('pages.okemin.user.teacher.showTeacherFiltered', compact('search', 'user') );

    }

    /**
     * This is For Delete Teacher User
     *
     */
    public function deleteTeacher($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $teacher = User::findOrFail($id);
        $teacher->delete();
        return redirect()->back()->with('success', 'User Berhasil diHapus.');
    }




    // Profile
    /*
     * This is For Profile Picture
     *
     */
    public function profilePictureTeacher($id)
    {
        $user = Auth::user();
        $teacher = User::findOrFail($id);
        return view('pages.okemin.user.teacher.profile.picture', compact('user', 'teacher',));
    }

    public function updateAvatarTeacher($id, Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $teacher = User::findOrFail($id);

        $avatarName = $teacher->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $teacher->avatar = $avatarName;
        $teacher->save();

        return back()
            ->with('success','You have successfully upload image.');
    }


    /*
     * This is For Profile
     *
     */
    public function showProfileTeacher($id)
    {
        $user = Auth::user();
    	$teacher = User::findOrFail($id);
    	return view('pages.okemin.user.teacher.profile.profilePage', compact('user', 'teacher',));
    }

    public function editProfileTeacher($id, Request $request)
    {

            $this->validate($request,[
                'name' => 'required',
                'tgl_lahir' => 'required',
                'bulan_lahir' => 'required',
                'tahun_lahir' => 'required',
                'nip' => 'required',
                'username' => 'required',
                'email' => 'email|required',
                'no_telp' => 'required'
            ]);

            $teacher = User::findOrFail($id);
            $teacher->name = $request->name;
            $teacher->tempat_lahir = $request->tempat_lahir;
            $teacher->tgl_lahir = $request->tgl_lahir;
            $teacher->bulan_lahir = $request->bulan_lahir;
            $teacher->tahun_lahir = $request->tahun_lahir;
            $teacher->jenis_kelamin = $request->jenis_kelamin;
            $teacher->agama = $request->agama;
            $teacher->nip = $request->nip;
            $teacher->jabatan = $request->jabatan;
            $teacher->username = $request->username;
            $teacher->email = $request->email;
            $teacher->no_telp = $request->no_telp;
            $teacher->save();


            $request->session()->flash('message.profile', 'Profile Details was successfully updated!');

            return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditPasswordTeacher($id, Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $teacher = User::findOrFail($id);
        User::find($teacher->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Password was successfully updated!');

        return redirect()->back();
    }






    /**
     * FOR TEACHER
     *
     */
    public function showStudentList()
    {
        $user = Auth::user(); // Untuk Photo Profile

        $students = User::whereHas('roles', function($q){
            $q->where('name', 'Student');
        })->get();

        return view('pages.okemin.user.student.showStudentList', compact('user', 'students',));
    }

    /*
     * This is For Show Search Teacher
     *
     */
    public function searchStudent(Request $request)
	{
        $user = Auth::user(); // Untuk Photo Profile

		// menangkap data pencarian
		$search = $request->table_search;

    		// mengambil data dari table materi sesuai pencarian data
        $search = User::whereHas('roles', function($q){
            $q->where('name', 'Student');
        })->where('name','like',"%".$search."%")
        ->orWhere('nisn','like',"%".$search."%")
        ->orWhere('username','like',"%".$search."%")
        ->get();


    		// mengirim data materi ke view index
		return view('pages.okemin.user.student.showStudentFiltered', compact('search', 'user') );
    }

    /**
     * This is For Delete Teacher User
     *
     */
    public function deleteStudent($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $student = User::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', 'User Berhasil diHapus.');
    }

    // Profile
    /*
     * This is For Profile Picture
     *
     */
    public function profilePictureStudent($id)
    {
        $user = Auth::user();
        $student = User::findOrFail($id);
        return view('pages.okemin.user.student.profile.picture', compact('user', 'student',));
    }

    public function updateAvatarStudent($id, Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $student = User::findOrFail($id);

        $avatarName = $student->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $student->avatar = $avatarName;
        $student->save();

        return back()
            ->with('success','You have successfully upload image.');
    }


    /*
     * This is For Profile
     *
     */
    public function showProfileStudent($id)
    {
        $user = Auth::user();
        $student = User::findOrFail($id);
        $kelas = Kelas::all(); // Untuk Show List Kelas - Select
    	return view('pages.okemin.user.student.profile.profilePage', compact('user', 'student', 'kelas'));
    }

    public function editProfileStudent($id, Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'tgl_lahir' => 'required',
            'bulan_lahir' => 'required',
            'tahun_lahir' => 'required',
            'nisn' => 'required',
            'kelas' => 'required',
            'tahun_masuk' => 'required',
            'username' => 'required',
            'email' => 'email',
            'no_telp' => 'required',
        ]);

        $student = User::findOrFail($id);
        $student->name = $request->name;
        $student->tempat_lahir = $request->tempat_lahir;
        $student->tgl_lahir = $request->tgl_lahir;
        $student->bulan_lahir = $request->bulan_lahir;
        $student->tahun_lahir = $request->tahun_lahir;
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->nisn = $request->nisn;
        $student->agama = $request->agama;
        $student->kelas = $request->kelas;
        $student->jabatan = $request->jabatan;
        $student->tahun_masuk = $request->tahun_masuk;
        $student->username = $request->username;
        $student->email = $request->email;
        $student->no_telp = $request->no_telp;
        $student->save();


        $request->session()->flash('message.profile', 'Profile Details was successfully updated!');

        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditPasswordStudent($id, Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $student = User::findOrFail($id);
        User::find($student->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Password was successfully updated!');

        return redirect()->back();
    }

    /**
     * CREATE USER TEACHER & STUDENT
     *
     */
    // Teacher
    public function showCreateTeacher()
    {
        $user = Auth::user();
    	return view('pages.okemin.user.teacher.createTeacher', compact('user'));
    }

    public function createTeacher(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            "tgl_lahir" => 'required',
            "bulan_lahir" => 'required',
            "tahun_lahir" => 'required',
            "nip" => 'required|unique:users',
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "no_telp" => 'required',
        ]);

        $teacher = User::create([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'jabatan' => $request->input('jabatan'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'bulan_lahir' => $request->input('bulan_lahir'),
            'tahun_lahir' => $request->input('tahun_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'no_telp' => $request->input('no_telp')
        ]);
        $teacher->roles()->attach(Role::where('name', 'Teacher')->first());


        return back()->with('success','Teacher telah berhasil dibuat...');
    }

    // Teacher
    public function showCreateStudent()
    {
        $user = Auth::user();
        $kelas = Kelas::all(); // Untuk Show List Kelas - Select
    	return view('pages.okemin.user.student.createStudent', compact('user', 'kelas'));
    }

    public function createStudent(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            "tgl_lahir" => 'required',
            "bulan_lahir" => 'required',
            "tahun_lahir" => 'required',
            "nisn" => 'required|unique:users',
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "kelas" => 'required',
            "tahun_masuk" => 'required',
            "no_telp" => 'required',
        ]);

        $teacher = User::create([
            'nisn' => $request->input('nisn'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'kelas' => $request->input('kelas'),
            'jabatan' => $request->input('jabatan'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'bulan_lahir' => $request->input('bulan_lahir'),
            'tahun_lahir' => $request->input('tahun_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'tahun_masuk' => $request->input('tahun_masuk'),
            'no_telp' => $request->input('no_telp')
        ]);
        $teacher->roles()->attach(Role::where('name', 'Student')->first());


        return back()->with('success','Student telah berhasil dibuat...');
    }
    /* ----------------------------------- END OF USER MANAGER SECTION ----------------------------------- */

}


