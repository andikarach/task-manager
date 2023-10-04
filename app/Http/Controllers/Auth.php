<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MyData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller{

    private $tableName = 'users';
    private $validateData = [
        'name'          => 'required',
        'email'         => 'required',
        'password'      => 'required'
    ];
    
    public function __construct(){

        $this->datetime = date('Y-m-d H:i:s');
    } 

    public function login(Request $request){

        return view('Auth/login');
    }

    public function register(Request $request){
        return view('Auth/register');
    }

    public function login_process(Request $request){

        $email      = $request->email;
        $password   = $request->password;

        $sqlcek = MyData::getCustomQuerying("SELECT * FROM users WHERE email = '" . $email ."'");

        if (!empty($sqlcek)) {
            foreach ($sqlcek as $key) {

                $userPass = $key->password;

                if ($userPass == md5($password)) {
                    // Create Session for user
                    $request->session()->put('id_user', $key->id);
                    $request->session()->put('role', $key->role);
                    $request->session()->put('email', $key->email);
                    $request->session()->put('name', $key->name);

                    return redirect()->route('task');
                } else { 
                    return back()->with(['error' => 'Wrong Password !']);
                }
            }
            
        } else {
            return back()->with(['error' => 'User doesnt exist !']);
        }

    }

    public function register_process(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect('auth/register')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'email'         => $request->email,
            'password'      => md5($request->password),
            'name'          => $request->name,
            'role'          => 'user',
            'created_at'    => $this->datetime,
            'updated_at'    => $this->datetime
        ];

        // condition where something fine
        MyData::insertData($this->tableName, $data);

        return redirect(route('auth-login'));
    }

    public function logout_process(Request $request){
        if ($request->session()->has('id_user')) {

            // Save to log data (unfinished)
            // Process

            $request->session()->forget('id_user');
            $request->session()->forget('email');
            $request->session()->forget('name');
            $request->session()->forget('role');
            $request->session()->flush();
        }

        return redirect(route('auth-login'));
    }


    
}
