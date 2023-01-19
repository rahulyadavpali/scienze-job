@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>{{ $user_detail->first_name }} {{ $user_detail->middle_name }} {{ $user_detail->last_name }}</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul class="ads_bread">
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/advertiser-user') }}">Seller Profile</a> <i class="fa fa-angle-right"></i></li>
                                    <li><span>{{ $user_detail->first_name }} {{ $user_detail->middle_name }} {{ $user_detail->last_name }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jp listing Single cont Wrapper Start -->
    <div class="jp_listing_single_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_listing_left_sidebar_wrapper">
                        <div class="jp_job_des org_desc">
                            <div class="heading">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                                        <h2>About : {!! $user_detail->first_name !!}</h2>
                                    </div>
                                    <div class="ad_btn col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                                        <a href="{{ route('auth.user.select.advertiser.plan', [$user_detail->id]) }}">Post An Advertisement</a>
                                    </div>
                                </div>
                            </div>
                            <div class="info_div">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                                        <p>
                                            <i class="fa fa-envelope"></i>&nbsp;&nbsp; <a href="mailto:{!! $user_detail->email !!}" target="_blank">{{ $user_detail->email }}</a><br/>
                                            <i class="fa fa-phone-square"></i>&nbsp;&nbsp; <a href="tel:{!! $user_detail->mobile !!}" target="_blank">{{ $user_detail->mobile }}</a>
                                        </p>
                                    </div>
                                    <div class="edit_info col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                                        <a href="{{ route('auth.edit.advertiser', [$user_detail->id]) }}">Edit Info</a>
                                        <br/>
                                        <br/>
                                        <a href="{{ route('auth.edit.advertiser.password', [$user_detail->id]) }}">Edit Password</a>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <hr/>
                            <br/>
                            <div class="feat_ads">
                                <h2>Your Ads</h2>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('front.footer')