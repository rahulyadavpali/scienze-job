<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $metaTitle }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="{{ $metaDescription }}" />
    <meta name="keywords" content="{{ $keywords }}" />
    <meta name="MobileOptimized" content="320" />

    <!--srart theme style -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/fonts.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/owl.theme.default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/media.css') }}" />

    <!-- favicon links -->
    <link rel="shortcut icon" type="image/png" href="{{ url('assets/images/header/favicon.ico') }}" />

    <!-- Linked-JS-Start -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

</head>
<body>
    <!-- preloader Start -->
    <div id="preloader">
        <div id="status">
            <img src="{{ url('assets/images/header/loadinganimation.gif') }}" id="preloader_image" alt="loader" />
        </div>
    </div>

    <!-- Header Wrapper Start -->
    <div class="jp_top_header_img_wrapper" style="background-image: url({{ url('upload/gallery/'.$banner->image) }});">
        <div class="jp_slide_img_overlay"></div>
        <div class="gc_main_menu_wrapper home_header rheader_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-xs hidden-sm hdr_logo_div">
                        <div class="gc_header_wrapper">
                            <div class="gc_logo hdr_logo hm_hdr_logo">
                                <a href="{{ url('/') }}">
                                    <figure>
                                        <img src="{{ url('upload/gallery/'.$logo) }}" alt="Scienze Jobs Logo" title="Scienze Jobs" class="img-responsive"><span>Beta</span>
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 hdr_menu_div">
                        <div class="header-area hidden-menu-bar stick" id="sticker">
                            <!-- mainmenu start -->
                            <div class="mainmenu header_mainmenu">
                                <ul class="float_left home_header_menu">
                                    <li class="has-mega gc_main_navigation">
                                        <a href="{{ url('/') }}" class="gc_main_navigation">Home</a>
                                    </li>
                                    <li class="has-mega gc_main_navigation">
                                        <a href="{{ url('/job') }}" class="gc_main_navigation">Job</a>
                                    </li>
                                    <li class="has-mega gc_main_navigation">
                                        <a href="{{ url('/plan') }}" class="gc_main_navigation">Plan</a>
                                    </li>
                                    <li class="has-mega gc_main_navigation">
                                        <a href="{{ url('/blog') }}" class="gc_main_navigation">Blog</a>
                                    </li>
                                    <li class="gc_main_navigation parent"><a href="{{ url('/contact') }}" class="gc_main_navigation">Contact</a></li>
                                </ul>
                            </div>
                            <!-- mobile menu area start -->
                            <header class="mobail_menu">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-8 col-8 rsp_hdr_logo">
                                            <div class="gc_logo hdr_logo">
                                                <a href="{{ url('/') }}">
                                                    <figure>
                                                        <img src="{{ url('upload/gallery/'.$logo) }}" alt="Scienze Jobs Logo" title="Scienze Jobs" class="img-responsive"><span>Beta</span>
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-4 col-4">
                                            <div class="cd-dropdown-wrapper">
                                                <a class="house_toggle" href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px"><g><g><path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#000000"/></g><g><path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#000000"/></g><g><path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#000000"/></g><g><path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#000000"/></g><g><path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#000000"/></g></g></svg>
												</a>
                                                <nav class="cd-dropdown">
                                                    <a href="#" class="cd-close">Close</a>
                                                    <ul class="cd-dropdown-content">
                                                        <li><a href="{{ url('/') }}">Home</a></li>
                                                        <li><a href="{{ url('/job') }}">Jobs</a></li>
                                                        <li><a href="{{ url('/plan') }}">Plan</a></li>
                                                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                                                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                                                        <?php if(Auth::user() !== null ){ ?>
                                                            <?php $user = Auth::user();
                                                            if ($user->job_id == 4){ ?>
                                                                <li><a href="{{ url('/advertiser-user') }}"><i class="fa fa-user"></i>&nbsp; Profile</a></li>
                                                            <?php }
                                                            elseif ($user->job_id == 3){ ?>
                                                                <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-user"></i>&nbsp; Admin</a></li>
                                                            <?php }
                                                            else{ ?>
                                                                <li><a href="{{ url('/user') }}"><i class="fa fa-user"></i>&nbsp; Profile</a></li>
                                                            <?php } ?>
                                                            <li><a href="#mobile_logout" onclick="$('#mobile_logout').submit();">Logout</a></li>
                                                            {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'mobile_logout']) !!}
                                                                <button type="submit">@lang('quickadmin.logout')</button>
                                                            {!! Form::close() !!}
                                                        <?php }else{ ?>
                                                            <li><a href="{{ url('/sign-up') }}">Sign Up</a></li>
                                                            <li><a href="{{ url('/user-login') }}">Login</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                        <div class="jp_navi_right_btn_wrapper rhdr_right_lgn">
                            <ul>
                                <?php if(Auth::user() !== null ){ ?>
                                    <?php $user = Auth::user();
                                    if($user->job_id == 4){ ?>
                                        <li class="pro_btn"><a href="{{ url('/advertiser-user') }}"><i class="fa fa-user"></i>&nbsp; Profile</a></li>
                                    <?php }
                                    elseif($user->job_id == 3){ ?>
                                        <li class="pro_btn"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-user"></i>&nbsp; Admin</a></li>
                                    <?php }
                                    else{ ?>
                                        <li class="pro_btn"><a href="{{ url('/user') }}"><i class="fa fa-user"></i>&nbsp; Profile</a></li>
                                    <?php } ?>
                                    <li class="lgn_btn"><a href="#logout" onclick="$('#logout').submit();"><i class="fa fa-sign-in"></i>&nbsp; Logout</a></li>
                                <?php }else{ ?>
                                    <li class="pro_btn"><a href="{{ url('/sign-up') }}"><i class="fa fa-user"></i>&nbsp; Sign Up</a></li>
                                    <li class="lgn_btn"><a href="{{ url('/user-login') }}"><i class="fa fa-sign-in"></i>&nbsp; Login</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
            <button type="submit">@lang('quickadmin.logout')</button>
        {!! Form::close() !!}

        <div class="jp_banner_heading_cont_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_job_heading_wrapper">
                            <div class="jp_job_heading">
                                <h1>{{ $banner->title }}</h1>
                                <p>{{ $banner->sub_title }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form id="job_search" action="{{ url('job-search') }}" method="POST">
                            @csrf
                            <div class="jp_header_form_wrapper">
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" name="keyword" id="keyword" placeholder="Keyword e.g. (Job Title, Description, Tags)" />
                                    @if($errors->has('keyword'))
                                        <p class="help-block seo_error">{{ $errors->first('keyword') }}</p>
                                    @endif
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <div class="jp_form_btn_wrapper">
                                        <ul>
                                            <li><button type="submit" class="nm_search_btn"><i class="fa fa-search"></i> Search</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_banner_main_jobs_wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jp_banner_jobs_categories_wrapper rem_categ">
            <div class="container">
                <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border jp_job_cate_left_border_bottom">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-flask"></i>
                        <h3><a href="javascipt:void(0)">Biology and Biotechnology</a></h3>
                    </div>
                </div>
                <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border_bottom">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-medkit"></i>
                        <h3><a href="javascipt:void(0)">Medical and Health Sciences</a></h3>
                    </div>
                </div>
                <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border_bottom">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-graduation-cap"></i>
                        <h3><a href="javascipt:void(0)">Postdoctoral Opportunities</a></h3>
                    </div>
                </div>
                <div class="jp_top_jobs_category_wrapper jp_job_cate_left_border_res">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-users"></i>
                        <h3><a href="javascipt:void(0)">Faculty Positions</a></h3>
                    </div>
                </div>
                <div class="jp_top_jobs_category_wrapper">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-university"></i>
                        <h3><a href="javascipt:void(0)">Government</a></h3>
                    </div>
                </div>
                <div class="jp_top_jobs_category_wrapper">
                    <div class="jp_top_jobs_category">
                        <i class="fa fa-th-large"></i>
                        <h3><a href="{{ url('job') }}">All Jobs</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jp first sidebar Wrapper Start -->
    <div class="jp_first_sidebar_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="row">
                        <?php if(count($top_companies) > 0){ ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="jp_hiring_slider_main_wrapper">
                                    <div class="jp_hiring_heading_wrapper"><h2>Top Institutes</h2></div>
                                    <div class="jp_hiring_slider_wrapper">
                                        <div class="owl-carousel owl-theme">
                                            <?php foreach($top_companies as $company){
                                                if($company->emploayer_id !== null){
                                                    $employer = DB::table('tb_employer')->where('id', '=', $company->emploayer_id)->get();
                                                    if($employer !== null){
                                            ?>
                                                <div class="item">
                                                    <div class="jp_hiring_content_main_wrapper">
                                                        <div class="jp_hiring_content_wrapper top_com_logo">
                                                            <img src="{{ url('upload/employer/'.$employer[0]->company_logo) }}" alt="hiring_img" />
                                                            <?php if(Auth::user() !== null ){ ?>
                                                                <h4><a href="{{ url('/employer-detail',[$employer[0]->id]) }}">{{ $employer[0]->company_name }}</a></h4>
                                                            <?php }else{ ?>
                                                                <h4><a href="{{ url('/user-login') }}">{{ $employer[0]->company_name }}</a></h4>
                                                            <?php } ?>
                                                            <p>({{ $employer[0]->city }})</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }}} ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="jp_first_right_sidebar_main_wrapper">
                        <div class="row">
                            <div class="adv_section_hm col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="jp_add_resume_wrapper">
                                    <div class="jp_add_resume_img_overlay"></div>
                                    <div class="jp_add_resume_cont resume_div">
                                        <img src="{{ url('upload/gallery/'.$logo) }}" alt="Scienze Job Logo" />
                                        <h4>Get Best Matched Jobs On your Email. Add Resume NOW!</h4>
                                        <ul>
                                            <li><a href="{{ url('/job-seeker-signup') }}"><i class="fa fa-plus-circle"></i> &nbsp;ADD RESUME</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jp first sidebar Wrapper Start -->
    <div class="jp_first_sidebar_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="cc_featured_product_main_wrapper">
                                <div class="jp_hiring_heading_wrapper jp_job_post_heading_wrapper hm_lat_jb"><h2>Latest Jobs</h2></div>
                            </div>
                            <div class="tab-content">
                                <div id="grid" class="tab-pane fade in active">
                                    <div class="row">
                                        <?php $i = 0; foreach($job as $jobs){if($i++ < 10){ ?>
                                            <div class="hm_lat_jb_div col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                                    <div class="jp_job_post_main_wrapper jp_job_post_grid_main_wrapper">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="jp_job_post_side_img job_company_logo">
                                                                    <?php $employer = DB::table('tb_employer')->where('id', '=', $jobs->employer_id)->get(); ?>
                                                                    <img src="{{ url('upload/employer/'.$employer[0]->company_logo) }}" />
                                                                </div>
                                                                <div class="jp_job_post_right_cont jp_job_post_grid_right_cont">
                                                                    <h4>
                                                                        <a href="{{ url('/job-view',[$jobs->id]) }}">{{ $jobs->job_title }}</a>
                                                                    </h4>
                                                                    <p>{{ $jobs->company_name }}</p>
                                                                    <ul>
                                                                        <li><i class="fa fa-money"></i>&nbsp; {{ $jobs->salary }}</li>
                                                                        <li><i class="fa fa-map-marker"></i>&nbsp; {{ $jobs->location }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="jp_job_post_right_btn_wrapper jp_job_post_grid_right_btn_wrapper">
                                                                    <ul>
                                                                        <?php if(Auth::user() !== null ){ ?>
                                                                            <li><a href="{{ route('auth.apply.job',[$jobs->id]) }}">Apply</a></li>
                                                                        <?php }else{ ?>
                                                                            <li><a href="{{ url('/user-login') }}">Apply</a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $i++;}} ?>
                                    </div>
                                    <div class="video_nav_img_wrapper">
                                        <div class="brows_btn hm_jb_brw_btn">
                                            <a href="{{ url('/job') }}">Browse Jobs</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(Auth::user() !== null ){ ?>
    <?php }else{ ?>
        <div class="jp_counter_main_wrapper">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_register_section_main_wrapper">
                        <div class="jp_regis_left_side_box_wrapper">
                            <div class="jp_regis_left_side_box">
                                <img src="{{ url('assets/images/content/regis_icon.png') }}" alt="icon" />
                                <h4>Are you an employer<br> seeking an employee?</h4>
                                <p></p>
                                <ul>
                                    <li><a href="{{ url('/employer-signup') }}"><i class="fa fa-plus-circle"></i> &nbsp;REGISTER AS EMPLOYER</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="jp_regis_right_side_box_wrapper">
                            <div class="jp_regis_right_img_overlay"></div>
                            <div class="jp_regis_right_side_box">
                                <img src="{{ url('assets/images/content/regis_icon2.png') }}" alt="icon" />
                                <h4>Are you a Job-seeker?</h4>
                                <p>Click the button to fill the form...</p>
                                <ul>
                                    <li><a href="{{ url('/job-seeker-signup') }}"><i class="fa fa-plus-circle"></i> &nbsp;REGISTER AS JOB-SEEKER</a></li>
                                </ul>
                            </div>
                            <div class="jp_regis_center_tag_wrapper">
                                <p>OR</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- jp first sidebar Wrapper Start -->
    <div class="jp_first_sidebar_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="cc_featured_product_main_wrapper">
                                <div class="jp_hiring_heading_wrapper jp_job_post_heading_wrapper"><h2>Other Official Jobs</h2></div>
                            </div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="best">
                                    <div class="ss_featured_products latest_jobs">
                                        <div class="owl-carousel owl-theme">
                                            <div class="item" data-hash="zero">
                                                <?php $i = 0; foreach($scrap as $scraping){if($i++ < 10){ ?>
                                                    <div class="hm_lat_jb_div col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_main_wrapper_cont2">
                                                            <div class="jp_job_post_main_wrapper jp_job_post_grid_main_wrapper">
                                                                <div class="row hm_feed_div">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <!-- <div class="jp_job_post_side_img job_company_logo">
                                                                            <img src="{{ url('/storage/website-pdf/'.$scraping->title) }}" />
                                                                        </div> -->
                                                                        <div class="jp_job_post_right_cont hm_feed_txt">
                                                                            <h4><a href="{{ url('/user-login') }}">{{ $scraping->title }}</a></h4>
                                                                            <p><a href="{{ $scraping->web_url }}" target="_blank">{{ $scraping->website_name }}</a></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="jp_job_post_right_btn_wrapper">
                                                                            <ul>
                                                                                <li><a href="{{ \Storage::disk('website-pdf')->url($scraping->pdf) }}" target="_blank">View Detail</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php $i++;}} ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video_nav_img_wrapper">
                                        <div class="brows_btn">
                                            <a href="{{ url('/other-official-jobs') }}">Browse All Jobs</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jp counter Wrapper Start -->
    <div class="jp_counter_main_wrapper">
        <div class="container">
            <div class="gc_counter_cont_wrapper">
                <div class="count-description">
                    <?php $availablejobs = DB::table('tb_jobs')->get(); ?>
                    <span class="timer"><?php echo count($availablejobs); ?></span><i class="fa fa-plus"></i>
                    <h5 class="con1">Jobs Available</h5>
                </div>
            </div>
            <div class="gc_counter_cont_wrapper2">
                <div class="count-description">
                    <?php $members = DB::table('users')->get(); ?>
                    <span class="timer"><?php echo count($members); ?></span><i class="fa fa-plus"></i>
                    <h5 class="con2">Members</h5>
                </div>
            </div>
            <div class="gc_counter_cont_wrapper3">
                <div class="count-description">
                    <?php $resumes = DB::table('tb_jobseeker')->get(); ?>
                    <span class="timer"><?php echo count($resumes); ?></span><i class="fa fa-plus"></i>
                    <h5 class="con3">Resumes</h5>
                </div>
            </div>
            <div class="gc_counter_cont_wrapper4">
                <div class="count-description">
                    <?php $company_count = DB::table('tb_employer')->get(); ?>
                    <span class="timer"><?php echo count($company_count); ?></span><i class="fa fa-plus"></i>
                    <h5 class="con4">Institute</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- jp Best deals Wrapper Start -->
    <div class="jp_best_deals_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_best_deal_slider_main_wrapper">
                        <div class="jp_best_deal_heading_wrapper">
                            <h2>Offering the best Deals</h2>
                        </div>
                        <div class="jp_best_deal_slider_wrapper">
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <div class="row">
                                        @foreach($offer as $offers)
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 offer_div">
                                                <div class="jp_best_deal_main_cont_wrapper">
                                                    <div class="jp_best_deal_icon_sec offer_div_icon">
                                                        <img style="width: 35px;height: 35px;object-fit: contain;object-position: center;" src="{{ url('upload/icon/'.$offers->icon) }}" />
                                                    </div>
                                                    <div class="jp_best_deal_cont_sec">
                                                        <h4><a href="javascript:void(0)">{!! $offers->title !!}</a></h4>
                                                        {!! $offers->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jp Client Wrapper Start -->
    <?php if(count($review) > 0){ ?>
        <div class="jp_client_slider_main_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_first_client_slider_wrapper">
                            <div class="jp_first_client_slider_img_overlay"></div>
                            <div class="jp_client_heading_wrapper">
                                <h2>What Clients Say?</h2>
                            </div>
                            <div class="jp_client_slider_wrapper">
                                <div class="owl-carousel owl-theme">
                                    <?php foreach($review as $reviews){ ?>
                                        <div class="item">
                                            <div class="jp_client_slide_show_wrapper">
                                                <div class="jp_client_slider_img_wrapper">
                                                    <?php if($reviews->role_type == 1){ ?>
                                                        <img src="{{ url('upload/employer/'.$reviews->image) }}" alt="client_img" />
                                                    <?php }else{ ?>
                                                        <img class="review_user" src="{{ url('upload/applicant-image/'.$reviews->image) }}" alt="client_img" />
                                                    <?php } ?>
                                                </div>
                                                <div class="jp_client_slider_cont_wrapper">
                                                    <p>“{{ $reviews->review_text }}”</p>
                                                    <span class="client_btn">~ <b>
                                                        <?php if($reviews->role_type == 1){ ?>
                                                            <a href="{{ url('/employer-detail',[$reviews->employer_id]) }}" target="_blank">{{ $reviews->name }}</a>
                                                        <?php }else{ ?>
                                                            <a>{{ $reviews->name }}</a>
                                                        <?php } ?>
                                                    </b></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- FAQ-Section -->
    <?php if(count($faq) > 0){ ?>
        <div class="aboutus_page_2_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="aboutus_text_section abt_txt_page_2">
                            <h2>FAQ</h2>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="accordion_wrapper abt_page_2_wrapper">
                            <div class="panel-group" id="accordion_threeLeft">
                                <?php foreach ($faq as $faqs){ ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion_threeLeft" href="#collapseTwentyLeft{{ $faqs->id }}" aria-expanded="false">{{ $faqs->title }}</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwentyLeft{{ $faqs->id }}" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                            <div class="panel-body">{!! $faqs->description !!}</div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- jp pricing Wrapper Start -->
    <?php if(count($plan) > 0){ ?>
        <div class="jp_pricing_main_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_best_deal_slider_main_wrapper">
                            <div class="jp_best_deal_heading_wrapper plan_head"><h2>Plans</h2></div>
                            <div class="jp_client_slider_wrapper">
                                @foreach ($plan as $plans)
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 plan_price_div">
                                        <div class="pricing_box1_wrapper pricing_border_box1_wrapper">
                                            <div class="box1_heading_wrapper">
                                                <h4>{{ $plans->plan_title }}</h4>
                                            </div>
                                            <div class="price_box1_wrapper">
                                                <div class="price_box1 price_div">
                                                    <h2><span>{!! $plans->plan_price !!}</span></h2>
                                                </div>
                                            </div>
                                            <div class="pricing_cont_wrapper">
                                                <div class="pricing_cont">
                                                    {!! $plans->plan_description!!}
                                                </div>
                                            </div>
                                            <div class="pricing_btn_wrapper">
                                                <div class="pricing_btn1">
                                                    <ul>
                                                        <li><a href="{{ url('/plan') }}"><i class="fa fa-plus-circle"></i> Get Started</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="jp_pricing_label_wrapper">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

@include('front.footer')