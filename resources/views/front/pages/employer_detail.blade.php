@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>{{ $job->company_name }}</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/job') }}">Job Listing</a> <i class="fa fa-angle-right"></i></li>
                                    <li>{{ $job->company_name }}</li>
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
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="jp_listing_left_sidebar_wrapper">
                        <div class="jp_job_des org_desc">
                            <h2>About {{ $job->company_name }}</h2>
                            <p>{!! $job->company_description !!}</p>
                            <ul>
                                <li><i class="fa fa-globe"></i>&nbsp;&nbsp; <a href="{!! $job->company_website !!}" target="_blank">{{ $job->company_website }}</a></li>
                            </ul>
                        </div>
                        <div class="jp_job_map">
                            <h2>Location</h2>
                            <div id="map" style="width:100%;float: left;height: auto;">{!! $job->company_location !!}</div>
                        </div>
                    </div>
                    <?php if($job->linkedin != null OR $job->facebook != null OR $job->twitter != null){ ?>
                        <div class="jp_listing_left_bottom_sidebar_wrapper">
                            <div class="jp_listing_left_bottom_sidebar_social_wrapper">
                                <ul class="hidden-xs">
                                    <li>Follow Us :</li>
                                    <?php if($job->linkedin != null){ ?>
                                        <li><a href="{!! $job->linkedin !!}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    <?php } ?>
                                    <?php if($job->facebook != null){ ?>
                                        <li><a href="{!! $job->facebook !!}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <?php } ?>
                                    <?php if($job->twitter != null){ ?>
                                        <li><a href="{!! $job->twitter !!}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="jp_rightside_job_categories_wrapper jp_rightside_listing_single_wrapper">
                                <div class="jp_rightside_job_categories_heading">
                                    <h4>Overview</h4>
                                </div>
                                <div class="jp_job_listing_single_post_right_cont job_comp">
                                    <div class="jp_jop_overview_img_wrapper">
                                        <div class="jp_jop_overview_img jb_detail_lg">
                                            <img src="{{ url('upload/employer/'.$job->company_logo) }}" alt="post_img" />
                                        </div>
                                    </div>
                                    <div class="jp_job_post_right_overview_btn_wrapper">
                                        <div class="jp_job_listing_single_post_right_cont_wrapper">
                                            <h4>{{ $job->company_name }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_outside_main_wrapper">
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Email :</li>
                                                <li style="text-align: justify;">{!! $job->email !!}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-phone-square"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Phone :</li>
                                                <li style="text-align: justify;">{!! $job->contact_number !!}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-whatsapp"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>WhatsApp :</li>
                                                <li style="text-align: justify;">{!! $job->whatsapp_number !!}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Address :</li>
                                                <li style="text-align: justify;">{!! $job->company_address !!}, {!! $job->zip_code !!}</li>
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
    </div>

@include('front.footer')