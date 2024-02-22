<?php


namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;

class FeesRepository implements FeesRepositoryInterface
{

    public function index()
    {

        $fees = Fee::all();
        $Grades = Grade::all();
        return view('pages.Fees.index', compact('fees', 'Grades'));
        //dd($fees->all());
    }


    public function create()
    {

        $Grades = Grade::all();
        return view('pages.Fees.add', compact('Grades'));
    }


    public function edit($id)
    {

        $fee = Fee::findorfail($id);
        $Grades = Grade::all();
        return view('pages.Fees.edit', compact('fee', 'Grades'));
    }



    public function store($request)
    {
        // dd($request->all());

        try {

            $fees = new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount = $request->amount;
            $fees->grade_id = $request->grade_id;
            $fees->classroom_id = $request->class_room_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->fee_type = $request->fee_type;

            $fees->save();

            toastr()->success(trans('success'));
            return redirect()->route('Fee.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update($request)
    {

        try {
            $fees = Fee::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  = $request->amount;
            $fees->grade_id  = $request->grade_id;
            $fees->classroom_id  = $request->class_room_id;
            $fees->description  = $request->description;
            $fees->year  = $request->year;
            $fees->fee_type = $request->fee_type;

            $fees->save();
            
            toastr()->success(trans('success'));
            return redirect()->route('Fee.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function delete($request)
    {

        try {
            Fee::destroy($request->id);
            toastr()->error(trans('Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
