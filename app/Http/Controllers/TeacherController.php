<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeachers;
use App\Models\Gender;
use App\Models\Specialization;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller



{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }








    public function index()
    {
        //Design patterns
        $Teachers =  $this->Teacher->getAllTeachers();
        return view('teacher', compact('Teachers'));
    }







    public function create()
    {

        $specializations = $this->Teacher->GetSpecializations();
        $genders = $this->Teacher->GetGender();
        return view('teacher_create', compact('specializations', 'genders'));
    }






    public function store(StoreTeachers $request)
    {

        return $this->Teacher->StoreTeachers($request);
    }



    public function edit($id)
    {

        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->GetSpecializations();
        $genders = $this->Teacher->GetGender();
        return view('teacher_edit', compact('Teachers', 'specializations', 'genders'));
    }





    public function update (Request $request )
    {

        return $this->Teacher->updateTeachers($request);

    }




    public function delete (Request $request)
    {

        return $this->Teacher->deleteTeachers($request);

    }

}
