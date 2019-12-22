<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Materi;
use App\Kelas;
use App\mataPelajaran;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Exercise;
use App\Question;
use Validator;

class TeacherController extends Controller
{
    /*
     * This is For Show Teacher Dashboard
     *
     */
    public function index()
    {
        $user = Auth::user();
        return view('pages.teacher.home', compact('user', $user));
    }

    /*
     * This is For Middleware Role Teacher & Auth
     * role:teacher
     * auth
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Teacher');
    }

    /* ----------------------------------- PROFILE SECTION --------------------------------------- */
     /*
     * This is For Profile Picture
     *
     */
    public function profilePicture()
    {
        $user = Auth::user();
        return view('pages.teacher.profile.picture',compact('user', $user));
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
    	return view('pages.Teacher.profile.profilePage', compact('user'));
    }

    public function editProfile($id, Request $request)
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

            $user = Auth::user();
            $user->name = $request->name;
            $user->tempat_lahir = $request->tempat_lahir;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->bulan_lahir = $request->bulan_lahir;
            $user->tahun_lahir = $request->tahun_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->agama = $request->agama;
            $user->nip = $request->nip;
            $user->jabatan = $request->jabatan;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->no_telp = $request->no_telp;
            $user->save();

            $request->session()->flash('message.profile', 'Profile Details was successfully updated!');

