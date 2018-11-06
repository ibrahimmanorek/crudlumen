<?php

namespace App\Http\Controllers;
use App\Repositories\ExampleRepositories;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $repo;
    public function __construct(ExampleRepositories $repo)
    {
        $this->repo = $repo;
    }

    public function getData()
    {
        return $this->repo->getData();
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'nama' => 'required|max:50',
            'email' => 'required|E-Mail|max:50',
            'phone' => 'required|Numeric|digits_between:3,14',
        ]);
    }

    public function insertData(Request $request)
    {
        $this->validation($request);
        return $this->repo->insertData($request);
    }

    public function updateData(Request $request)
    {
        $this->validation($request);
        return $this->repo->insertData($request);
    }

    public function deleteData($id)
    {
        return $this->repo->deleteData($id);
    }

    public function getApi()
    {
        return $this->repo->getApi();
    }

    //
}
