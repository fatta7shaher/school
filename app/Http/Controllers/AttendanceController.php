<?php

namespace App\Http\Controllers;

use App\Repository\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $Attendance;

    public function __construct(AttendanceRepositoryInterface $Attendance)
    {
        $this->Attendance = $Attendance;
    }

    public function index()
    {
        return $this->Attendance->index();
    }


    public function show($id)
    {
        return $this->Attendance->show($id);
    }


    public function store(Request $request)
    {
        return $this->Attendance->store($request);
    }


    public function update($request)
    {
        return $this->Attendance->update($request);
    }

    
    public function destroy($request)
    {
        return $this->Attendance->destroy($request);
    }
}
