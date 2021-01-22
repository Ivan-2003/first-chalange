<?php

namespace App\Http\Controllers\Backend\dataUser;

use App\Http\Models\dataUsers;
use Illuminate\Http\Request;

class dataUserRepository
{   
    //index
    public function getAllUser($filters = []){
        
        $data = dataUsers::with([]);

        if(isset($filters['nama'])){
            $data  = $data->where('nama','like','%' . $filters['nama'] . '%');
        }

        if(isset($filters['phone'])){
            $data  = $data->where('phone','like','%' . $filters['phone'] . '%');
        }

        if(isset($filters['umur'])){
            $data  = $data->where('umur','like','%' . $filters['umur'] . '%');
        }

        if(isset($filters['alamat'])){
            $data  = $data->where('alamat','like','%' . $filters['alamat'] . '%');
        }

        if(isset($filters['email'])){
            $data  = $data->where('email','like','%' . $filters['email'] . '%');
        }

        return $data->paginate(5);
    }

    //create
    public function storeUser($request)
    {
        $result = [
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
            $result['status']        = true;
            $result['message']       = 'Data Sukses Di Tambahkan';
            return $result;
        } catch (\Exception $exception) {
            $result['message'] = 'Input Data error Silahkan Cek Kembali, ' . $exception->getMessage();
            return $result;
        }
    }

    //update
    public function findDataUserById($id)
    {
        return dataUsers::with([])->find($id);
    }

    public function updateUser($request, $id)
    {
        $result = [
            'status' => false,
            'message' => ''
        ];
        
        try {

            if(!$id){
                $result['message'] = 'parameter id di perlukan';
                return $result;
            }
            $dataUser = $this->findDataUserById($id);
            if(!$dataUser){
                $result['message'] = 'user tidak di temukan';
                return $result;
            }
            $dataUser->nama             = $request->nama;
            $dataUser->country_code     = $request->country_code;
            $dataUser->phone            = $request->phone;
            $dataUser->umur             = $request->umur;
            $dataUser->alamat           = $request->alamat;
            $dataUser->email            = $request->email;
            $dataUser->save();
            $result['status']   = true;
            $result['message']  = 'Data Sukses Di Update';
            return $result;
        } catch (\Exception $exception) {
            $result['message'] = 'Update Data error Silahkan Cek Kembali, ' . $exception->getMessage();
            return $result;
        }
    }

    //delete
    public function destroyUser($id)
    {
        $result = [
            'status' => false,
            'message' => ''
        ];
        try {
            
            if(!$id){
                $result['message'] = 'parameter id di perlukan';
                return $result;
            }
            $dataUser = $this->findDataUserById($id);
            if(!$dataUser){
                $result['message'] = 'user tidak di temukan';
                return $result;
            }
            $dataUser->delete();
            $result['status'] = true;
            $result['message'] = 'Data Sukses Di Delete';
            return $result;
        } catch (\Exception $exception) {
            $result['message'] = 'Delete Data error Silahkan Cek Kembali, ' . $exception->getMessage();
            return $result;
        }
    }
}
