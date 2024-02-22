<?php

namespace App\Repository;

interface TeacherRepositoryInterface
{

    // get all Teachers
    public function getAllTeachers();


    // Get Specializations
    public function GetSpecializations();



    // Get Gender
    public function GetGender();



    // Get StoreTeachers
    public function StoreTeachers($request);


    // edit Teachers
    public function editTeachers($id);



    // update Teachers
    public function updateTeachers($id);



    // delete Teachers
    public function deleteTeachers($request);
}
