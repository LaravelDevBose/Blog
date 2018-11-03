<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar-right-border">
    <div class="left-sidebar">

        <div class="row">
            <div class="col-md-12">
                <div class="list-group side-menu" >
                    <a class="list-group-item list-group-item-action  {{ (Route::currentRouteName() =='index') ? 'active': ' ' }}"  href="{{ route('index') }}" ><i class="fas fa-home"></i> প্রথম পাতা</a>
                    <a class="list-group-item list-group-item-action {{ (Route::currentRouteName() =='blogs') ? 'active': ' ' }}" href="{{ route('blogs') }}" > <i class="fas fa-list"></i> সকল পোস্ট</a>
                    <a class="list-group-item list-group-item-action {{ (Route::currentRouteName() =='selected.posts') ? 'active': ' ' }}"  href="{{ route('selected.posts') }}"><i class="fas fa-tasks"></i> নির্বাচিত পোস্ট</a>
                    <a class="list-group-item list-group-item-action {{ (Route::currentRouteName() =='category') ? 'active': ' ' }}"  href="{{ route('category') }}" ><i class="fas fa-list-ol"></i> বিষয় ভিত্তিক ব্লগ</a>
                    <a class="list-group-item list-group-item-action"  href="#" ><i class="far fa-clipboard"></i> নোটিশ বোর্ড</a>
                </div>
                <div class="sidebar-login">
                    <h5 class="text-center bg-info">
                        Account
                    </h5>
                    <div class="card-body">
                        <form class="sidebar-login-form" method="POST" action="{{ route('login') }}"> {{ csrf_field() }}
                        
                            <div class="form-row align-items-center">
                                <div class="col-md-12 my-1">
                                    <div class="input-group">
                                        <input type="text" name="identity" class="form-control"  placeholder="ইউজারনেম / ইমেইল">
                                    </div>
                                </div>
                                <div class="col-md-12 my-1">
                                    <div class="input-group">
                                        <input type="text" name="password" class="form-control"  placeholder="পাসওয়ার্ড">
                                    </div>
                                </div>
                                <!-- <div class="col-auto col-sm-6 my-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Remember me
                                        </label>
                                    </div>
                                </div> -->
                                <div class="clearfix"></div>
                                <div class="col-auto col-sm-12 my-1 pull-right">
                                    <button type="submit" class="btn-block" >Submit</button>
                                </div>
                            </div>

                        </form>
                        <div class="col-sm-12 social-login-group">
                            <ul>
                                <li><a href=""> <i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""> <i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href=""> <i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>

                        <div class=" col-sm-12 sidebar-login-help ">
                            <p >
                                <a href="{{ route('password.request') }}" class="pull-left" >পাসওয়ার্ড ভুলে গেছেন?</a>
                                <a href="{{ route('register') }}" class="pull-right" >নতুন অ্যাকাউন্ট</a>
                            </p>
                        </div>

                    </div>
                </div>
                <div id="accordion">

                    <div class="card-header bg-info left-current-user" id="headingOne"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="text-center ">
                            অনলাইনে আছেন
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="current-user-info">
                            <ul class="list-group total-info">
                                <li class="list-group-item"><span class="text-bold">৯৬</span> জন ব্লগার </li>
                                <li class="list-group-item"><span class="text-bold">১২০৫</span> জন ভিজিটর </li>
                                <li class="list-group-item"><span class="text-bold">১১৫০</span> জন মোবাইল থেকে </li>
                            </ul>

                            <ul class="list-group current-user">
                                <li class=""><i class="fas fa-circle"></i>Cras justo odio</li>
                                <li class=""><i class="fas fa-circle"></i>Dapibus ac facilisis in</li>
                                <li class=""><i class="fas fa-circle"></i>Morbi leo risus</li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>