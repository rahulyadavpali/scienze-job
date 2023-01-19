@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>{{ $blog->title }}</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/blog') }}">Blog</a> <i class="fa fa-angle-right"></i></li>
                                    <li>{{ $blog->title }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jp blog_cate section Wrapper Start -->
    <div class="jp_blog_cate_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="jp_blog_cate_left_main_wrapper">
                                <div class="jp_first_blog_post_main_wrapper">
                                    <div class="jp_first_blog_post_img blog_detail">
                                        <img src="{{ url('upload/blog/'.$blog->feature_img) }}" class="img-responsive" alt="blog_img" />
                                    </div>
                                    <div class="jp_first_blog_post_cont_wrapper">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-calendar"></i> &nbsp;&nbsp; {{ $blog->posting_date }}</a></li>
                                            <li><a href="#"><i class="fa fa-clone"></i> &nbsp;&nbsp; {{ $blog->category }}</a></li>
                                        </ul>
                                        <h3><a href="javascript:void(0)">{{ $blog->title }}</a></h3>
                                        {!! $blog->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="jp_blog_single_client_main_wrapper">
                                <div class="jp_blog_single_client_main_section">
                                    <div class="jp_blog_single_client_cont">
                                        <h3>{{ $blog->author_name }}</h3>
                                        <p>{{ $blog->author_comment }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('front.footer')