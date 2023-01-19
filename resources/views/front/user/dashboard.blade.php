@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <?php if($job_id == 1){ ?>
                            <div class="jp_tittle_heading">
                                <h2>{{ $user_detail->company_name }}</h2>
                            </div>
                            <div class="jp_tittle_breadcrumb_main_wrapper">
                                <div class="jp_tittle_breadcrumb_wrapper">
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                        <li>{{ $user_detail->company_name }}</li>
                                    </ul>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="jp_tittle_heading">
                                <h2>{{ $user_detail->first_name }} {{ $user_detail->middle_name }} {{ $user_detail->last_name }}</h2>
                            </div>
                            <div class="jp_tittle_breadcrumb_main_wrapper">
                                <div class="jp_tittle_breadcrumb_wrapper">
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                        <li>{{ $user_detail->first_name }} {{ $user_detail->middle_name }} {{ $user_detail->last_name }}</li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
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
                            <?php if($job_id == 1){ ?>
                                <h2>About {!! $user_detail->company_name !!}</h2>
                                <p>{!! $user_detail->company_description !!}</p>
                                <ul>
                                    <li><i class="fa fa-globe"></i>&nbsp;&nbsp; <a href="{!! $user_detail->company_website !!}" target="_blank">{{ $user_detail->company_website }}</a></li>
                                </ul>
                            <?php }else{ ?>
                                <h2>About Me</h2>
                                <p>{!! $user_detail->description !!}</p>
                                <ul>
                                    <li><i class="fa fa-file"></i>&nbsp;&nbsp; <a href="{{ url('upload/applicant-cv/'.$user_detail->resume) }}" target="_blank">My Resume</a></li>
                                    <li><i class="fa fa-envelope"></i>&nbsp;&nbsp; <a href="mailto:{!! $user_detail->email !!}" target="_blank">{{ $user_detail->email }}</a></li>
                                    <li><i class="fa fa-phone-square"></i>&nbsp;&nbsp; <a href="tel:{!! $user_detail->mobile_number !!}" target="_blank">{{ $user_detail->mobile_number }}</a><?php if($user_detail->other_number !== null){ ?>, <a href="tel:{!! $user_detail->other_number !!}" target="_blank">{{ $user_detail->other_number }}</a><?php } ?></li>
                                </ul>
                            <?php } ?>
                        </div>
                        <?php if($job_id == 2){ ?>
                            <div class="jp_job_des org_desc present_work">
                                <h2>About PRESENT Work</h2>
                                <p>{!! $user_detail->presernt_work !!}</p>
                                <a href="{{ url('/job') }}" class="dh_apply_btn">Apply For Jobs</a>
                            </div>
                            <div class="jp_job_des org_desc present_work interest_user">
                                <h2>AREA oF INTEREST</h2>
                                <ul>
                                    <li>
                                        <p>
                                            <strong>Categories</strong> : 
                                            <?php if($user_detail->subcategories1 != 'null'){
                                                $cat_one = DB::table('sub_category')->where('id', '=', $user_detail->subcategories1)->get();
                                                echo $cat_one[0]->title.',';
                                            }
                                            else{echo '';} ?>
                                            <?php if($user_detail->subcategories2 != 'null'){
                                                $cat_two = DB::table('sub_category')->where('id', '=', $user_detail->subcategories2)->get();
                                                echo $cat_two[0]->title.',';
                                            }
                                            else{echo '';} ?>
                                            <?php if($user_detail->subcategories3 != 'null'){
                                                $cat_thr = DB::table('sub_category')->where('id', '=', $user_detail->subcategories3)->get();
                                                echo $cat_thr[0]->title.',';
                                            }
                                            else{echo '';} ?>
                                            <?php if($user_detail->subcategories4 != 'null'){
                                                $cat_fou = DB::table('sub_category')->where('id', '=', $user_detail->subcategories4)->get();
                                                echo $cat_fou[0]->title.',';
                                            }
                                            else{echo '';} ?>
                                            <?php if($user_detail->subcategories5 != 'null'){
                                                $cat_fiv = DB::table('sub_category')->where('id', '=', $user_detail->subcategories5)->get();
                                                echo $cat_fiv[0]->title.',';
                                            }
                                            else{echo '';} ?>
                                        </p>
                                    </li>
                                    <?php $designation = DB::table('designation')->where('id', '=', $user_detail->selection_job)->get(); ?>
                                    <li><p><strong>Selection of job by Designation</strong> : {{ $designation[0]->title }}</p></li>
                                </ul>
                            </div>
                        <?php } ?>
                        <?php if($job_id == 1){if($user_detail->company_location != null){ ?>
                            <div class="jp_job_map">
                                <h2>Location</h2>
                                <div id="map" style="width:100%;float: left;height: auto;">{!! $user_detail->company_location !!}</div>
                            </div>
                        <?php }} ?>
                    </div>
                    <?php if($job_id == 2){
                        if($user_detail->linkedin != null OR $user_detail->facebook != null OR $user_detail->twitter != null){ ?>
                            <div class="jp_listing_left_bottom_sidebar_wrapper">
                                <div class="jp_listing_left_bottom_sidebar_social_wrapper">
                                    <ul class="hidden-xs">
                                        <li>Follow Us :</li>
                                        <?php if($user_detail->linkedin != null){ ?>
                                            <li><a href="{!! $user_detail->linkedin !!}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                        <?php } ?>
                                        <?php if($user_detail->facebook != null){ ?>
                                            <li><a href="{!! $user_detail->facebook !!}" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                        <?php } ?>
                                        <?php if($user_detail->twitter != null){ ?>
                                            <li><a href="{!! $user_detail->twitter !!}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="jp_listing_related_heading_wrapper">
                            <h2>Applied Jobs</h2>
                            <div class="row">
                                <?php $i = 0;
                                foreach($job_detail as $apply){
                                    if($i++ < 7){
                                    $jobs = DB::table('tb_jobs')->where('id', '=', $apply->job_id)->get(); ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                            <div class="jp_job_post_main_wrapper jp_job_post_grid_main_wrapper">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="jp_job_post_side_img job_company_logo">
                                                            <?php $employer = DB::table('tb_employer')->where('id', '=', $jobs[0]->employer_id)->get(); ?>
                                                            <img src="{{ url('upload/advertisement-copy/'.$jobs[0]->copy) }}" />
                                                        </div>
                                                        <div class="jp_job_post_right_cont jp_job_post_grid_right_cont">
                                                            <h4>
                                                                <a href="{{ url('/job-view',[$jobs[0]->id]) }}">{{ $jobs[0]->job_title }}</a>
                                                            </h4>
                                                            <p>{{ $jobs[0]->company_name }}</p>
                                                            <ul>
                                                                <li><i class="fa fa-money"></i>&nbsp; {{ $jobs[0]->salary }}</li>
                                                                <li><i class="fa fa-map-marker"></i>&nbsp; {{ $jobs[0]->location }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="jp_job_post_right_btn_wrapper jp_job_post_grid_right_btn_wrapper">
                                                            <ul>
                                                                <li><a href="javascript:void(0)">applied</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++;}} ?>
                            </div>
                            <div class="view_jobs_btn">
                                <a href="{{ url('/your-application') }}">View All Applications</a>
                            </div>
                        </div>
                        <div class="jp_listing_related_heading_wrapper fav_div_jb">
                            <h2>Favourite Jobs</h2>
                            <div class="row"></div>
                            <div class="fv_jobd">
                                <a href="{{ url('/your-application') }}">View Favourite Jobs</a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($job_id == 1){
                        if($user_detail->linkedin != null OR $user_detail->facebook != null OR $user_detail->twitter != null){ ?>
                        <div class="jp_listing_left_bottom_sidebar_wrapper">
                            <div class="jp_listing_left_bottom_sidebar_social_wrapper">
                                <ul class="hidden-xs">
                                    <li>Follow Us :</li>
                                    <?php if($user_detail->linkedin != null){ ?>
                                        <li><a href="{!! $user_detail->linkedin !!}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    <?php } ?>
                                    <?php if($user_detail->facebook != null){ ?>
                                        <li><a href="{!! $user_detail->facebook !!}" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                    <?php } ?>
                                    <?php if($user_detail->twitter != null){ ?>
                                        <li><a href="{!! $user_detail->twitter !!}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="jp_listing_related_heading_wrapper">
                            <h2>Jobs Posted</h2>
                            <div class="posted_jobs">
                                <div class="row">
                                    <?php $i = 0;foreach($job_detail as $job_dec){if($i++ < 6){ ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                                <div class="jp_job_post_main_wrapper">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                            <div class="jp_job_post_side_img post_thumb_img">
                                                                <img src="{{ url('upload/advertisement-copy/'.$job_dec->copy) }}" alt="post_img" />
                                                            </div>
                                                            <div class="jp_job_post_right_cont">
                                                                <h4>{!! $job_dec->job_title !!}</h4>
                                                                <p>{!! $job_dec->company_name !!}</p>
                                                                <ul>
                                                                    <li><i class="fa fa-money"></i>&nbsp; {!! $job_dec->salary !!}</li>
                                                                    <li><i class="fa fa-map-marker"></i>&nbsp; {!! $job_dec->location !!}</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <div class="jp_job_post_right_btn_wrapper">
                                                                <ul>
                                                                    <li></li>
                                                                    <li><a href="{{ route('auth.job.view', [$job_dec->id]) }}">View Detail</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $i++;}} ?>
                                </div>
                                <div class="view_jobs_btn">
                                    <a href="{{ url('/your-jobs') }}">View All Jobs</a>
                                </div>
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
                                <?php if($job_id == 1){ ?>
                                    <div class="jp_jop_overview_img_wrapper">
                                        <div class="jp_jop_overview_img jb_detail_lg">
                                            <img src="{{ url('upload/employer/'.$user_detail->company_logo) }}" alt="post_img" />
                                        </div>
                                    </div>
                                    <div class="jp_job_post_right_overview_btn_wrapper">
                                        <div class="jp_job_listing_single_post_right_cont_wrapper">
                                            <h4>{{ $user_detail->company_name }}</h4>
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <div class="jp_jop_overview_img_wrapper">
                                        <div class="jp_jop_overview_img jb_detail_lg">
                                            <img src="{{ url('upload/applicant-image/'.$user_detail->photo) }}" alt="post_img" />
                                        </div>
                                    </div>
                                    <div class="jp_job_post_right_overview_btn_wrapper">
                                        <div class="jp_job_listing_single_post_right_cont_wrapper">
                                            <h4>{{ $user_detail->first_name }} {{ $user_detail->middle_name }} {{ $user_detail->last_name }}</h4>
                                            <p>{{ $dob }}</p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="jp_listing_overview_list_outside_main_wrapper">
                                    <?php if($job_id == 2){ ?>
                                        <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                            <div class="jp_listing_list_icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="jp_listing_list_icon_cont_wrapper">
                                                <ul>
                                                    <li>Email :</li>
                                                    <li style="text-align: justify;">{!! $user_detail->email !!}</li>
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
                                                    <li style="text-align: justify;">{!! $user_detail->address !!}, {!! $user_detail->zip_code !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                            <div class="jp_listing_list_icon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="jp_listing_list_icon_cont_wrapper">
                                                <ul>
                                                    <li>City & State :</li>
                                                    <li style="text-align: justify;">{!! $user_detail->city !!}, {!! $user_detail->state !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if($job_id == 1){ ?>
                                        <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                            <div class="jp_listing_list_icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div class="jp_listing_list_icon_cont_wrapper">
                                                <ul>
                                                    <li>Author Name :</li>
                                                    <li style="text-align: justify;">{!! $user_detail->first_name !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                            <div class="jp_listing_list_icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="jp_listing_list_icon_cont_wrapper">
                                                <ul>
                                                    <li>Email :</li>
                                                    <li style="text-align: justify;">{!! $user_detail->email !!}</li>
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
                                                    <li style="text-align: justify;">{!! $user_detail->contact_number !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                            <div class="jp_listing_list_icon">
                                                <i class="fab fa-whatsapp"></i>
                                            </div>
                                            <div class="jp_listing_list_icon_cont_wrapper">
                                                <ul>
                                                    <li>WhatsApp :</li>
                                                    <li style="text-align: justify;">{!! $user_detail->whatsapp_number !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                            <div class="jp_listing_list_icon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="jp_listing_list_icon_cont_wrapper">
                                                <ul>
                                                    <li>Location :</li>
                                                    <li style="text-align: justify;">{!! $user_detail->company_address !!}, {!! $user_detail->zip_code !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="jp_listing_overview_list_outside_main_wrapper edit_btn">
                                    <div class="jp_listing_right_bar_btn_wrapper">
                                        <div class="jp_listing_right_bar_btn dash_list">
                                            <ul>
                                                <?php if($job_id == 1){ ?>
                                                    <li><a href="{{ route('auth.create.job', [$user_detail->id]) }}"><i class="fa fa-plus-square-o"></i> &nbsp;Add New Job</a></li>
                                                    <li><a href="{{ route('auth.edit.employer', [$user_detail->id]) }}"><i class="fa fa-pencil-square-o"></i> &nbsp;Edit Profile</a></li>
                                                <?php }else{ ?>
                                                    <li><a href="{{ route('auth.edit.seeker', [$user_detail->id]) }}"><i class="fa fa-pencil-square-o"></i> &nbsp;Edit Profile</a></li>
                                                    <?php $emails = DB::table('tb_email')->where('jobseeker_id', '=', $user_detail->id)->get();
                                                        if($emails[0]->agree_id == 1){ ?>
                                                        <li>
                                                            {!! Form::open(array(
                                                                'style' => 'display: inline-block;',
                                                                'method' => 'POST',
                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                'route' => ['auth.unsubscribe.email', $emails[0]->id])) !!}
                                                            {!! Form::submit(trans('Unsubscribe(email)'), array('class' => 'btn btn-xs unsub_btn')) !!}
                                                            {!! Form::close() !!}
                                                        </li>
                                                    <?php }else{ ?>
                                                        <li>
                                                            {!! Form::open(array(
                                                                'style' => 'display: inline-block;',
                                                                'method' => 'POST',
                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                'route' => ['auth.subscribe.email', $emails[0]->id])) !!}
                                                            {!! Form::submit(trans('Subscribe (email)'), array('class' => 'btn btn-xs unsub_btn')) !!}
                                                            {!! Form::close() !!}
                                                        </li>
                                                    <?php } ?>
                                                    <li class="dsh_pdf_btn"><a href="{{ url('/job-seeker-pdf') }}">Download Profile</a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_outside_main_wrapper edit_btn">
                                    <div class="jp_listing_right_bar_btn_wrapper">
                                        <div class="jp_listing_right_bar_btn dash_list review_btn">
                                            <ul>
                                                <?php $rev_id = $user_detail->id;
                                                $applicant = DB::table('tb_review')->where('employer_id', '=', $rev_id)->get();
                                                if($job_id == 1){
                                                    if(isset($applicant[0])){
                                                        if($applicant[0]->employer_id == $rev_id){ ?>
                                                            <li><a><i class="fa fa-thumbs-up"></i> &nbsp;Thanks For Your Review</a></li>
                                                        <?php }
                                                    }else{ ?>
                                                        <li><a href="{{ route('auth.employer.review',[$rev_id]) }}"><i class="fa fa-star"></i> &nbsp;Review Us</a></li>
                                                    <?php }
                                                }else{
                                                    if(isset($applicant[0])){
                                                        if($applicant[0]->employer_id == $rev_id){ ?>
                                                            <li><a><i class="fa fa-thumbs-up"></i> &nbsp;Thanks For Your Review</a></li>
                                                        <?php }
                                                    }else{ ?>
                                                        <li><a href="{{ route('auth.seeker.review',[$rev_id]) }}"><i class="fa fa-star"></i> &nbsp;Review Us</a></li>
                                                    <?php } ?>
                                                <?php } ?>
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