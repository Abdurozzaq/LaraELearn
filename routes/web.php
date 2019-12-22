<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});


/*
 * Route For Authentication
 *
 */
Auth::routes(['register' => false]);


/*
 * Routes For Home each Role
 *
 */
Route::get('/Okemin', 'AdminController@index')->middleware('role:Admin');

Route::get('/Teacher', 'TeacherController@index')->middleware('role:Teacher');

Route::get('/Student', 'StudentController@index')->middleware('role:Student');


/*
 * Routes For Profile Picture
 *
 */
Route::get('/Okemin/Profile/Picture', 'AdminController@profilePicture')->middleware('role:Admin');
Route::post('/Okemin/Profile/Picture', 'AdminController@updateAvatar')->middleware('role:Admin');

Route::get('/Teacher/Profile/Picture', 'TeacherController@profilePicture')->middleware('role:Teacher');
Route::post('/Teacher/Profile/Picture', 'TeacherController@updateAvatar')->middleware('role:Teacher');

Route::get('/Student/Profile/Picture', 'StudentController@profilePicture')->middleware('role:Student');
Route::post('/Student/Profile/Picture', 'StudentController@updateAvatar')->middleware('role:Student');


/*
 * Routes For Profile
 *
 */
Route::get('/Okemin/Profile', 'AdminController@showProfile')->middleware('role:Admin');
Route::put('/Okemin/Profile/{id}', 'AdminController@editProfile')->middleware('role:Admin');
Route::post('/Okemin/Profile/changePassword/{id}', 'AdminController@editPassword')->name('okemin.profile.change.password')->middleware('role:Admin');

Route::get('/Teacher/Profile', 'TeacherController@showProfile')->middleware('role:Teacher');
Route::put('/Teacher/Profile/{id}', 'TeacherController@editProfile')->middleware('role:Teacher');
Route::post('/Teacher/Profile/changePassword/{id}', 'TeacherController@editPassword')->name('teacher.profile.change.password')->middleware('role:Teacher');

Route::get('/Student/Profile', 'StudentController@showProfile')->middleware('role:Student');
Route::put('/Student/Profile/{id}', 'StudentController@editProfile')->middleware('role:Student');
Route::post('/Student/Profile/changePassword/{id}', 'StudentController@editPassword')->name('student.profile.change.password')->middleware('role:Student');



/*
 * Routes For Kelas
 *
 */
// Create Kelas - Admin
Route::get('/Okemin/Kelas/Create', 'AdminController@showCreateKelas')->middleware('role:Admin');
Route::post('/Okemin/Kelas/Create/Send', 'AdminController@createKelas')->middleware('role:Admin');
// Show List Kelas - Admin
Route::get('/Okemin/Kelas/List', 'AdminController@showKelasList')->middleware('role:Admin');
// Search Kelas - Admin
Route::get('/Okemin/Kelas/List/Search', 'AdminController@searchKelas')->middleware('role:Admin');
// Edit Kelas - Okemin
Route::get('/Okemin/Kelas/Edit/{id}', 'AdminController@editKelas')->middleware('role:Admin');
Route::put('/Okemin/Kelas/Update/{id}', 'AdminController@updateKelas')->middleware('role:Admin');
// Delete Kelas - Okemin
Route::get('/Okemin/Kelas/Delete/{id}', 'AdminController@deleteKelas')->middleware('role:Admin');



/*
 * Routes For Mapel
 *
 */
// Create Mapel - Admin
Route::get('/Okemin/Mapel/Create', 'AdminController@showCreateMapel')->middleware('role:Admin');
Route::post('/Okemin/Mapel/Create/Send', 'AdminController@createMapel')->middleware('role:Admin');
// Show List Mapel - Admin
Route::get('/Okemin/Mapel/List', 'AdminController@showMapelList')->middleware('role:Admin');
// Search Mapel - Admin
Route::get('/Okemin/Mapel/List/Search', 'AdminController@searchMapel')->middleware('role:Admin');
// Edit Mapel - Okemin
Route::get('/Okemin/Mapel/Edit/{id}', 'AdminController@editMapel')->middleware('role:Admin');
Route::put('/Okemin/Mapel/Update/{id}', 'AdminController@updateMapel')->middleware('role:Admin');
// Delete Mapel - Okemin
Route::get('/Okemin/Mapel/Delete/{id}', 'AdminController@deleteMapel')->middleware('role:Admin');



/**
 * Routes For Materi
 * TEACHER
 *
 */
// Create Materi - Teacher
Route::get('/Teacher/Materi/Create', 'TeacherController@showCreateMateri')->middleware('role:Teacher');
Route::post('/Teacher/Materi/Create/Send', 'TeacherController@createMateri')->middleware('role:Teacher');
// Show List Materi - Teacher
Route::get('/Teacher/Materi/List', 'TeacherController@showMateriList')->middleware('role:Teacher');
// Search Materi -Teacher
Route::get('/Teacher/Materi/List/Search', 'TeacherController@searchMateri')->middleware('role:Teacher');
// Edit Materi - Teacher
Route::get('/Teacher/Materi/Edit/{id}', 'TeacherController@editMateri')->middleware('role:Teacher');
Route::put('/Teacher/Materi/Update/{id}', 'TeacherController@updateMateri')->middleware('role:Teacher');
// Delete Materi - Teacher
Route::get('/Teacher/Materi/Delete/{id}', 'TeacherController@deleteMateri')->middleware('role:Teacher');

