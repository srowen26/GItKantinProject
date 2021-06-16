<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MasterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserData()
    {
 
        $user = MasterUser::latest()->get();
        return response([
            'success' => true,
            'message' => 'List All User',
            'data' => $user
        ], 200);
    }


    public function userLogin(Request $request)
    {
        $rules = [
            'username'  => 'required',
            'password'  => 'required'
        ];

        $msg = [
            'username.required'  => 'Username wajib diisi',
            'password.required'  => 'Password wajib diisi'
        ];

        $data=$request->all();

        $validator = Validator::make($data, $rules, $msg);

        $user = MasterUser::latest()->get();

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],401);
        }
        else {

            foreach ($user as $usr ) {
                $username = $usr -> username;
                $password = $usr -> password;
                
                if (in_array($username, $data) && in_array($password, $data)) {

                    return response()->json([
                        'success' => true, 
                        'message' => 'User Found!',
                    ], 200);
                }
                else {
                    return response()->json([
                        'success' => false, 
                        'message' => 'No User Found!',
                    ], 401);
                }
            }
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterUser  $masterUser
     * @return \Illuminate\Http\Response
     */
    public function show(MasterUser $masterUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterUser  $masterUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterUser $masterUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterUser  $masterUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterUser $masterUser)
    {
        //
    }

}
