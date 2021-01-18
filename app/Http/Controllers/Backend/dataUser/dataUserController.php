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
    public function indexUser(Request $request){
        $filters    = $request->only([
            'nama', 'phone', 'umur', 'alamat','email'
        ]);
        $dataUser  = $this->dataUser->getAllUser($filters);
        return view('backend.Users.indexUsers', compact('dataUser','filters'));
    }

    //create
    public function createUser() 
    {
        return view('backend.Users.createUsers');
    }

    public function storeUser(StoreDataUsersRequest $request) 
    {
        $StoreUser  = $this->dataUser->storeUser($request);

        if($StoreUser['status']) {
            return redirect()->route('users-create')->with(['sukses' => $StoreUser
            ['message']]);
        }else{
            return redirect()->route('users-create')->with(['gagal' => $StoreUser
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
        $editUser = $this->dataUser->updateUser($request, $id);
        if($editUser['status']) {
            return redirect()->route('table-dataUsers')->with(['sukses' => $editUser
            ['message']]);
        }else {
            return redirect()->route('table-dataUsers')->with(['gagal' => $editUser
            ['message']]);
        }
    }

    //delete
    public function destroyUser($id)
    {
        $destroyUser = $this->dataUser->destroyUser($id);

        if($destroyUser['status']) {
            return redirect()->route('table-dataUsers')->with(['sukses' => $destroyUser
            ['message']]);
        } else {
            return redirect()->route('table-dataUsers')->with(['gagal' => $destroyUser
            ['message']]);
        }
    }
}
