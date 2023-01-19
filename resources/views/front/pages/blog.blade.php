@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Blog Categories</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Blog</li>
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
                        <?php if (count($blog) > 0){
                            foreach ($blog as $blogs){ ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog_div">
                                    <div class="jp_blog_cate_left_main_wrapper">
                                        <div class="jp_first_blog_post_main_wrapper">
                                            <div class="jp_first_blog_post_img blog_img">
                                                <img src="{{ url('upload/blog/'.$blogs->feature_img) }}" class="img-responsive" alt="blog_img" />
                                            </div>
                                            <div class="jp_first_blog_post_cont_wrapper">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-calendar"></i> &nbsp;&nbsp; {{ $blogs->posting_date }}</a></li>
                                                </ul>
                                                <h3><a href="{{ route('blog.show',[$blogs->id]) }}">{{ $blogs->title }}</a></h3>
                                                <p>{{ $blogs->sub_para }}..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }else{ ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h5>No Blog Found</h5>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('front.footer')