<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $guarded = [];

    // علاقة بين جدول الترقيات وجدول الطلاب لجلب اسم الطالب 

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    // علاقة بين جدول الترقيات والمراحل الدراسية لجلب اسم المرحلة 

    public function f_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'from_grade');
    }


    // علاقة بين جدول الترقيات وجدول الصفوف  لجلب اسم الصف

    public function f_classroom()
    {
        return $this->belongsTo('App\Models\ClassRoom', 'from_classroom');
    }

    // علاقة بين جدول الترقيات وجدول الاقسام لجلب اسم القسم 

    public function f_section()
    {
        return $this->belongsTo('App\Models\Section', 'from_section');
    }


    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات

    public function t_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'to_grade');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function t_classroom()
    {
        return $this->belongsTo('App\Models\ClassRoom', 'to_classroom');
    }


    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function t_section()
    {
        return $this->belongsTo('App\Models\Section', 'to_section');
    }
}
