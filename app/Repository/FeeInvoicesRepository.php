<?php


namespace App\Repository;

use App\Models\Fee;
use App\Models\Feeinvoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface
{
    public function index()
    {

        $Fee_invoices = Feeinvoice::all();
        $Grades = Grade::all();
        return view('pages.Feesinvoices.index', compact('Fee_invoices', 'Grades'));
    }


    public function edit($id)
    {
        $fee_invoices = Feeinvoice::findorfail($id);
        $fees = Fee::where('classroom_id', $fee_invoices->classroom_id)->get();
        return view('pages.Feesinvoices.edit', compact('fee_invoices', 'fees'));
    }


    public function show($id)
    {

        $student = Student::findorfail($id);
        $fees = Fee::where('classroom_id', $student->class_room_id)->get();
        // dd($fees->all());
        return view('pages.Feesinvoices.add', compact('student', 'fees'));
    }



    public function store($request)
    {
        $List_Fees = $request->List_Fees;
        DB::beginTransaction();
        try {
            foreach ($List_Fees as $List_Fee) {
                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $Fees = new Feeinvoice();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = $List_Fee['student_id'];
                $Fees->grade_id = $request->grade_id;
                $Fees->classroom_id = $request->class_room_id;;
                $Fees->fee_id = $List_Fee['fee_id'];
                $Fees->amount = $List_Fee['amount'];
                $Fees->description = $List_Fee['description'];
                $Fees->save();

                // حفظ البيانات في جدول حسابات الطلاب
                $StudentAccount = new StudentAccount();
                $StudentAccount->date = date('Y-m-d');
                $StudentAccount->type = 'invoice';
                $StudentAccount->fee_invoice_id = $Fees->id;
                $StudentAccount->student_id = $List_Fee['student_id'];
                $StudentAccount->debit = $List_Fee['amount'];
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = $List_Fee['description'];
                $StudentAccount->save();
            }
            DB::commit();
            toastr()->success(trans('success'));
            return redirect()->route('Feeinvoice.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update($request)
    {
        DB::beginTransaction();
        try {
            // تعديل البيانات في جدول فواتير الرسوم الدراسية
            $Fees = Feeinvoice::findorfail($request->id);
            $Fees->fee_id = $request->fee_id;
            $Fees->amount = $request->amount;
            $Fees->description = $request->description;
            $Fees->save();

            // تعديل البيانات في جدول حسابات الطلاب
            $StudentAccount = StudentAccount::where('fee_invoice_id', $request->id)->first();
            $StudentAccount->debit = $request->amount;
            $StudentAccount->description = $request->description;
            $StudentAccount->save();
            DB::commit();

            toastr()->success(trans('update'));
            return redirect()->route('Feeinvoice.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function delete($request)
    {
        try {
            Feeinvoice::destroy($request->id);
            toastr()->error(trans('Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
