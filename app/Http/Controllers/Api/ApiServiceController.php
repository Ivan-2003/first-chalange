<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Models\dataUsers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiServiceRepository;

class ApiServiceController extends Controller
{

    protected $dataUser;

    public function __construct(ApiServiceRepository $dataUser)
    {
        $this->dataUser = $dataUser;
    }

    public function indexUser(Request $request){

        return  $this->dataUser->getAllUser($request);

        // return response()->json($dataUser, 200);
    }
    
    public function storeUser(Request $request)
    {
        // $StoreUser = $this->dataUser->storeUser($request);
              
        // return response()->json($StoreUser, 200);

        return $this->dataUser->storeUser($request);
    }


    public function updateUser($request, $id) 
    
    {    
        // $editUser = $this->dataUser->updateUser($request, $id);
        
        // return response()->json($editUser);

        return $this->dataUser->UpdateUser($request,$id);
    }

    public function destroyUser($id)
    {

        return $this->dataUser->destroyUser($id);

    }
}
