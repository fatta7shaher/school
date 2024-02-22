<?php

namespace App\Repository;

use Flasher\Laravel\Http\Request;

interface StudentPromotionRepositoryInterface
{


    public function index();


    public function store($request);


    public function create();


    public function delete($request);


    
}
