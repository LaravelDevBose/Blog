<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <?php $avater = Auth::User()->avater;  if(!file_exists($avater)){$avater ='public/backend/assets/images/professor.png'; }?>
                                  
                    <img src="{{ asset($avater) }}" style="width: 80px; margin: 0 auto;" class="img-circle img-responsive" alt="">
                    
                    <h6>{{ Auth::user()->name }}</h6>
                    <span class="text-size-small">{{ Auth::User()->bio }}</span>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse {{ (Route::currentRouteName() =='user.accountSetting') ? 'in': ' ' }} " id="user-nav">
                <ul class="navigation">
                   
                    <li class="{{ (Route::currentRouteName() =='user.accountSetting') ? 'active': ' ' }}"><a href="{{ route('user.accountSetting') }}"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }} "><i class="icon-switch2"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{ (Route::currentRouteName() =='user.dashboard') ? 'active': ' ' }}"><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                 
                    <li class="{{ (Request::route()->getPrefix() =='user/blog') ? 'active': ' ' }}">
                    
                        <a href="#"><i class="icon-books"></i> <span>Your Post</span></a>
                        <ul>
                            <li class="{{ (Route::currentRouteName() =='blog.create') ? 'active': ' ' }}"><a href="{{ route('blog.create') }}"><i class="icon-pen-plus"></i> Create Post </a></li>
                            <li class="{{ (Route::currentRouteName() =='blog.index') ? 'active': ' ' }}"><a href="{{ route('blog.index') }}" id="layout1"><i class="icon-newspaper"></i> View Post</a></li>
                           
                        </ul>
                    </li>
                    <!-- /main -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->