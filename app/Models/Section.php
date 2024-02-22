<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name_section'];
    protected $fillable = [
        'name_section',
        'grade_id',
        'class_id'
    ];
    protected $table = 'sections';
    public $timestamps = true;

    //             علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام  
    public function My_classs()
    {
        return $this->belongsTo('App\Models\ClassRoom', 'class_id');
    }

    
    // علاقة الاقسام مع المعلمين
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }
}
