@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Your Applications</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/user') }}">Profile</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Your Applications</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(count($job) > 0){ ?>
        <div class="jp_listing_sidebar_main_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="tab-content">
                                    <div id="grid" class="tab-pane fade in active">
                                        <div class="row">
                                            <?php foreach ($application as $apply){$jobs = DB::table('tb_jobs')->where('id', '=', $apply->job_id)->get(); ?>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                                                            <li><a href="javascript:void(0)">Apply</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
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
            </div>
        </div>
    <?php } else{ ?>
        <div class="jp_listing_sidebar_main_wrapper" style="padding-top: 100px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1><strong>No Match Found...</strong></h1>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

@include('front.footer')