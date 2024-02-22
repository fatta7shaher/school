<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\Facades\Translatable;
use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name'];

}
//    protected $guarded =[];
// هاي لو عندك 50 كولوم مشان ما تكتب كل شي وتترك المصفوفة فاضية
// راح تنفذ كل شي كولوم عندك 
