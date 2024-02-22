<?php

namespace App\Http\Controllers;

use App\Repository\QuizzesRepositoryInterface;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    
    protected $Quizz;

    public function __construct(QuizzesRepositoryInterface $Quizz)
    {
        $this->Quizz =$Quizz;
    }


    public function index()

    {
        return $this->Quizz->index();
    }


    public function create()

    {
        return $this->Quizz->create();
    }


    public function store(Request $request)

    {
        return $this->Quizz->store($request);
    }


    public function edit($id)

    {
        return $this->Quizz->edit($id);
    }


    public function update(Request $request)

    {
        return $this->Quizz->update($request);
    }


    public function destroy(Request $request)

    {
        return $this->Quizz->destroy($request);
    }

}
