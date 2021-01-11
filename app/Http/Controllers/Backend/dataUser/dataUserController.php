<?php

namespace App\Http\Controllers\backend\dataUser;

use App\Http\Models\dataUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\backend\dataUser\dataUserRepository;

class dataUserController extends Controller
{
    protected $dataUser;

    public function __construct(dataUserRepository $dataUser)
    {
        $this->dataUser = $dataUser;
    }

    public function index (Request $request) {
        $search = $request->only(['email']);
        $dataUser = $this->dataUser->getAllUser($search);
        return view('backend.Users.indexUsers', compact('dataUser','search'));
    }

    public function create () {
        return view('backend.Users.createUsers');
    }

    public function store (Request $request) {
        $this->dataUser->storeUsers($request);
        
        return redirect()->route('table-dataUsers')->with(['sukses' => 'Terima Kasih Sudah Mendaftar']);
    }

    public function edit ($id)
    {
        $EditdataUser = $this->dataUser->editUser($id);
        return view('backend.Users.editUsers', compact('EditdataUser'));
    }

    public function update(Request $request, dataUsers $dataUsers)
    {
        $this->dataUser->updateUser($request, $dataUsers);
        return redirect()->route('table-dataUsers')->with(['sukses' => 'Data Berhasil Di Edit']);
    }

    public function destroy($id)
    {
        $this->dataUser->destroydUsers($id);
        return redirect()->route('table-dataUsers')->with(['sukses' => 'Data Berhasil Di Delete']);
    }
}
