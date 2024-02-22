<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $fillable = ['Name','Notes'];
    protected $table = 'grades';
    public $timestamps = true;
    use HasFactory;




                //علاقة المراحل الدراسية لجلب الاقسام 

public function sections(){
    return $this->hasMany('App\Models\Section', 'grade_id');
    }
}