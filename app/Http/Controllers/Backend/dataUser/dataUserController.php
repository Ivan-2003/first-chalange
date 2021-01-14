<?php

namespace App\Http\Controllers\Backend\dataUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\dataUser\dataUserRepository;
use App\Http\Requests\StoreDataUsersRequest;
use App\Http\Requests\UpdateDataUsersRequest;

class dataUserController extends Controller
{
    protected $dataUser;

    public function __construct()
    {
        $this->dataUser = new dataUserRepository();
    }

    //index
    public function indexUser(Request $request) {
        $search = $request->only(['email']);
        $dataUser = $this->dataUser->getAllUser($search);
        return view('backend.Users.indexUsers', compact('dataUser','search'));
    }

    //create
    public function createUser() 
    {
        return view('backend.Users.createUsers');
    }

    public function storeUser(StoreDataUsersRequest $request) 
    {
        $data  = $this->dataUser->storeUser($request);

        if($data['status']) {
            return redirect()->route('table-dataUsers')->with(['sukses' => $data
            ['message']]);
        }else{
            return redirect()->route('table-dataUsers')->with(['gagal' => $data
            ['message']]);
        }
    }

    //update
    public function editUser($id)
    {
        $EditdataUser = $this->dataUser->findDataUserById($id);
        return view('backend.Users.editUsers', compact('EditdataUser'));
    }

    public function updateUser(UpdateDataUsersRequest $request, $id) 
    
    {    
        $data = $this->dataUser->updateUser($request, $id);
        if($data['status']) {
            return redirect()->route('table-dataUsers')->with(['sukses' => $data
            ['message']]);
        }else {
            return redirect()->route('table-dataUsers')->with(['gagal' => $data
            ['message']]);
        }
    }

    //delete
    public function destroyUser($id)
    {
        $data = $this->dataUser->destroyUser($id);

        if($data['status']) {
            return redirect()->route('table-dataUsers')->with(['sukses' => $data
            ['message']]);
        } else {
            return redirect()->route('table-dataUsers')->with(['gagal' => $data
            ['message']]);
        }
    }
}
