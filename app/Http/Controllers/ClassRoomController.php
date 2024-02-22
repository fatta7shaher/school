<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroom;
use App\Models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        if (request()->has('Grade_id') && request()->Grade_id) {
            $My_classes = ClassRoom::where("Grade_id", request()->Grade_id)->get();
        } else {
            $My_classes = ClassRoom::all();
        }

        $Grades = Grade::all();
        return view('class',  compact('My_classes', 'Grades'));
    }



    public function store(StoreClassroom $request)
    {
        $List_Classes = $request->List_Classes;

        try {

            $validated = $request->validated();
            foreach ($List_Classes as $List_Class) {
                $My_Classes = new ClassRoom();
                $My_Classes->Name_Class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']];
                $My_Classes->Grade_id = $List_Class['Grade_id'];
                $My_Classes->save();
            }
            toastr()->success(trans(''));
            return redirect()->route('classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    

    public function update(Request $request)
    {
        try {
            $classrooms = ClassRoom::findOrFail($request->id);
            $classrooms->update([
                $classrooms->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_en],
                $classrooms->Grade_id = $request->Grade_id
            ]);

            toastr()->success(trans(''));
            return redirect()->route('classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function delete(Request $request)
    {
        $classrooms = classroom::findOrFail($request->id)->delete();
        // $classrooms = classroom::whereIn('id', $request->ids)->delete();

        toastr()->success(trans('successfully'));
        return redirect()->route('classrooms.index');
    }

    public function delete_all(Request $request)
    {

        // dd($request->all());
        $delete_all_id = explode(",", $request->delete_all_id);
        // dd($delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('successfully'));
        return redirect()->route('classrooms.index');
    }

    public function search(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_id', '=', $request->Grade_id)->get();
        return view('class', compact('Grades'))->withDetails($Search);

        //return view ('class',[$Grades = $Search ]);
        // dd($request->all());

    }
}
