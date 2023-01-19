@include('front.header')

    <div class="jp_bottom_footer_Wrapper_header_img_wrapper">
        <div class="jp_slide_img_overlay"></div>
        <div class="jp_banner_heading_cont_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_job_heading_wrapper">
                            <div class="jp_job_heading">
                                <h1><span>3,000+</span> Browse Jobs</h1>
                                <p>Find Jobs, Employment & Career Opportunities</p>
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
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                        <div class="row">
                            @include('partials.job_type')
                            @include('partials.job_category')
                            @include('partials.job_location')
                            @include('partials.job_designation')
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="jp_add_resume_wrapper jp_job_location_wrapper">
                                    <div class="jp_add_resume_img_overlay"></div>
                                    <div class="jp_add_resume_cont">
                                        <img src="{{ url('upload/gallery/'.$logo) }}" alt="logo" />
                                        <h4>Get Best Matched Jobs On your Email. Add Resume NOW!</h4>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-plus-circle"></i> &nbsp;ADD RESUME</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="jp_listing_tabs_wrapper">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="gc_causes_select_box_wrapper">
                                            <div class="gc_causes_select_box">
                                                <select>
                                                    <option>Latest</option>
                                                    <option>Sort Default</option>
                                                    <option>Sort Default</option>
                                                </select><i class="fa fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-sm hidden-xs">
                                        <div class="gc_causes_view_tabs_wrapper">
                                            <div class="gc_causes_view_tabs">
                                                <ul class="nav nav-pills">
                                                    <li class="active"><a data-toggle="pill" href="#grid"><i class="fa fa-th-large"></i></a></li>
                                                    <li><a data-toggle="pill" href="#list"><i class="fa fa-list"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="tab-content">
                                    <div id="grid" class="tab-pane fade in active">
                                        <div class="row">
                                            <?php if(Auth::user() !== null){
                                                if($user->job_id == 2){
                                                    $matchFound = false;
                                                    foreach ($job as $jobs){
                                            ?>
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
                                                <?php
                                                    }
                                                }else{foreach ($job as $jobs){ ?>
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
                                            <?php }}
                                            }else{
                                                foreach ($job as $jobs){ ?>
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
                                                <?php }
                                                } ?>
                                        </div>
                                    </div>
                                    <div id="list" class="tab-pane fade">
                                        <div class="row">
                                        <?php if(Auth::user() !== null ){
                                            if($user->job_id == 2){
                                                $matchFound = false;
                                                foreach ($job as $jobs){
                                        ?>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                                    <div class="jp_job_post_main_wrapper">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="jp_job_post_side_img job_company_logo">
                                                                    <?php $employer = DB::table('tb_employer')->where('id', '=', $jobs->employer_id)->get(); ?>
                                                                    <img src="{{ url('upload/employer/'.$employer[0]->company_logo) }}" />
                                                                </div>
                                                                <div class="jp_job_post_right_cont">
                                                                    <h4>
                                                                        <?php if(Auth::user() !== null ){ ?>
                                                                            <a href="{{ url('/job-view',[$jobs->id]) }}">{{ $jobs->job_title }}</a>
                                                                        <?php }else{ ?>
                                                                            <a href="{{ url('/user-login') }}">{{ $jobs->job_title }}</a>
                                                                        <?php } ?>
                                                                    </h4>
                                                                    <p>{{ $jobs->company_name }}</p>
                                                                    <ul>
                                                                        <li><i class="fa fa-money"></i>&nbsp; ₹ {{ $jobs->salary }}</li>
                                                                        <li><i class="fa fa-map-marker"></i>&nbsp; {{ $jobs->location }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="jp_job_post_right_btn_wrapper">
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
                                            <?php
                                                }
                                            }
                                            else{foreach ($job as $jobs){ ?>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                                        <div class="jp_job_post_main_wrapper">
                                                            <div class="row">
                                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="jp_job_post_side_img job_company_logo">
                                                                        <?php $employer = DB::table('tb_employer')->where('id', '=', $jobs->employer_id)->get(); ?>
                                                                        <img src="{{ url('upload/employer/'.$employer[0]->company_logo) }}" />
                                                                    </div>
                                                                    <div class="jp_job_post_right_cont">
                                                                        <h4>
                                                                            <?php if(Auth::user() !== null ){ ?>
                                                                                <a href="{{ url('/job-view',[$jobs->id]) }}">{{ $jobs->job_title }}</a>
                                                                            <?php }else{ ?>
                                                                                <a href="{{ url('/user-login') }}">{{ $jobs->job_title }}</a>
                                                                            <?php } ?>
                                                                        </h4>
                                                                        <p>{{ $jobs->company_name }}</p>
                                                                        <ul>
                                                                            <li><i class="fa fa-money"></i>&nbsp; ₹ {{ $jobs->salary }}</li>
                                                                            <li><i class="fa fa-map-marker"></i>&nbsp; {{ $jobs->location }}</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="jp_job_post_right_btn_wrapper">
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
                                            <?php }}
                                            }else{
                                                foreach ($job as $jobs){ ?>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                                        <div class="jp_job_post_main_wrapper">
                                                            <div class="row">
                                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="jp_job_post_side_img job_company_logo">
                                                                        <?php $employer = DB::table('tb_employer')->where('id', '=', $jobs->employer_id)->get(); ?>
                                                                        <img src="{{ url('upload/employer/'.$employer[0]->company_logo) }}" />
                                                                    </div>
                                                                    <div class="jp_job_post_right_cont">
                                                                        <h4>
                                                                            <?php if(Auth::user() !== null ){ ?>
                                                                                <a href="{{ url('/job-view',[$jobs->id]) }}">{{ $jobs->job_title }}</a>
                                                                            <?php }else{ ?>
                                                                                <a href="{{ url('/user-login') }}">{{ $jobs->job_title }}</a>
                                                                            <?php } ?>
                                                                        </h4>
                                                                        <p>{{ $jobs->company_name }}</p>
                                                                        <ul>
                                                                            <li><i class="fa fa-money"></i>&nbsp; ₹ {{ $jobs->salary }}</li>
                                                                            <li><i class="fa fa-map-marker"></i>&nbsp; {{ $jobs->location }}</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                    <div class="jp_job_post_right_btn_wrapper">
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
                                            <?php }
                                            } ?>
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
        <div class="jp_listing_sidebar_main_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                        <div class="row">
                            @include('partials.job_type')
                            @include('partials.job_category')
                            @include('partials.job_location')
                            @include('partials.job_designation')
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="jp_add_resume_wrapper jp_job_location_wrapper">
                                    <div class="jp_add_resume_img_overlay"></div>
                                    <div class="jp_add_resume_cont">
                                        <img src="{{ url('upload/gallery/'.$logo) }}" alt="logo" />
                                        <h4>Get Best Matched Jobs On your Email. Add Resume NOW!</h4>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-plus-circle"></i> &nbsp;ADD RESUME</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2 style="padding-top: 100px;">No Jobs Found...</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

@include('front.footer')