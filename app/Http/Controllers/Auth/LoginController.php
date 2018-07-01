<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Session;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    // public function showLoginForm()
    // {
    //     return view('user.login.login');
    // }

    public function login( Request $request){
        //Validate the form date
        $this->validate($request, [
            'identity'=>'required',
            'password'=>'required|min:6',
        ]);

        //attempt to log the user in
        if (Auth::guard('web')->attempt([$this->username()=>$request->identity, 'password'=>$request->password], $request->remember)) {
            //if Sucessfull, than redirect to their intended location
           
           //if email not confirm than redirect back index page with message
            if(Auth::user()->confirmed != '1'){
                Auth::guard('web')->logout();
                Session::flash('warning','Plesse Confirm Your Email Address');

                return redirect()->back();
            }

            //if email not confirm than redirect back index page with message
            if(Auth::user()->status != '1'){
                Auth::guard('web')->logout();
                Session::flash('warning','Your Account Are Block For More Info Contact With Admin!');

                return redirect()->back();
            }


            return redirect()->intended(route('user.dashboard'));
        }
        
        //if Unsucessfull, then redirect back to their login with the form data
        return redirect()->back()->with('unsucces', 'Email Or UserName And Password Not Match !');

    }


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('index');
    }

    /**
     * Check either username or email.
     * @return string
     */
    public function username()
    {
        $identity  = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {   
        return Socialite::driver($provider)->redirect('/user/home');
    }


    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        $routeName = Session::get('socialRouteName');
        

        try
        {
            $socialUser = Socialite::driver($provider)->user();
            
            

            // return '<img src="'.$socialUser->getAvatar().'">' ;
        }
        catch(\Exception $e)
        {
            return redirect()->back();

        }
        //check if we have logged provider
        $socialProvider = SocialProvider::where('providerId',$socialUser->getId())->first();
        if(!$socialProvider)
        {
            

            //create a new user and provider
            $user = User::firstOrCreate(['username'=>$socialUser->getName(),'name' => $socialUser->getName(), 'email' => $socialUser->getEmail()]);

            User::where('id', $user->id)->update(['avater'=>$socialUser->getAvatar()]);

            $user->socialProviders()->create(
                ['providerId' => $socialUser->getId(), 'provider' => $provider]
            );

            $details= New ConsumerDetail;
            $details->userId = $user->id;
            $details->save();

            $payment= New PaymentDetail;
            $payment->userId = $user->id;
            $payment->save();
        }
        else{
            $user = $socialProvider->user;
        }

        auth()->login($user);
        return redirect('/consumer/home');

    }
}
