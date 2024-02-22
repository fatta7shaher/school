<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrades;
use App\Models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;
use Yoeunes\Toastr\ToastrServiceProvider;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Grades = Grade::all();
        return view('empty', compact('Grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrades $request)
    {
        //  هاي الطريقة للفلاديشن مع الريكويست
        // if (Grade::where('Name->ar', $request->Name)->orWhere('Name->en', $request->Name_en)->exists()) {
        //     return redirect()->back()->withErrors(__('exists'));
        // }
        try {
            $validated = $request->validated();
            $Grade = new Grade();

            $Grade->Name = ['en' => $request->Name_en,'ar' => $request->Name];
            $Grade->Notes = $request->Notes;          
            $Grade->save();
            Toastr()->success(__('success'),);
            return redirect()->route('Grades.index');
        } 
            catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGrades $request)
    {
        try {
            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->Name = ['en' => $request->Name_en,'ar' => $request->Name],
                $Grades->Notes = $request->Notes,
            ]);
            Toastr()->success(__('Updata'));
            return redirect()->route('Grades.index');
            //    $Grades = Grade::all();
            //    return view ('empty', compact ('Grades'));

        } 
            catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $MyClass_id = ClassRoom::where('Grade_id',$request->id)->pluck('Grade_id');
                if($MyClass_id->count()==0){

        $Grades = Grade::findOrFail($request->id)->delete();
              Toastr()->error(__('successfully'));
             return redirect()->route('Grades.index');
        }
                  else{
            Toastr()->error(__('The stage cannot be deleted because there are rows!'));
            return redirect()->route('Grades.index');
        }
       
    }
}
