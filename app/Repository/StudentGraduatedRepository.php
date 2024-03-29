<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{



    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('pages.Graduated.index', compact('students'));
    }




    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Graduated.create', compact('Grades'));
    }
    


    public function SoftDelete($request)
    {
        $students = Student::where('grade_id', $request->grade_id)->where('class_room_id', $request->class_room_id)->where('section_id', $request->section_id)->get();
        if ($students->count() < 1) {
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach ($students as $student) {
            $ids = explode(',', $student->id);
            Student::whereIn('id', $ids)->Delete();
        }

        toastr()->success(trans('success'));
        return redirect()->route('Graduated.index');
    }



    public function ReturnData($request)
    {

        Student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('success'));
        return redirect()->back();
    }



    public function destroy($request)
    {

        Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('Delete'));
        return redirect()->back();
    }



}
