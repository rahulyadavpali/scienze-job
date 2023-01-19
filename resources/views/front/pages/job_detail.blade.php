@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading"><h2>{{ $job->job_title }}</h2></div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/job') }}">Jobs</a> <i class="fa fa-angle-right"></i></li>
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
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="jp_listing_left_sidebar_wrapper">
                        <div class="jp_job_des org_desc">
                            <div class="job_heading">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                                        <h2>Job Expectation</h2>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                                        <div class="job_share">
                                            <a id="sharebtn" class="share_btn_icon" href="javascript:void(0)">Share <i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            <div id="shareToggle" class="share_modal share_div">
                                                {!! $share !!}
                                                <div class="close_share">X</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>{!! $job->expectation !!}</p>
                            <p>{{ substr($job->expectation, 0, 250) }}...</p>
                            <ul class="job_image_list">
                                <?php if($job->copy != null){ ?>
                                <li>
                                    <a href="{{ url('upload/advertisement-copy/'.$job->copy) }}" target="_blank" class="adv_copy">
                                        <img src="{{ url('upload/advertisement-copy/'.$job->copy) }}" alt-title="{!! $job->job_title !!}" />
                                    </a>
                                </li>
                                <?php }if($job->pdf != null){ ?>
                                <li>
                                    <a href="{{ url('upload/advertisement-pdf/'.$job->pdf) }}" target="_blank" class="adv_copy"><i class="far fa-file-alt"></i> {{ $job->job_title }}</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="jp_job_res jp_job_qua org_desc">
                            <h2>REMARKS</h2>
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
                                <div class="jp_job_listing_single_post_right_cont job_comp">
                                    <div class="jp_jop_overview_img_wrapper">
                                        <div class="jp_jop_overview_img jb_detail_lg">
                                            <?php 
                                                $em_id = $job->employer_id;
                                                $employer = DB::table('tb_employer')->where('id', '=', $em_id)->get();
                                            ?>
                                            <img src="{{ url('upload/employer/'.$employer[0]->company_logo) }}" alt="post_img" />
                                        </div>
                                    </div>
                                    <div class="jp_job_listing_single_post_right_cont_wrapper">
                                        <h4>{{ $job->job_title }}</h4>
                                        <p><a href="{{ url('/employer-detail',[$job->employer_id]) }}" target="_blank">{{ $job->company_name }}</a></p>
                                    </div>
                                </div>
                                <div class="jp_listing_overview_list_outside_main_wrapper">
                                    <div class="jp_listing_overview_list_main_wrapper">
                                        <div class="jp_listing_list_icon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="jp_listing_list_icon_cont_wrapper">
                                            <ul>
                                                <li>Date Posted :</li>
                                                <li>{{ $job->start_date }}</li>
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
                                                <li>{{ $job->salary }}</li>
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
                                                <?php if(Auth::user() !== null){if($user->job_id == 2){ ?>
                                                    <li>
                                                        <?php if($apply == 0){ ?>
                                                            <a href="{{ route('auth.apply.job', [$job->id]) }}"><i class="fa fa-plus-circle"></i> &nbsp;Apply Now!</a>
                                                        <?php }else{ ?>
                                                            <a href="javascript:void(0)"><i class="fa fa-check"></i> &nbsp;Applied</a>
                                                        <?php } ?>
                                                    </li>
                                                <?php }else{ ?>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-plus-circle"></i> &nbsp;Apply Now!</a></li>
                                                <?php }} ?>
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

    <!-- Share-Button -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#sharebtn").click(function(){
                $("#shareToggle").show();
            });
            $("#shareToggle .close_share").click(function(){
                $("#shareToggle").hide();
            });
        });
    </script>

@include('front.footer')