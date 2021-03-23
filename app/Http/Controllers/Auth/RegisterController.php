<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Request as PostRequest;
// use Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public $validateRules = [
        'username'=>'required|string|min:4|max:12',
        'mail'=>'required|string|email|min:4|max:12|unique:users',
        'password'=>'required|string|min:4|max:12|confirmed',
    ];

    public $validateMessages = [
        "required" => "4文字以上、12文字以内で入力して下さい。",
        "email" => "メールアドレスの形式で入力してください。",
        "confirmed" => "パスワードが一致しません。",
    ];

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = PostRequest::all();
            $val = Validator::make(
                $data,
                $this->validateRules,
                $this->validateMessages
                );
        if($val->fails()){
            return redirect('/register')->withErrors($val)->withInput();
        }else {
            return view('auth.added');
        }
    }
    return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
