<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MasterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'email'  => 'required',
            'password'  => 'required'
        ];

        $msg = [
            'email.required'  => 'Username wajib diisi',
            'password.required'  => 'Password wajib diisi'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules, $msg);

        $user = MasterUser::latest()->get();

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 401);
        } else {

            foreach ($user as $usr) {
                $email = $usr->email;
                $password = $usr->password;

                if (in_array($email, $data) && in_array($password, $data)) {

                    return response()->json([
                        'success' => true,
                        'message' => 'User Found!',
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'No User Found!',
                    ], 401);
                }
            }
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
            'remember_me' => ['boolean']
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'error' => true,
                    'validations' => $validator->errors()
                ], 422);
        }

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Email atau Password salah'
                ], 401);
        }


        $data = MasterUser::where('email', '=', $request->email)->first();
        if ($data) {
            return response()
                ->json([
                    'success' => true,
                    'data_user' => [
                        'id' => $data->id,
                        'email' => $data->email,
                        'password' => $data->password,
                        'name' => $data->name,
                        'nrp' => $data->nrp,
                    ],

                ]);
        } else {
            return response()
                ->json([
                    'success' => true,
                    'data_user' => [
                        'id' => null,
                        'email' => null,
                        'emaipasswordl' => null,
                        'name' => null,
                        'nrp' => null,
                    ],
                ]);
        }
    }

    public function logout()
    {
        return response()->json([
            'success' => true,
            'message' => 'Berhasil logout'
        ]);
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
