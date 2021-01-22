<?php

namespace App\Http\Controllers\Api;

use App\Http\Models\dataUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Backend\dataUser\dataUserRepository;

class ApiServiceRepository
{   
    //index
    public function getAllUser(Request $request)
    {
        $dataUser = new dataUserRepository;
        return $dataUser->getAllUser($request->all());
    }

    // Create
    public function storeUser($request)
    {
        $validasi = [
            'nama'          => 'required|min:2',
            'country_code'  => 'required|max:2',
            'phone'         => 'required|min:10',
            'umur'          => 'required|min:1',
            'alamat'        => 'required|min:4',
            'email'         => 'required|unique:data_users,email'
        ];

        $validator  =  Validator::make($request->all(), $validasi);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        try{
            $dataUser = new dataUserRepository();
            return $dataUser->storeUser($request);
        } catch (\Exception $exception)
        {
            $result['message'] = 'Data Gagal di Input, ' . $exception->getMessage();
            return $result;
        }

        return response()->json([
            'message' => 'Data Berhasil Di Input',
            'data'    => $dataUser
        ], 200);
    }

    //update
    public function updateUser($request, $id)
    {
        $validasi = [
            'nama'          => 'required|min:2',
            'country_code'  => 'required|max:2',
            'phone'         => 'required|min:10',
            'umur'          => 'required|min:1',
            'alamat'        => 'required|min:4',
            'email'         => 'required|unique:data_users,email'
        ];

        $validator  =  Validator::make($request->all(), $validasi);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        try{
            $dataUser = $this->dataUser->updateUser($request, $id);
        } catch (\Exception $exception)
        {
            $result['message'] = 'Data Gagal Di Update, ' . $exception->getMessage();
            return $result;
        }

        return response()->json([
            'message' => 'Data Berhasil Di Update',
            'data'    => $dataUser
        ], 200);
    }

    //delete
    public function destroyUser($id)
    {
        try{
            $dataUser = $this->dataUser->updateUser($id);
        } catch (\Exception $exception)
        {
            $result['message'] = 'Data Gagal Di Delete, ' . $exception->getMessage();
            return $result;
        }

        return response()->json([
            'message' => 'Data Berhasil Di Delete',
            'data'    => $dataUser
        ], 200);
    }


}