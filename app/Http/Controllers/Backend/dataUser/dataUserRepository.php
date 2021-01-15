<?php

namespace App\Http\Controllers\Backend\dataUser;

use App\Http\Models\dataUsers;
use Illuminate\Http\Request;

class dataUserRepository
{   
    //index
    public function getAllUser($search = [])
    {
        $data = dataUsers::with([]);
        
        if(isset($search['email'])){
            $data   =   $data->where('email', $search['email']);
        }
        return $data->get();
    }

    //create
    public function storeUser(Request $request)
    {
        $hasil = [
            'status' => false,
            'message' => ''
        ];

        try {
            $reload = new dataUsers();
            $reload->nama           = $request->nama;
            $reload->country_code   = $request->country_code;
            $reload->phone          = $request->phone;
            $reload->umur           = $request->umur;
            $reload->alamat         = $request->alamat;
            $reload->email          = $request->email;
            $reload->save();
            $hasil['status'] = true;
            $hasil['message'] = 'Data Sukses Di Tambahkan';
            return $hasil;
        } catch (\Exception $exception) {
            $hasil['message'] = 'function error -> ' . $exception->getMessage();
            return $hasil;
        }
    }

    //update
    public function findDataUserById($id)
    {
        return dataUsers::with([])->find($id);
    }
    public function updateUser($request, $id)
    {
        // find data detail user
        $dataUser = $this->findDataUserById($id);

        $hasil = [
            'status' => false,
            'message' => ''
        ];
        
        try {
            $dataUser->nama             = $request->nama;
            $dataUser->country_code     = $request->country_code;
            $dataUser->phone            = $request->phone;
            $dataUser->umur             = $request->umur;
            $dataUser->alamat           = $request->alamat;
            $dataUser->email            = $request->email;
            $dataUser->save();
            $hasil['status']   = true;
            $hasil['message']  = 'Data Sukses Di Update';
            return $hasil;
        } catch (\Exception $exception) {
            $hasil['message'] = 'function error -> ' . $exception->getMessage();
            return $hasil;
        }
    }

    //delete
    public function destroyUser($id)
    {
        $dataUser = $this->findDataUserById($id);
        $hasil = [
            'status' => false,
            'message' => ''
        ];
        try {
            // dia akan mendelete ketika user id nya ada
            // if
            $dataUser->delete();
            $hasil['status'] = true;
            $hasil['message'] = 'Data Sukses Di Delete';
            // else data user tidak di temukan
            return $hasil;
        } catch (\Exception $exception) {
            $hasil['message'] = 'function error => ' . $exception->getMessage();
            return $hasil;
        }
    }
}
