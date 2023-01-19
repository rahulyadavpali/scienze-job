@include('front.header')

    <div class="jp_bottom_footer_Wrapper_header_img_wrapper">
        <div class="jp_slide_img_overlay"></div>
        <div class="jp_banner_heading_cont_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_job_heading_wrapper">
                            <div class="jp_job_heading">
                                <p>Search Result</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form id="job_search" action="{{ url('job-search') }}" method="POST">
                            @csrf
                            <div class="jp_header_form_wrapper">
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" name="keyword" id="keyword" value="{{ old('keyword') }}" placeholder="Keyword e.g. (Job Title, Description, Tags)" />
                                    @if($errors->has('keyword'))
                                        <p class="help-block seo_error">{{ $errors->first('keyword') }}</p>
                                    @endif
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <div class="jp_form_btn_wrapper">
                                        <ul>
                                            <li><button type="submit"><i class="fa fa-search"></i> Search</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_banner_main_jobs_wrapper">
                            <div class="jp_banner_main_jobs"></div>
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
                                            <?php foreach ($job as $jobs){ ?>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                                                            <?php if(Auth::user() !== null ){ ?>
                                                                                <a href="{{ url('/job-view',[$jobs->id]) }}">{{ $jobs->job_title }}</a>
                                                                            <?php }else{ ?>
                                                                                <a href="{{ url('/user-login') }}">{{ $jobs->job_title }}</a>
                                                                            <?php } ?>
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
                                                                                <li><a href="{{ url('/job-view',[$jobs->id]) }}">Apply</a></li>
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