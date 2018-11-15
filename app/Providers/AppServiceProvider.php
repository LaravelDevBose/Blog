<?php

namespace App\Providers;
use App\Setting;
use App\ReadPost;
use App\Post;
use App\Like;
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
            $banner = setting::where('setting_key', 'banner')->value('setting_value');
            $top_ads = setting::where('setting_key', 'top_ads')->value('setting_value');
            $right_ads = setting::where('setting_key', 'right_ads')->value('setting_value');
            $aboutUs = setting::where('setting_key', 'aboutUs')->value('setting_value');
            $address = setting::where('setting_key', 'address')->value('setting_value');
            $phoneNo = setting::where('setting_key', 'phoneNo')->value('setting_value');
            $email = setting::where('setting_key', 'email')->value('setting_value');
            $facebookLink = setting::where('setting_key', 'facebookLink')->value('setting_value');
            $twitterLink = setting::where('setting_key', 'twitterLink')->value('setting_value');
            $instagramLink = setting::where('setting_key', 'instagramLink')->value('setting_value');

            $view->with('siteName', $siteName)
                 ->with('logo', $logo)
                 ->with('banner', $banner)
                 ->with('top_ads', $top_ads)
                 ->with('right_ads', $right_ads)
                 ->with('address', $address)
                 ->with('phoneNo', $phoneNo)
                 ->with('email', $email)
                 ->with('facebookLink', $facebookLink)
                 ->with('twitterLink', $twitterLink)
                 ->with('instagramLink', $instagramLink)
                 ->with('aboutUs', $aboutUs);
        });

        view::composer('front.includes.footer', function($view){
            $selected_posts = Post::where('status', 1)->where('selected',1)->orderBy('id','desc')->take('5')->get();
            $view->with('selected_posts', $selected_posts);
                 
        });

        view::composer('front.includes.rightSidebar', function($view){
            $most_like_posts = Like::orderBy('like', 'desc')->take('5')->get();
            $most_read_posts = ReadPost::orderBy('reading_count', 'desc')->take('5')->get();
            $view->with('most_like_posts', $most_like_posts)->with('most_read_posts', $most_read_posts);

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
