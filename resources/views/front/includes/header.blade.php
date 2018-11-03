<header>
    <!--nav bar Top header-->
    <section class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-4 col-md-7 col-sm-6 col-xs-12 pull-left">
                        <div class="logo ">
                            <img src="{{asset($logo)}}" alt="">
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12  pull-right">
                        <div class="user-login">
                            <form  method="POST" action="{{ route('login') }}"> {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-12 login-group">
                                    <input type="text" name="identity" class="form-control form-control-sm "
                                           placeholder="ইউজারনেম / ইমেইল">
                                </div>
                                <div class="form-group col-md-12 login-group">
                                    <input type="password" name="password" class="form-control form-control-sm password"
                                           placeholder="পাসওয়ার্ড">
                                </div>
                                <div class="form-group col-md-8 login-group">
                                    <div class="social-login-group">
                                        <ul>
                                            <li><a href=""> <i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href=""> <i class="fab fa-google-plus-g"></i></a></li>
                                            <li><a href=""> <i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-group col-md-4 login-group">
                                    <button type="submit" class="login-btn ">Submit</button>
                                </div>
                           
                        </form>
                                <div class="form-group col-md-12 login-group">
                                    <p class="login-info"><a href="{{ route('password.request') }}" class="pull-left">পাসওয়ার্ড ভুলে
                                        গেছেন?</a> <a href="{{ route('register') }}" class="pull-right">নতুন অ্যাকাউন্ট</a></p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--/nav bar Top header-->
    <!-- Navigation -->
    <section class="navBar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <nav class="navbar navbar-expand-md navbar-light ">


                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto ">
                                <li class="nav-item {{ (Route::currentRouteName() =='index') ? 'active': ' ' }} ">
                                    <a class="nav-link" href="{{ route('index') }}">প্রথম পাতা<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item {{ (Route::currentRouteName() =='selected.posts') ? 'active': ' ' }}">
                                    <a class="nav-link" href="{{ route('selected.posts') }}">নির্বাচিত পোস্ট</a>
                                </li>
                                <li class="nav-item {{ (Route::currentRouteName() =='category') ? 'active': ' ' }}">
                                    <a class="nav-link" href="{{ route('category') }}">বিষয় ভিত্তিক ব্লগ</a>
                                </li>
                            </ul>

                        </div>

                    </nav>
                    <form class="form-inline search-bar ">
                        <div class="search-group">
                            <div class="search-control">
                                <label for="blog"><i class="far fa-newspaper"></i></label>
                                <input type="radio" id="blog">
                            </div>
                            <div class="search-control">
                                <label for="blogger"><i class="fas fa-users"></i></label>
                                <input type="radio" id="blogger">
                            </div>

                        </div>
                        <input class=" search-field" type="search" placeholder="ব্লগ অনুসন্ধান" aria-label="Search">
                        <button class=" search-btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /Navigation -->
</header>