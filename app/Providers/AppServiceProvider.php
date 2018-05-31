<?php

namespace App\Providers;
use App\Setting;
use View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('*', function($view){
            $siteName = setting::where('setting_key', 'siteName')->value('setting_value');
            $logo = setting::where('setting_key', 'logo')->value('setting_value');
            $aboutUs = setting::where('setting_key', 'aboutUs')->value('setting_value');
            $address = setting::where('setting_key', 'address')->value('setting_value');
            $phoneNo = setting::where('setting_key', 'phoneNo')->value('setting_value');
            $email = setting::where('setting_key', 'email')->value('setting_value');
            $facebookLink = setting::where('setting_key', 'facebookLink')->value('setting_value');
            $twitterLink = setting::where('setting_key', 'twitterLink')->value('setting_value');
            $instagramLink = setting::where('setting_key', 'instagramLink')->value('setting_value');

            $view->with('siteName', $siteName)
                 ->with('logo', $logo)
                 ->with('address', $address)
                 ->with('phoneNo', $phoneNo)
                 ->with('email', $email)
                 ->with('facebookLink', $facebookLink)
                 ->with('twitterLink', $twitterLink)
                 ->with('instagramLink', $instagramLink)
                 ->with('aboutUs', $aboutUs);
        });

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
