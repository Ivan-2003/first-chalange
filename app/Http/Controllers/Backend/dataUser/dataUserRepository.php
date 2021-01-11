<?php

namespace App\Http\Controllers\backend\dataUser;

use App\Http\Models\dataUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class dataUserRepository
{   
    //
    public function getAllUser ($search = []){
        $data = dataUsers::with([]);
        
        if(isset($search['email'])){
            $data   =   $data->where('email', $search['email']);
        }
        return $data->get();
    }
    
    //
    public function storeUsers (Request $request)
    {
        Validator::make($request->all(),
        [
            'nama' => 'required|min:2',
            'umur' => 'required|min:1',
            'alamat' => 'required|min:4',
            'email' => 'required|unique:data_users,email'
        ])->validate();

        dataUsers::create([
            'nama'    =>  $request->nama,
            'umur'    =>  $request->umur,
            'alamat'  =>  $request->alamat,
            'email'   =>  $request->email,  
        ]);
    }
    
    //
    public function editUser($id){
        return dataUsers::with([])->find($id);
    }

    public function updateUser (Request $request, dataUsers $dataUsers)
    {
        Validator::make($request->all(),
        [
            'nama' => 'required|min:2',
            'umur' => 'required|min:1',
            'alamat' => 'required|min:4',
            'email' => 'required|min:5'
        ])->validate();

        $dataUsers = dataUsers::findOrFail($dataUsers->id);

        $dataUsers->update([
            'nama'    =>  $request->nama,
            'umur'    =>  $request->umur,
            'alamat'  =>  $request->alamat,
            'email'   =>  $request->email,  
        ]);
    }

    //
    public function destroydUsers ($id) 
    {
        $dataUser = dataUsers::find($id);
        $dataUser->delete();
    }
}
