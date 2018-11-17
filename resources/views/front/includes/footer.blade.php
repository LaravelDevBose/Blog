<footer style="background-image: url({{ asset('public/front/img/blog-banner.jpg') }});">
    <section class="footer-top" >
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="subscribe-panel">
                        <p>Subscribe panel</p>
                        <form class="subscribe">
                            <input type="text" class="form-control subscribe-control"  placeholder="Your Email Address....">
                            <button type="submit" class="form-control subscribe-btn">Subscribe</button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="pages">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="{{ route('social.subscribe', 'twitter') }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('social.subscribe', 'facebook') }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('social.subscribe', 'google') }}">
                                <span class="fa-stack fa-lg">
                                    <i class="fab fa-google-plus-g fa-stack-1x fa-inverse"></i>
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 right-border footer-magin">
                    <div class="thumbnail footer-menu footer-about">
                        <h4 class="text-center">আমাদের সম্পর্কে</h4>
                        <p>{{ substr($aboutUs , 0, 250)}}......</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 right-border footer-magin ">
                    <div class="thumbnail footer-top-blog">
                        <ul>
                            @foreach($selected_posts as $post)
                            <li class="footer-blog">
                                <a href="{{route('blog',$post->id) }}" >
                                    @if(!is_null($post->image))
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                    @endif
                                    <p>{{ $post->title }}
                                        <label>লেখকঃ- <span><?php echo ($post->author_type==1)? $post->author->name: $post->admin_author->name; ?></span></label>
                                    </p>

                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 footer-magin">
                    <div class="footer-about">
                        <h4 class="text-center">আমাদের ঠিকানাঃ </h4>
                        <div class="footer-address">
                            <ul>
                                <li><p>ঠিকানা :- <span>{{ $address }}</span></p></li>
                                <li><p>মোবাইল নং :- <span>{{ $phoneNo }}</span></p></li>
                                <li><p>ই-মেল :- <span>{{ $email }}</span></p></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright">
        <div class="container-fluid">
            <div class="row">
                <div class="com-md-12">
                    <p class="copyright text-muted text-center">Copyright &copy; Your Website 2018</p>
                </div>
            </div>
        </div>
    </section>

</footer>