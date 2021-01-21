<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;

class LoginController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function login(Request $request){
        $http = new \GuzzleHttp\Client;

//        $mahasiswa = Student::all()->where('email', $request->email)->first();
//        $dosen = Lecturer::all()->where('email', $request->email)->first();
//
//        if(!empty($mahasiswa)){
//            $mahasiswa_admin = [
//                'mahasiswa_id' => $mahasiswa->mahasiswa_id,
//                'password' => $request->password,
//                'dosen_id' => null,
//                'is_login' => '0',
//                'is_active' => '1',
//                'is_admin' => '1',
//            ];

//            $mahasiswa_not_admin = [
//                'mahasiswa_id' => $mahasiswa->mahasiswa_id,
//                'password' => $request->password,
//                'dosen_id' => null,
//                'is_login' => '0',
//                'is_active' => '1',
//                'is_admin' => '0',
//            ];

            $user = [
                'email' => $request->email,
                'password' => $request->password,
//                'student_id' => 2,
//                'dosen_id' => null,
                'is_login' => '0',
                'is_active' => '1',
                'is_admin' => '1',
            ];

            $member = [
                'email' => $request->email,
                'password' => $request->password,
//                'student_id' => 2,
//                'dosen_id' => null,
                'is_login' => '0',
                'is_active' => '1',
                'is_admin' => '0',
            ];

            $check = DB::table('mansun_users')->where('email', $request->email)->first();

            if ($check->is_active == '1'){
                if ($check->is_admin == '1'){
                    if($check->is_login == '0'){
                        if (Auth::attempt($user)) {
//                            dd($user);
                            $this->isLogin(Auth::id());
                            $response = $http->post('http://hansrichard2000.c1.biz/mansun/public/oauth/token', [
                                'form_params' => [
                                    'grant_type' => 'password',
                                    'client_id' => $this->client->id,
                                    'client_secret' => $this->client->secret,
                                    'username' => $request->email,
                                    'password' => $request->password,
                                    'scope' => '*',
                                ],
                            ]);

                            return json_decode((string) $response->getBody(), true);
                        }
                        else {
                            return response([
                                'message' => 'Login is Failed',
                            ], 401);
                        }
                    }else{
                        return response([
                            'message' => 'Account in use',
                        ], 403);
                    }
                }else{
                    if($check->is_login == '0'){
                        if (Auth::attempt($member)){
                            $this->isLogin(Auth::id());
                            $response = $http->post('http://hansrichard2000.c1.biz/mansun/public/oauth/token', [
                                'form_params' => [
                                    'grant_type' => 'password',
                                    'client_id' => $this->client->id,
                                    'client_secret' => $this->client->secret,
                                    'username' => $request->email,
                                    'password' => $request->password,
                                    'scope' => '*',
                                ],
                            ]);

                            return json_decode((string) $response->getBody(), true);
                        }
                    }else{
                        return response([
                            'message' => 'Account in use',
                        ], 403);
                    }
                }
            }else{
                return response([
                    'message' => 'Account is suspended',
                ]);
            }
//        }

//        else if (!empty($dosen)){
//
//            $dosen_admin = [
//                'dosen_id' => $dosen->dosen_id,
//                'password' => $request->password,
//                'mahasiswa_id' => null,
//                'is_login' => '0',
//                'is_active' => '1',
//                'is_admin' => '1',
//            ];
//
//            $dosen_not_admin = [
//                'dosen_id' => $dosen->dosen_id,
//                'password' => $request->password,
//                'mahasiswa_id' => null,
//                'is_login' => '0',
//                'is_active' => '1',
//                'is_admin' => '0',
//            ];
//
//
//        }


    }
    private function isLogin(int $id){
        $user = User::findOrFail($id);
        return $user->update([
            'is_login' => '1',
        ]);
    }

    public function refresh(Request $request){
        $this->validate($request, [
            'refresh_token' => 'required',
        ], [
            'refresh_token' => 'refresh token is required',
        ]);

        $http = new \GuzzleHttp\Client;

        $response = $http->post('http://hansrichard2000.c1.biz/mansun/public/oauth/token', [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,
                'refresh_token' => $request->refresh_token,
                'scope' => '*',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function logout(){
        $user = Auth::user();
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);

        $user->update([
            'is_login' => '0',
        ]);

        $accessToken->revoke();

        return response([
            'message' => 'Logged Out',
        ]);
    }

}
