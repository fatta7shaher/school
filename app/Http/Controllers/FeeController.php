<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFee;
use App\Repository\FeesRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $Fees;

    public function __construct(FeesRepositoryInterface $Fees)
    {
        $this->Fees = $Fees;
    }


    public function index()
    {

        return $this->Fees->index();
    }


    public function create()
    {

        return $this->Fees->create();
    }


    public function store(StoreFee $request)
    {

        return $this->Fees->store($request);
    }


    public function edit($id)   
    {

        return $this->Fees->edit($id);
    }


    public function update(StoreFee $request)
    {

        return $this->Fees->update($request);
    }


    public function delete(Request $request)
    {

        return $this->Fees->delete($request);
    }
}
