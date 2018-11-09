<footer>
    <section class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="subscribe-panel">
                        <p>Subscribe panel</p>
                        <form class="subscribe">
                            <input type="text" class="form-control subscribe-control"  placeholder="Password">
                            <button type="submit" class="form-control subscribe-btn">Subscribe</button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="pages">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
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
                    <div class="thumbnail footer-menu">
                        <ul>
                            <li><a href="{{ route('index') }}"><i class="fas fa-angle-double-right"></i> প্রথম পাতা</a></li>
                            <li><a href="{{ route('blogs') }}"><i class="fas fa-angle-double-right"></i> সকল পোস্ট</a></li>
                            <li><a href="{{ route('selected.posts') }}"><i class="fas fa-angle-double-right"></i> নির্বাচিত পোস্ট</a></li>
                            <li><a href="{{ route('category') }}"><i class="fas fa-angle-double-right"></i> বিষয় ভিত্তিক ব্লগ</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> নোটিশ বোর্ড</a></li>

                        </ul>
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
                        <h4 class="text-center">আমাদের সম্পর্কে</h4>
                        <p>{{ $aboutUs }}</p>
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