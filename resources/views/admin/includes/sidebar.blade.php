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

            <div class="navigation-wrapper collapse {{ (Route::currentRouteName() =='accountSetting') ? 'in': ' ' }} " id="user-nav">
                <ul class="navigation">
                   
                    <li class="{{ (Route::currentRouteName() =='accountSetting') ? 'active': ' ' }}"><a href="{{ route('accountSetting') }}"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="icon-switch2"></i> <span>Logout</span></a></li>
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
                    <li class="{{ (Route::currentRouteName() =='admin.dashboard') ? 'active': ' ' }}"><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                 
                    
                    <li  class="{{ (Request::route()->getPrefix() =='admin/category') ? 'active': ' ' }}"><a href="{{ route('category.index') }}"><i class="icon-list"></i> <span>Category</span></a></li>
                    <li class="{{ (Request::route()->getPrefix() =='admin/post') ? 'active': ' ' }}"><a href="{{ route('post.index') }}"><i class=" icon-quill4"></i> <span>Post</span></a></li>
                    <li class="{{ (Request::route()->getPrefix() =='admin/notice') ? 'active': ' ' }}"><a href="{{ route('notice.index') }}"><i class="icon-paste2"></i> <span>Notice</span></a></li>
                    <li class="{{ (Request::route()->getPrefix() =='admin/ads') ? 'active': ' ' }}"><a href="{{ route('ads.index') }}"><i class=" icon-presentation"></i> <span>Advertisement</span></a></li>
                    <li class="{{ (Request::route()->getPrefix() =='admin/user') ? 'active': ' ' }}"><a href="{{ route('user.index') }}"><i class=" icon-users4"></i> <span>User List</span></a></li>
                    <li class="{{ (Request::route()->getPrefix() =='admin/followers') ? 'active': ' ' }}"><a href="{{ route('admin.followers.index') }}"><i class=" icon-users4"></i> <span>Follower List</span></a></li>
                    <li class="{{ (Route::currentRouteName() =='siteSetting') ? 'active': ' ' }}"><a href="{{ route('siteSetting') }}"><i class="icon-cogs"></i> <span>Site Setting</span></a></li>
                    <!-- /main -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->