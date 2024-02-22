<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeinvoiceController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProcessingFeeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\ReceiptStudentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::get('Grades', [App\Http\Controllers\GradeController::class, 'index'])->name('Grades.index');
        Route::post('Grades/store', [App\Http\Controllers\GradeController::class, 'store'])->name('Grade.store');
        Route::patch('Grades/update', [App\Http\Controllers\GradeController::class, 'update'])->name('Grades.update');
        Route::delete('Grades/destroy', [App\Http\Controllers\GradeController::class, 'destroy'])->name('Grades.destroy');

        /*_____________________ ClassRooms _____________________________*/

        Route::get('classrooms', [ClassRoomController::class, 'index'])->name('classrooms.index');
        Route::post('classrooms/store', [ClassRoomController::class, 'store'])->name('classrooms.store');
        Route::patch('classrooms/update', [ClassRoomController::class, 'update'])->name('classrooms.update');
        Route::delete('classrooms/delete', [ClassRoomController::class, 'delete'])->name('classrooms.delete');
        Route::post('classrooms/delete_all', [ClassRoomController::class, 'delete_all'])->name('classrooms.delete_all');
        Route::post('classrooms/search', [ClassRoomController::class, 'search'])->name('classrooms/search');

        /*_______________________Sections_____________________________*/

        Route::get('section', [SectionController::class, 'index'])->name('section.index');
        Route::get('/classes/{id}', [SectionController::class, 'classes'])->name('classes.{id}');
        Route::post('section/store', [SectionController::class, 'store'])->name('section.store');
        Route::patch('section/update', [SectionController::class, 'update'])->name('section.update');
        Route::delete('section/destroy', [SectionController::class, 'destroy'])->name('section.destroy');

        /*____________________Parents_______________________________*/

        Route::get('parent/index', [ParentController::class, 'index'])->name('parent.index');
        Route::get('parent/create', [ParentController::class, 'create'])->name('parent.create');
        Route::post('parent/store', [ParentController::class, 'store'])->name('parent.store');
        Route::get('parent/edit/{id}', [ParentController::class, 'edit'])->name('parent.edit.{id}');
        Route::patch('parent/update', [ParentController::class, 'update'])->name('parent.update');
        Route::delete('parent/delete', [ParentController::class, 'delete'])->name('parent.delete');

        /*_______________________Teachers___________________________________*/

        Route::get('teacher/index', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit.{id}');
        Route::patch('teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update.{id}');
        Route::delete('teacher/delete', [TeacherController::class, 'delete'])->name('teacher.delete');

        /*________________________________Students___________________________________*/

        Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
        Route::get('student/index', [StudentController::class, 'index'])->name('student.index');
        Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
        Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit.{id}');
        Route::put('student/update', [StudentController::class, 'update'])->name('student.update');
        Route::delete('student/delete', [StudentController::class, 'delete'])->name('student.delete');
        Route::get('student/show/{id}', [StudentController::class, 'show'])->name('student.show.{id}');
        Route::post('Upload_attachment', [StudentController::class, 'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class, 'Download_attachment'])->name('Download_attachment');
        Route::post('Delete_attachment', [StudentController::class, 'Delete_attachment'])->name('Delete_attachment');
        Route::get('Get_classrooms/{id}', [StudentController::class, 'Get_classrooms']);
        Route::get('Get_Sections/{id}', [StudentController::class, 'Get_Sections']);

        /*__________________________________Promotions___________________________________*/

        Route::get('promotion/index', [PromotionController::class, 'index'])->name('promotion.index');
        Route::post('promotion/store', [PromotionController::class, 'store'])->name('promotion.store');
        Route::get('promotion/create', [PromotionController::class, 'create'])->name('promotion.create');
        Route::delete('promotion/delete', [PromotionController::class, 'delete'])->name('promotion.delete');

        /*________________________________Graduated________________________________________________*/

        Route::get('Graduated/index', [GraduatedController::class, 'index'])->name('Graduated.index');
        Route::post('Graduated/store', [GraduatedController::class, 'store'])->name('Graduated.store');
        Route::get('Graduated/create', [GraduatedController::class, 'create'])->name('Graduated.create');
        Route::put('Graduated/update', [GraduatedController::class, 'update'])->name('Graduated.update');
        Route::delete('Graduated/delete', [GraduatedController::class, 'delete'])->name('Graduated.delete');

        /*_________________________________Fee________________________________________________________*/

        Route::get('Fee/index', [FeeController::class, 'index'])->name('Fee.index');
        Route::get('Fee/create', [FeeController::class, 'create'])->name('Fee.create');
        Route::post('Fee/store', [FeeController::class, 'store'])->name('Fee.store');
        Route::get('Fee/edit{id}', [FeeController::class, 'edit'])->name('Fee.edit.{id}');
        Route::put('Fee/update', [FeeController::class, 'update'])->name('Fee.update');
        Route::delete('Fee/delete', [FeeController::class, 'delete'])->name('Fee.delete');

        /*___________________________FeeInvoices_______________________________________-*/

        Route::get('Feeinvoice/index', [FeeinvoiceController::class, 'index'])->name('Feeinvoice.index');
        Route::get('Feeinvoice/edit/{id}', [FeeinvoiceController::class, 'edit'])->name('Feeinvoice.edit.{id}');
        Route::post('Feeinvoice/store', [FeeinvoiceController::class, 'store'])->name('Feeinvoice.store');
        Route::get('Feeinvoice/show/{id}', [FeeinvoiceController::class, 'show'])->name('Feeinvoice.show.{id}');
        Route::put('Feeinvoice/update', [FeeinvoiceController::class, 'update'])->name('Feeinvoice.update');
        Route::delete('Feeinvoice/delete', [FeeinvoiceController::class, 'delete'])->name('Feeinvoice.delete');

        /*_______________________________ReceiptStudent___________________________________________*/

        Route::get('receipt/index', [ReceiptStudentController::class, 'index'])->name('receipt.index');
        Route::get('receipt/show{id}', [ReceiptStudentController::class, 'show'])->name('receipt.show.{id}');
        Route::get('receipt/edit{id}', [ReceiptStudentController::class, 'edit'])->name('receipt.edit.{id}');
        Route::post('receipt/store', [ReceiptStudentController::class, 'store'])->name('receipt.store');
        Route::put('receipt/update', [ReceiptStudentController::class, 'update'])->name('receipt.update');
        Route::delete('receipt/destroy', [ReceiptStudentController::class, 'destroy'])->name('receipt.destroy');

        /*________________________________ProcessingFee________________________________________________*/

        Route::get('ProcessingFee/index', [ProcessingFeeController::class, 'index'])->name('ProcessingFee.index');
        Route::get('ProcessingFee/show/{id}', [ProcessingFeeController::class, 'show'])->name('ProcessingFee.show.{id}');
        Route::get('ProcessingFee/edit/{id}', [ProcessingFeeController::class, 'edit'])->name('ProcessingFee.edit.{id}');
        Route::post('ProcessingFee/store', [ProcessingFeeController::class, 'store'])->name('ProcessingFee.store');
        Route::put('ProcessingFee/update', [ProcessingFeeController::class, 'update'])->name('ProcessingFee.update');
        Route::delete('ProcessingFee/destroy', [ProcessingFeeController::class, 'destroy'])->name('ProcessingFee.destroy');

        /*_______________________________________Payment_____________________________________*/


        Route::get('Payment/index', [PaymentController::class, 'index'])->name('Payment.index');
        Route::get('Payment/show/{id}', [PaymentController::class, 'show'])->name('Payment.show.{id}');
        Route::get('Payment/edit/{id}', [PaymentController::class, 'edit'])->name('Payment.edit.{id}');
        Route::post('Payment/store', [PaymentController::class, 'store'])->name('Payment.store');
        Route::put('Payment/update', [PaymentController::class, 'update'])->name('Payment.update');
        Route::delete('Payment/destroy', [PaymentController::class, 'destroy'])->name('Payment.destroy');

        /*_______________________________________Attendance_____________________________________*/


        Route::get('Attendance/index', [AttendanceController::class, 'index'])->name('Attendance.index');
        Route::get('Attendance/show/{id}', [AttendanceController::class, 'show'])->name('Attendance.show.{id}');
        Route::post('Attendance/store', [AttendanceController::class, 'store'])->name('Attendance.store');
        Route::put('Attendance/update', [AttendanceController::class, 'update'])->name('Attendance.update');
        Route::delete('Attendance/destroy', [AttendanceController::class, 'destroy'])->name('Attendance.destroy');

        /*_______________________________________Subject_____________________________________*/

        Route::get('Subject/index', [SubjectController::class, 'index'])->name('Subject.index');
        Route::get('Subject/edit/{id}', [SubjectController::class, 'edit'])->name('Subject.edit.{id}');
        Route::post('Subject/store', [SubjectController::class, 'store'])->name('Subject.store');
        Route::get('Subject/create', [SubjectController::class, 'create'])->name('Subject.create');
        Route::patch('Subject/update', [SubjectController::class, 'update'])->name('Subject.update');
        Route::delete('Subject/destroy', [SubjectController::class, 'destroy'])->name('Subject.destroy');

        /*_______________________________________Quizzes_____________________________________*/


        Route::get('Quizzes/index', [QuizzesController::class, 'index'])->name('Quizzes.index');
        Route::get('Quizzes/create', [QuizzesController::class, 'create'])->name('Quizzes.create');
        Route::post('Quizzes/store', [QuizzesController::class, 'store'])->name('Quizzes.store');
        Route::get('Quizzes/edit/{id}', [QuizzesController::class, 'edit'])->name('Quizzes.edit.{id}');
        Route::put('Quizzes/update', [QuizzesController::class, 'update'])->name('Quizzes.update');
        Route::delete('Quizzes/destroy', [QuizzesController::class, 'destroy'])->name('Quizzes.destroy');

        /*_______________________________________Question_____________________________________*/



        Route::get('Question/index', [QuestionController::class, 'index'])->name('Question.index');
        Route::get('Question/create', [QuestionController::class, 'create'])->name('Question.create');
        Route::post('Question/store', [QuestionController::class, 'store'])->name('Question.store');
        Route::get('Question/edit/{id}', [QuestionController::class, 'edit'])->name('Question.edit.{id}');
        Route::put('Question/update', [QuestionController::class, 'update'])->name('Question.update');
        Route::delete('Question/destroy', [QuestionController::class, 'destroy'])->name('Question.destroy');

        /*_______________________________________library_____________________________________*/

        Route::get('library/index', [LibraryController::class, 'index'])->name('library.index');
        Route::get('library/create', [LibraryController::class, 'create'])->name('library.create');
        Route::post('library/store', [LibraryController::class, 'store'])->name('library.store');
        Route::get('library/edit/{id}', [LibraryController::class, 'edit'])->name('library.edit.{id}');
        Route::put('library/update', [LibraryController::class, 'update'])->name('library.update');
        Route::delete('library/destroy', [LibraryController::class, 'destroy'])->name('library.destroy');
        Route::get('library/download/{file_name}', [LibraryController::class, 'download'])->name('library.download.{file_name}');

        /*_______________________________________Setting_____________________________________*/

        Route::get('Setting/index', [SettingController::class, 'index'])->name('Setting.index');
        Route::put('Setting/update', [SettingController::class, 'update'])->name('Setting.update');


        
    }


);