            return redirect()->back();
    }



    /**
     * Profile - Change Password
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
    /* ----------------------------------- END OF PROFILE SECTION --------------------------------------- */



    /* ------------------------------------ MATERI SECTION ---------------------------------------- */
    /*
     * This is For Show Create Materi
     *
     */
    public function showCreateMateri()
    {
        $user = Auth::user(); // Untuk Photo Profile
        $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
        $kelas = Kelas::all(); // Untuk Show List Kelas - Select
        return view('pages.teacher.materi.createMateri', compact('user', 'mapel', 'kelas') );
    }

    /*
     * This is For Create Materi
     *
     */
    public function createMateri(Request $request)
    {
        $this->validate($request,[
            'mapel' => 'required',
            'kelas' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        Materi::create([
            'mapel' => $request->mapel,

            //Assign the "mutated" kelas value to kelas column
            'kelas' => collect($request->kelas)->implode(', '),

            'judul' => $request->judul,
            'isi' => $request->isi,
            'kesimpulan' => $request->kesimpulan,
            'keterangan' => $request->keterangan,
            'user_id_teacher' => Auth::user()->id,
        ]);


        return back()->with('success','Materi Berhasil dikirim.');
    }

    /*
     * This is For Show Materi List
     *
     */
    public function showMateriList(Request $request)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $materis = Materi::where( 'user_id_teacher', Auth::user()->id )->get(); // Show, atau Get All "Materi"
        return view('pages.teacher.materi.showMateri', compact('materis', 'user') );
    }

    /*
     * This is For Show Search Materi
     *
     */
    public function searchMateri(Request $request)
	{
        $user = Auth::user(); // Untuk Photo Profile

		// menangkap data pencarian
		$search = $request->table_search;

    		// mengambil data dari table materi sesuai pencarian data
        $search = Materi::where('mapel','like',"%".$search."%")
                            ->orWhere('kelas','like',"%".$search."%")
                            ->orWhere('judul','like',"%".$search."%")
                            ->orWhere('keterangan','like',"%".$search."%")
                            ->get();

    		// mengirim data materi ke view index
		return view('pages.teacher.materi.showMateriFiltered', compact('search', 'user') );

    }

    /*
     * This is For Show Update Materi
     *
     */
    public function editMateri($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
        $kelas = Kelas::all(); // Untuk Show List Kelas - Select
        $materi = Materi::findOrFail($id);
        return view('pages.teacher.materi.editMateri', compact('user', 'materi', 'mapel', 'kelas'));
    }

    /*
     * This is For Update Materi
     *
     */
    public function updateMateri(Request $request, $id)
    {
        $this->validate($request,[
            'mapel' => 'required',
            'kelas' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $materi = Materi::findOrFail($id);
        $materi->mapel = $request->mapel;
        $materi->kelas = collect($request->kelas)->implode(', ');
        $materi->judul = $request->judul;
        $materi->isi = $request->isi;
        $materi->kesimpulan = $request->kesimpulan;
        $materi->keterangan = $request->keterangan;
        $materi->save();

        return back()->with('success','Materi Berhasil diUpdate/diEdit.');
    }

    /*
     * This is For Delete Materi
     *
     */
    public function deleteMateri($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $materi = Materi::findOrFail($id);
        $materi->delete();
        return redirect()->back()->with('success', 'Materi Berhasil diHapus.');
    }

    /* ------------------------------------ END OF MATERI SECTION ---------------------------------------- */



    /* -------------------------------------------- EXERCISE SECTION ---------------------------------------- */
    /*
     * This is For Show Create Questions
     *
     */
    public function showCreateExercise()
    {
        $user = Auth::user(); // Untuk Photo Profile
        $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
        $kelas = Kelas::all(); // Untuk Show List Kelas - Select
        return view('pages.teacher.exercise.createExercise', compact('user', 'mapel', 'kelas') );
    }

    /*
     * This is For Create Exercise
     *
     */
    public function createExercise(Request $request)
    {
        $this->validate($request,[
            'mapel' => 'required',
            'kelas' => 'required',
            'nama_exercise' => 'required',
            'deskripsi' => 'required',
        ]);

        Exercise::create([
            'mapel' => $request->mapel,

            //Assign the "mutated" kelas value to kelas column
            'kelas' => collect($request->kelas)->implode(', '),

            'nama_exercise' => $request->nama_exercise,
            'deskripsi' => $request->deskripsi,
            'user_id_teacher' => Auth::user()->id,
        ]);

        return back()->with('success','Exercise Berhasil dibuat.');
    }


    /*
     * This is For Show Exercise
     *
     */
    public function showExerciseList()
    {
        $user = Auth::user(); // Untuk Photo Profile
        $exercises = Exercise::where( 'user_id_teacher', Auth::user()->id )->get();
        return view('pages.teacher.exercise.showExerciseList', compact('user', 'exercises') );
    }

    /*
     * This is For Show Search Materi
     *
     */
    public function searchExercise(Request $request)
	{
        $user = Auth::user(); // Untuk Photo Profile

		// menangkap data pencarian
		$search = $request->table_search;

    		// mengambil data dari table materi sesuai pencarian data
        $search = Exercise::where('mapel','like',"%".$search."%")
                            ->orWhere('kelas','like',"%".$search."%")
                            ->orWhere('nama_exercise','like',"%".$search."%")
                            ->orWhere('deskripsi','like',"%".$search."%")
                            ->get();

    		// mengirim data materi ke view index
		return view('pages.teacher.exercise.showExerciseFiltered', compact('search', 'user') );

    }

    /*
     * This is For Show Update Materi
     *
     */
    public function editExercise($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $mapel = mataPelajaran::all(); // Untuk Show List Mapel - Select
        $kelas = Kelas::all(); // Untuk Show List Kelas - Select
        $exercise = Exercise::findOrFail($id);
        return view('pages.teacher.exercise.editExercise', compact('user', 'exercise', 'mapel', 'kelas'));
    }

    /*
     * This is For Update Materi
     *
     */
    public function updateExercise(Request $request, $id)
    {
        $this->validate($request,[
            'mapel' => 'required',
            'kelas' => 'required',
            'nama_exercise' => 'required',
            'deskripsi' => 'required',
        ]);

        $exercise = Exercise::findOrFail($id);
        $exercise->mapel = $request->mapel;
        $exercise->kelas = collect($request->kelas)->implode(', ');
        $exercise->nama_exercise = $request->nama_exercise;
        $exercise->deskripsi = $request->deskripsi;
        $exercise->user_id_teacher = Auth::user()->id;
        $exercise->save();

        return back()->with('success','Exercise Berhasil diUpdate/diEdit.');
    }

    /*
     * This is For Delete Exercise
     *
     */
    public function deleteExercise($id)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();
        return redirect()->back()->with('success', 'Exercise Berhasil diHapus.');
    }

    /*
     * This is For Show Create Questions
     *
     */
    public function showEditQuestion($id, Request $request)
    {
        $user = Auth::user(); // Untuk Photo Profile
        $exercise = Exercise::where('id', $id)->get();
        return view('pages.teacher.exercise.question.createQuestion', compact('user', 'exercise', ) );
    }

    /*
     * This is For Create Question
     *
     */
    public function createQuestion(Request $request)
    {
        $this->validate($request,[
            'exercise'  => 'required',
            'question'  => 'required',
            'opt1'  => 'required',
            'opt2'  => 'required',
            'opt3'  => 'required',
            'opt4'  => 'required',
        ]);

        return dd( $request->input('question.*') );


    }
}
