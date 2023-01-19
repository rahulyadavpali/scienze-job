
    <!-- jp Newsletter Wrapper Start -->
    <div class="jp_main_footer_img_wrapper">
        <div class="jp_newsletter_img_overlay_wrapper"></div>

        <!-- jp footer Wrapper Start -->
        <div class="jp_footer_main_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_footer_logo_wrapper">
                            <div class="jp_footer_logo">
                                <a href="{{ url('/') }}"><img src="{{ url('upload/gallery/'.$logo) }}" alt="Scienze Jobs Logo" title="Scienze Jobs" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="jp_footer_three_sec_main_wrapper">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="jp_footer_first_cont_wrapper">
                                <div class="jp_footer_first_cont">
                                    <h2>{{ $paragraph_title }}</h2>
                                    <p>{!! $paragraph !!}</p>
                                    <ul>
                                        <li><i class="fa fa-plus-circle"></i> <a href="{{ url('about-us') }}">READ MORE</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="jp_footer_candidate_wrapper jp_footer_candidate_wrapper2">
                                <div class="jp_footer_candidate">
                                    <h2>For candidate</h2>
                                    <ul>
                                        <!-- dashboard-link -->
                                        <?php if(Auth::user() !== null){
                                            $useres = Auth::user();
                                            if($useres->job_id == 2){ ?>
                                                <li><a href="{{ url('/user') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Candidate Dashboard</a></li>
                                            <?php }else{ ?>
                                                <li><a href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i> Candidate Dashboard</a></li>
                                            <?php }}else{ ?>
                                            <li><a href="{{ url('/job-seeker-signup') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Add a Resume</a></li>
                                        <?php } ?>
                                        <!-- Job-Application-Link -->
                                        <?php if(Auth::user() !== null){
                                            $useres = Auth::user();
                                            if($useres->job_id == 2){ ?>
                                                <li><a href="{{ url('/your-application') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Your Applications</a></li>
                                            <?php }else{ ?>
                                                <li><a href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i> Your Applications</a></li>
                                            <?php }}else{ ?>
                                            <li><a href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i> Your Applications</a></li>
                                        <?php } ?>
                                        <!-- Account-Link -->
                                        <?php if(Auth::user() !== null){ ?>
                                            <li><a href="{{ url('/user') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> My Account</a></li>
                                        <?php }else{ ?>
                                            <li><a href="{{ url('/user-login') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> My Account</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="jp_footer_candidate_wrapper jp_footer_candidate_wrapper3">
                                <div class="jp_footer_candidate">
                                    <h2>For Employers</h2>
                                    <ul>
                                        <!-- dashboard-link -->
                                        <?php if(Auth::user() !== null){
                                            $useres = Auth::user();
                                            if($useres->job_id == 1){ ?>
                                            <li><a href="{{ url('/user') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Employer Dashboard</a></li>
                                        <?php }else{ ?>
                                            <li><a href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i> Employer Dashboard</a></li>
                                        <?php }}else{ ?>
                                            <li><a href="{{ url('/user-login') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Employer Dashboard</a></li>
                                        <?php } ?>
                                        <!-- Add-Job -->
                                        <?php if(Auth::user() !== null){
                                            $useres = Auth::user();
                                            if($useres->job_id == 1){ ?>
                                            <li><a href="{{ route('auth.create.job', [$useres->data_id]) }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Add Job</a></li>
                                        <?php }else{ ?>
                                            <li><a href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i> Add Job</a></li>
                                        <?php }}else{ ?>
                                            <li><a href="{{ url('/user-login') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Add Job</a></li>
                                        <?php } ?>
                                        <!-- Job-List-Page -->
                                        <li><a href="{{ url('/job') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Job Page</a></li>
                                        <!-- Employer-Jobs -->
                                        <?php if(Auth::user() !== null){
                                            $useres = Auth::user();
                                            if($useres->job_id == 1){ ?>
                                            <li><a href="{{ url('/your-jobs') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Your Jobs</a></li>
                                        <?php }else{ ?>
                                            <li><a href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i> Your Jobs</a></li>
                                        <?php }}else{ ?>
                                            <li><a href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i> Your Jobs</a></li>
                                        <?php } ?>
                                        <!-- Account-Link -->
                                        <?php if(Auth::user() !== null){ ?>
                                            <li><a href="{{ url('/user') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> My Account</a></li>
                                        <?php }else{ ?>
                                            <li><a href="{{ url('/user-login') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> My Account</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="jp_footer_candidate_wrapper jp_footer_candidate_wrapper4">
                                <div class="jp_footer_candidate">
                                    <h2>Information</h2>
                                    <ul>
                                        <li><a href="{{ url('/about-us') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> About Us</a></li>
                                        <li><a href="{{ url('/terms-and-conditions') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Terms & Conditions</a></li>
                                        <li><a href="{{ url('/privacy-policy') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Privacy Policy</a></li>
                                        <li><a href="{{ url('/faqs') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> FAQs</a></li>
                                        <li><a href="{{ url('/advertising-with-us') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Advertising With Us</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Sitemap</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="jp_bottom_footer_Wrapper">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="jp_bottom_footer_left_cont">
                                        <p>©2022 Scienze Jobs. All Rights Reserved.</p>
                                    </div>
                                    <div class="jp_bottom_top_scrollbar_wrapper">
                                        <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="jp_bottom_footer_right_cont">
                                        <ul>
                                            <?php if(!empty($facebook)){ ?>
                                                <li><a href="{{ $facebook }}" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                            <?php }if(!empty($twitter)){ ?>
                                                <li><a href="{{ $twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <?php }if(!empty($instagram)){ ?>
                                                <li><a href="{{ $instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <?php }if(!empty($linkedin)){ ?>
                                                <li><a href="{{ $linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
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

    <!--main js file start-->
    <script src="{{ url('assets/js/jquery.menu-aim.js') }}"></script>
    <script src="{{ url('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ url('assets/js/jquery.inview.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.js') }}"></script>
    <script src="{{ url('assets/js/modernizr.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>
    <script src="{{ url('assets/js/custom_II.js') }}"></script>

    <script>
        $(".chosen-select").chosen({max_selected_options: 5});
    </script>

</body>
</html>