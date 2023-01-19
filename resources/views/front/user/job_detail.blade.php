@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>{{ $job->job_title }}</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/user') }}">Profile</a> <i class="fa fa-angle-right"></i></li>
                                    <li>{{ $job->job_title }}</li>
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
                    <div class="posted_jobs">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont thumb_job">
                                    <div class="jp_job_post_main_wrapper">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <div class="jp_job_post_side_img post_thumb_img">
                                                    <img src="{{ url('upload/advertisement-copy/'.$job->copy) }}" alt="post_img" />
                                                </div>
                                                <div class="jp_job_post_right_cont">
                                                    <h4>{!! $job->job_title !!}</h4>
                                                    <p>{!! $job->company_name !!}</p>
                                                    <ul>
                                                        <li><i class="fa fa-money"></i>&nbsp; {!! $job->salary !!}</li>
                                                        <li><i class="fa fa-map-marker"></i>&nbsp; {!! $job->location !!}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="jp_job_post_right_btn_wrapper">
                                                    <ul>
                                                        <li></li>
                                                        <li><a href="javascript:void(0)">View Detail</a></li>
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
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="jp_listing_left_sidebar_wrapper">
                        <div class="jp_job_des org_desc">
                            <h2>Expectations From Job</h2>
                            <p>{!! $job->expectation !!}</p>
                            <ul class="job_image_list">
                                <?php if($job->copy != null){ ?>
                                <li>
                                    <a href="{{ url('upload/advertisement-copy/'.$job->copy) }}" target="_blank" class="adv_copy">
                                        <img src="{{ url('upload/advertisement-copy/'.$job->copy) }}" alt-title="{!! $job->job_title !!}" />
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if($job->pdf != null){ ?>
                                <li>
                                    <a href="{{ url('upload/advertisement-pdf/'.$job->pdf) }}" target="_blank" class="adv_copy"><i class="far fa-file-alt"></i> {{ $job->job_title }}</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="jp_job_res jp_job_qua org_desc">
                            <h2>Remarks</h2>
                            <p>{!! $job->remarks !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="jp_rightside_job_categories_wrapper jp_rightside_listing_single_wrapper">
                                <div class="jp_rightside_job_categories_heading">
                                    <h4>Job Overview</h4>
                                </div>
                                <div class="jp_listing_overview_list_outside_main_wrapper">
                                    <div class="jp_listing_overview_list_main_wrapper">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Job Title :</li>
                                                <li>{{ $job->job_title }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-list-ol"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Number Of Post :</li>
                                                <li>{{ $job->post_no }}</li>
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
                                                <li>{{ $job->location }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Salary :</li>
                                                <li>₹ {{ $job->salary }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-th-large"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Category :</li>
                                                <?php $category = DB::table('category')->where('id', '=', $job->categories)->get(); ?>
                                                <li>{{ $category[0]->title }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-th-large"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Sub-Category :</li>
                                                <?php $subcategory = DB::table('sub_category')->where('id', '=', $job->subcategories)->get(); ?>
                                                <li>{{ $subcategory[0]->title }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Job Designation :</li>
                                                <li>{{ $job->selection_job }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Start Date :</li>
                                                <li>{{ $job->start_date }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>End Date :</li>
                                                <li>{{ $job->end_date }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_overview_list_main_wrapper jp_listing_overview_list_main_wrapper2">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>No. of Applicants :</li>
                                                <li>
                                                    <?php 
                                                        $applicant = DB::table('tb_applications')->where('job_id', '=', $job->id)->get();
                                                        echo count($applicant);
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="jp_listing_right_bar_btn_wrapper">
                                        <div class="jp_listing_right_bar_btn">
                                            <ul>
                                                <li><a href="{{ route('auth.edit.job', [$job->id]) }}"><i class="fa fa-pencil-square"></i> &nbsp;Edit</a></li>
                                                <li>
                                                    {!! Form::open(array(
                                                        'style' => 'display: inline-block;',
                                                        'method' => 'POST',
                                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                        'route' => ['auth.job.inactive', $job->id])) !!}
                                                    {!! Form::submit(trans('Delete This Job'), array('class' => 'job_usr_acti usr_del_btn')) !!}
                                                    {!! Form::close() !!}
                                                </li>
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