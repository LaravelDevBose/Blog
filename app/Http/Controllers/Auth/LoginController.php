<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Route;
use Session;
use Socialite;
use App\Subscriber;
use App\User;
use App\SocialProvider;
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
        Session::put('route_name',Route::currentRouteName());
        return Socialite::driver($provider)->redirect('/user/home');
    }


    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $routeName = Session::get('route_name');

        try
        {
            $socialUser = Socialite::driver($provider)->user();
        }
        catch(\Exception $e)
        {
            return redirect()->back();
        }

        if($routeName == 'social.login'){
            //check if we have logged provider
            $socialProvider = SocialProvider::where('providerId',$socialUser->getId())->first();
            if(!$socialProvider)
            {
                //create a new user and provider
                $user = User::firstOrCreate([
                    'username'=>preg_replace('/\s+/', '_', $socialUser->getName()),
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'status'=>1,
                    'confirmed'=>1,
                ]);

                User::where('id', $user->id)->update(['avatar'=>$socialUser->getAvatar()]);

                $user->socialProviders()->create(
                    ['providerId' => $socialUser->getId(), 'provider' => $provider]
                );

            }
            else{
                $user = $socialProvider->user;
            }

            auth()->login($user);
            return redirect('/user/home');
        }else{
            $subscriber = Subscriber::where('subscriber_email', $socialUser->getEmail())->first();

            if(is_null($subscriber)){
                Subscriber::create(['subscriber_email'=>$socialUser->getEmail(),'providerId' => $socialUser->getId(), 'provider' => $provider]);
                return redirect('/')->with('success','Thank You For You Subscription');
            }

            return redirect('/')->with('warning','You Are Already Subscriber By Your '.$subscriber->provider.' Account');
        }


    }
}
