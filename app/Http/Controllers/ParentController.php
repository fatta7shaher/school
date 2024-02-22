<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParent;
use App\Models\My_Parent;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Type_Blood;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{


    public function index()
    {
        $my_parent = My_Parent::all();

        return view('pages.parents.parent_index', compact('my_parent'));
    }



    public function create()
    {
        $nationalities = Nationality::all();
        $bloodTypes = Type_Blood::all();
        $religions = Religion::all();
        return view('pages.parents.parent_add', [
            "nationalities" => $nationalities,
            "bloodTypes" => $bloodTypes,
            "religions" => $religions,
        ]);
        return view('pages.parents.parent_add', compact('nationalities','bloodTypes','religions'));
    }




    public function store(StoreParent $request)
    {
    //    dd($request->all());

        try {
            $my_parent = new My_Parent();
            // Father_INPUTS
            $my_parent->email = $request->email;
            $my_parent->password = Hash::make($request->password);
            $my_parent->name_father = ['en' => $request->name_father_en, 'ar' => $request->name_father];
            $my_parent->national_id_father = $request->national_id_father;
            $my_parent->passport_id_father = $request->passport_id_father;
            $my_parent->phone_father = $request->phone_father;
            $my_parent->job_father = ['en' => $request->job_father_en, 'ar' => $request->job_father];
            $my_parent->passport_id_father = $request->passport_id_father;
            $my_parent->nationality_father_id = $request->nationality_father_id;
            $my_parent->blood_type_father_id = $request->blood_type_father_id;
            $my_parent->religion_father_id = $request->religion_father_id;
            $my_parent->address_father = $request->address_father;

            // Mother_INPUTS
            $my_parent->name_mother = ['en' => $request->name_mother_en, 'ar' => $request->name_mother];
            $my_parent->national_id_mother = $request->national_id_mother;
            $my_parent->passport_id_mother = $request->passport_id_mother;
            $my_parent->phone_mother = $request->phone_mother;
            $my_parent->job_mother = ['en' => $request->job_mother_en, 'ar' => $request->job_mother];
            $my_parent->passport_id_mother = $request->passport_id_mother;
            $my_parent->nationality_mother_id = $request->nationality_mother_id;
            $my_parent->blood_type_mother_id = $request->blood_type_mother_id;
            $my_parent->religion_mother_id = $request->religion_mother_id;
            $my_parent->address_mother = $request->address_mother;
            $my_parent->save();
            toastr()->success(trans('success'));
            return redirect()->route('parent.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
       $nationalities = Nationality::all();
        $bloodTypes = Type_Blood::all();
        $religions = Religion::all();
        return view('pages.parents.parent_add', [
            "nationalities" => $nationalities,
            "bloodTypes" => $bloodTypes,
            "religions" => $religions,
        ]);
        $parent =  My_Parent::findOrFail($id);
        return view('pages.parent.edit',  compact('parent','nationalities','bloodTypes','religions'));
    }
}
