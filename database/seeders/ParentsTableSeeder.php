<?php

namespace Database\Seeders;

use App\Models\My_Parent;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('my__parents')->delete();
        $my_parents = new My_Parent();
        $my_parents->email = 'samir.gamal77@yahoo.com';
        $my_parents->password = Hash::make('12345678');
        $my_parents->name_father = ['en' => 'samirgamal', 'ar' => 'سمير جمال'];
        $my_parents->national_id_father = '1234567810';
        $my_parents->passport_id_father = '1234567810';
        $my_parents->phone_father = '1234567810';
        $my_parents->job_father = ['en' => 'programmer', 'ar' => 'مبرمج'];
        $my_parents->nationality_father_id  = Nationality::all()->unique()->random()->id;
        $my_parents->blood_type_father_id  =Type_Blood::all()->unique()->random()->id;
        $my_parents->religion_father_id  = Religion::all()->unique()->random()->id;
        $my_parents->address_father ='القاهرة';
        $my_parents->name_mother = ['en' => 'SS', 'ar' => 'سس'];
        $my_parents->national_id_mother = '1234567810';
        $my_parents->passport_id_mother = '1234567810';
        $my_parents->phone_mother = '1234567810';
        $my_parents->job_mother = ['en' => 'Teacher', 'ar' => 'معلمة'];
        $my_parents->nationality_mother_id  = Nationality::all()->unique()->random()->id;
        $my_parents->blood_type_mother_id  =Type_Blood::all()->unique()->random()->id;
        $my_parents->religion_mother_id  = Religion::all()->unique()->random()->id;
        $my_parents->address_mother ='القاهرة';
        $my_parents->save();
    }
}
