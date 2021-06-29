<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MasterUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserData()
    {

        //   $user = MasterUser::latest()->get();
        $user = DB::connection('pgsql2')->table('users')->get();
        return response([
            'success' => true,
            'message' => 'List All User',
            'data' => $user
        ], 200);
    }

    public function getUser()
    {

        $user = User::latest()->get();
        return response([
            'success' => true,
            'message' => 'List All User db central kantin',
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

    public function logout()
    {
        return response()->json([
            'success' => true,
            'message' => 'Berhasil logout'
        ]);
    }

    public function loginService(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            $respon = [
                'status' => 'error',
                'msg' => 'Validator error',
                'errors' => $validate->errors(),
                'content' => null,
            ];
            return response()->json($respon, 200);
        } else {
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                $respon = [
                    'status' => 'error',
                    'msg' => 'Unathorized',
                    'errors' => null,
                    'content' => null,
                ];
                return response()->json($respon, 401);
            }

            // $user = User::where('email', $request->email)->first();
            $user = DB::connection('pgsql2')->table('users')->where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception('Error in Login');
            }

            $tokenResult = $user->createToken('token-auth')->plainTextToken;
            $respon = [
                'status' => 'success',
                'msg' => 'Login successfully',
                'errors' => null,
                'content' => [
                    'status_code' => 200,
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'nama' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                ]
            ];
            return response()->json($respon, 200);
        }
    }
}
