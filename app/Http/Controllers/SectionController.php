<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSections;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {

        $grades = Grade::with("sections")->get();
        // dd($grades);
        $List_Grades = Grade::all();
        $teachers = Teacher::all();
        return view("section", compact("grades", "List_Grades","teachers"));
    }

    ////////////////////////////////////////////////////////////////

    public function classes($id)
    {
        $list_classes = ClassRoom::where("Grade_id", $id)->pluck("Name_Class", "id");

        return $list_classes;
    }

    ////////////////////////////////////////////////////////////////

    public function store(StoreSections $request)
    {

        try {

            $validated = $request->validated();
            $Section = new Section();

            $Section->name_section = ['ar' => $request->name_section_Ar, 'en' => $request->name_section_En];
            $Section->grade_id = $request->grade_id;
            $Section->class_id = $request->class_id;
            $Section->status = 1;
            $Section->save();
            $Section->teachers()->attach($request->teacher_id);

            toastr()->success(trans('success'));
            return redirect()->route('section.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    ////////////////////////////////////////////////////////////////

    public function update(StoreSections $request)
    {

        try {
            $validated = $request->validated();
            $sections = Section::findOrFail($request->id);

            $sections->name_section = ['ar' => $request->name_section_Ar, 'en' => $request->name_section_En];
            $sections->grade_id = $request->grade_id;
            $sections->class_id = $request->class_id;

            if (isset($request->status)) {
                $sections->status = 1;
            } else {
                $sections->status = 2;
            }

             // update pivot tABLE
        if (isset($request->teacher_id)) {
            $sections->teachers()->sync($request->teacher_id);
        } else {
            $sections->teachers()->sync(array());
        }

            $sections->save();
            toastr()->success(trans('Update'));

            return redirect()->route('section.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(request $request)
    {

        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('successfully'));
        return redirect()->route('section.index');
    }
}
