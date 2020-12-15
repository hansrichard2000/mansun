<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
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

        $mahasiswa = Mahasiswa::all()->where('email', $request->email)->first();
        $dosen = Dosen::all()->where('email', $request->email)->first();

        if(!empty($mahasiswa)){
            $mahasiswa_admin = [
                'mahasiswa_id' => $mahasiswa->mahasiswa_id,
                'password' => $request->password,
                'dosen_id' => null,
                'is_login' => '0',
                'is_active' => '1',
                'is_admin' => '1',
            ];

//            $mahasiswa_not_admin = [
//                'mahasiswa_id' => $mahasiswa->mahasiswa_id,
//                'password' => $request->password,
//                'dosen_id' => null,
//                'is_login' => '0',
//                'is_active' => '1',
//                'is_admin' => '0',
//            ];

            $check = DB::table('users')->where('mahasiswa_id', $mahasiswa->mahasiswa_id)->first();

            if ($check->is_active == '1'){
                if ($check->is_admin == '1'){
                    if($check->is_login == '0'){
                        if (Auth::attempt($mahasiswa_admin)) {
                            $this->isLogin(Auth::id());
                            $response = $http->post('http://mansun.test/oauth/token', [
                                'grant_type' => 'password',
                                'client_id' => $this->client->id,
                                'client_secret' => $this->client->secret,
                                'username' => $request->email,
                                'password' => $request->password,
                                'scope' => '*',
                            ]);

                            return json_decode((string) $response->getBody(), true);
                        }
                        else {
                            return response([
                                'message' => 'Login is Failed',
                            ]);
                        }
                    }else{
                        return response([
                            'message' => 'Account in use',
                        ]);
                    }
                }else{
                    return response([
                        'message' => 'Not an Admin',
                    ]);
                }
            }else{
                return response([
                    'message' => 'Account is suspended',
                ]);
            }
        }

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

}
