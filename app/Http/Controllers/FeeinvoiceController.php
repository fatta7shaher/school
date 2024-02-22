<?php

namespace App\Http\Controllers;

use App\Repository\FeeInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeeinvoiceController extends Controller
{
    protected $FeeInvoices;

    public function __construct(FeeInvoicesRepositoryInterface $FeeInvoices)
    {
        $this->FeeInvoices = $FeeInvoices;
    }

    public function index()
    {
        return $this->FeeInvoices->index();
    }



    public function store(Request $request)
    {
        return $this->FeeInvoices->store($request);
    }



    public function edit($id)
    {
        return $this->FeeInvoices->edit($id);
    }



    public function show($id)
    {
        return $this->FeeInvoices->show($id);
    }



    public function update(Request $request)
    {
        return $this->FeeInvoices->update($request);
    }



    public function delete(Request $request)
    {
        return $this->FeeInvoices->delete($request);
    }
}
