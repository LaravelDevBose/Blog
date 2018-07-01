<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use App\Mail\EmailConfirmation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required',
            'phoneNo' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        // dd($data);
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phoneNo' => $data['phoneNo'],
            'avater'=>'public/backend/assets/images/professor.png',
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $report = $this->validator($request->all());
        if($report->passes()){

            //now store Acount Section infroamtion with shop id
            $data = $this->create($request->all())->toArray();

            //generate a 25 lenth string Token
            $data['token']= str_random(25);

            //find the information where data id will match then store the token
            $user = User::find($data['id']);
            $user->token = $data['token'];
            $user->save();

            //create a mail for Account Holder  with token
            Mail::send(new EmailConfirmation($user));

            //redirect Account holder to login page with Success message and Check the email and Confirm his Account
            return redirect()->back()->with('success', 'Confirmation mail has been send. please check your mail.');

        }

        return redirect()->back()->withErrors($report)->withInputs($request->all());
    }

    public function confirmation($token){
        $user= User::where('token', $token)->first();
       
        if(!empty($user)){
            $data= User::find($user->id);
            $data->confirmed = 1;
            $data->status = 1;
            $data->token = '';
            $data->save();
            
            return redirect()->route('index')->with('success', 'Your Confirm Successfully please Login..');
        }

        return redirect()->route('index')->with('unsuccess', 'Oops Something Went Wrong');
    }
}