/**
 * Route For Materi
 * STUDENT
 *
 */
Route::get('/Student/Materi/Mapel', 'StudentController@showMapel')->middleware('role:Student');
Route::get('/Student/Materi/List/{id}', 'StudentController@showMateriList')->middleware('role:Student');
Route::get('/Student/Materi/singleMateri/{id}', 'StudentController@showSingleMateri')->middleware('role:Student');
Route::get('/Student/Materi/singleMateri/exportPdf/{id}', 'StudentController@exportPdf')->middleware('role:Student');

/*
/**
 * Routes For Exercise & Question
 * TEACHER
 *
 */
// Create Exercise - Teacher
//Route::get('/Teacher/Exercise/Create', 'TeacherController@showCreateExercise')->middleware('role:Teacher');
//Route::post('/Teacher/Exercise/Create/Send', 'TeacherController@createExercise')->middleware('role:Teacher');
// Show Exercise List - Teacher
//Route::get('/Teacher/Exercise/List/', 'TeacherController@showExerciseList')->middleware('role:Teacher');
// Search Exercise -Teacher
//Route::get('/Teacher/Exercise/List/Search', 'TeacherController@searchExercise')->middleware('role:Teacher');
// Edit Materi - Teacher
//Route::get('/Teacher/Exercise/Edit/{id}', 'TeacherController@editExercise')->middleware('role:Teacher');
//Route::put('/Teacher/Exercise/Update/{id}', 'TeacherController@updateExercise')->middleware('role:Teacher');
// Delete Exercise - Teacher
//Route::get('/Teacher/Exercise/Delete/{id}', 'TeacherController@deleteExercise')->middleware('role:Teacher');
// Search Exercise -Teacher
//Route::get('/Teacher/Exercise/Question/{id}', 'TeacherController@showEditQuestion')->middleware('role:Teacher');
// Create Question - Teacher
//Route::post('/Teacher/Exercise/Question/Create/Send', 'TeacherController@createQuestion')->middleware('role:Teacher');

/**
 * User Manager
 *
 */
// TEACHER
// Show List
Route::get('/Okemin/User/Teacher/List', 'AdminController@showTeacherList')->middleware('role:Admin');
// Show Search Result
Route::get('/Okemin/User/Teacher/List/Search', 'AdminController@searchTeacher')->middleware('role:Admin');
// Delete Teacher
Route::get('/Okemin/User/Teacher/Delete/{id}', 'AdminController@deleteTeacher')->middleware('role:Admin');

// MANAGE PROFILE OF TEACHER USER
// Photo Profile
Route::get('/Okemin/User/Teacher/Profile/Picture/{id}', 'AdminController@profilePictureTeacher')->middleware('role:Admin');
Route::post('/Okemin/User/Teacher/Profile/Picture/Send/{id}', 'AdminController@updateAvatarTeacher')->middleware('role:Admin');
// Profile Details
Route::get('/Okemin/User/Teacher/Profile/{id}', 'AdminController@showProfileTeacher')->middleware('role:Admin');
Route::put('/Okemin/User/Teacher/Profile/Send/{id}', 'AdminController@editProfileTeacher')->middleware('role:Admin');
Route::post('/Okemin/User/Teacher/Profile/changePassword/{id}', 'AdminController@editPasswordTeacher')->middleware('role:Admin');
// Create Teacher
Route::get('/Okemin/User/Teacher/Create', 'AdminController@showCreateTeacher')->middleware('role:Admin');
Route::post('/Okemin/User/Teacher/Create/Send', 'AdminController@createTeacher')->middleware('role:Admin');

// STUDENT
// Show List
Route::get('/Okemin/User/Student/List', 'AdminController@showStudentList')->middleware('role:Admin');
// Show Search Result
Route::get('/Okemin/User/Student/List/Search', 'AdminController@searchStudent')->middleware('role:Admin');
// Delete Student
Route::get('/Okemin/User/Student/Delete/{id}', 'AdminController@deleteStudent')->middleware('role:Admin');
// Photo Profile
Route::get('/Okemin/User/Student/Profile/Picture/{id}', 'AdminController@profilePictureStudent')->middleware('role:Admin');
Route::post('/Okemin/User/Student/Profile/Picture/Send/{id}', 'AdminController@updateAvatarStudent')->middleware('role:Admin');
// Profile Details
Route::get('/Okemin/User/Student/Profile/{id}', 'AdminController@showProfileStudent')->middleware('role:Admin');
Route::put('/Okemin/User/Student/Profile/Send/{id}', 'AdminController@editProfileStudent')->middleware('role:Admin');
Route::post('/Okemin/User/Student/Profile/changePassword/{id}', 'AdminController@editPasswordStudent')->middleware('role:Admin');
// Create Student
Route::get('/Okemin/User/Student/Create', 'AdminController@showCreateStudent')->middleware('role:Admin');
Route::post('/Okemin/User/Student/Create/Send', 'AdminController@createStudent')->middleware('role:Admin');

/*
 * This Routes Below is For Testing Routes
 *
 */
//Route::get('/contoh', function () {
//    return view('pages.pageContoh');
//});

//Route::get('/home', 'HomeController@index')->name('home');
