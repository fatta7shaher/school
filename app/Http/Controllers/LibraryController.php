<?php

namespace App\Http\Controllers;

use App\Repository\libraryRepositoryInterface;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    protected $library;

    public function __construct(libraryRepositoryInterface $library)
    {
        $this->library = $library;
    }

    public function index()
    {
        return $this->library->index();
    }
    public function create()
    {
        return $this->library->create();
    }
    public function store(Request $request)
    {
        return $this->library->store($request);
    }
    public function edit($id)
    {
        return $this->library->edit($id);
    }
    public function update(Request $request)
    {
        return $this->library->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->library->destroy($request);
    }
    public function download($filename)
    {
        return $this->library->download($filename);
    }
}
