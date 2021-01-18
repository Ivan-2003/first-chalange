<?php

namespace App\Http\Controllers\Backend\dataUser;

use App\Http\Models\dataUsers;
use Illuminate\Http\Request;

class dataUserRepository
{   

    public function getAllUser($filters = [], $paginate = 0){
        
        $data = dataUsers::with([]);

        if($filters['nama']){
            $data  = $data->where('nama','like','%' . $filters['nama'] . '%');
        }

        if($filters['phone']){
            $data  = $data->where('phone','like','%' . $filters['phone'] . '%');
        }

        if($filters['umur']){
            $data  = $data->where('umur','like','%' . $filters['umur'] . '%');
        }

        if($filters['alamat']){
            $data  = $data->where('alamat','like','%' . $filters['alamat'] . '%');
        }

        if($filters['email']){
            $data  = $data->where('email','like','%' . $filters['email'] . '%');
        }

        return $data->paginate(5);
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
            
            $hasil['message'] = 'Data error -> ' . $e->getCode()  . $exception->getMessage();
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
        $hasil = [
            'status' => false,
            'message' => ''
        ];
        
        try {

            if(!$id){
                $hasil['message'] = 'parameter id di perlukan';
                return $hasil;
            }
            $dataUser = $this->findDataUserById($id);
            if(!$dataUser){
                $hasil['message'] = 'user tidak di temukan';
                return $hasil;
            }
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
            $hasil['message'] = 'Data error -> ' . $exception->getMessage();
            return $hasil;
        }
    }

    //delete
    public function destroyUser($id)
    {
        $hasil = [
            'status' => false,
            'message' => ''
        ];
        try {
            
            if(!$id){
                $hasil['message'] = 'parameter id di perlukan';
                return $hasil;
            }
            $dataUser = $this->findDataUserById($id);
            if(!$dataUser){
                $hasil['message'] = 'user tidak di temukan';
                return $hasil;
            }
            $dataUser->delete();
            $hasil['status'] = true;
            $hasil['message'] = 'Data Sukses Di Delete';
            return $hasil;
        } catch (\Exception $exception) {
            $hasil['message'] = 'Data error => ' . $exception->getMessage();
            return $hasil;
        }
    }
}
