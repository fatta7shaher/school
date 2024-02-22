<?php

namespace App\Models;

use Carbon\Translator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClassRoom extends Model
{
    
    use HasTranslations;
    public $translatable = ['Name_Class'];
        protected $table = 'class_rooms';
    protected $fillable = ['Name_Class','Grade_id'];
    public $timestamps = true;







    public function Grades(){
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }
}



    
