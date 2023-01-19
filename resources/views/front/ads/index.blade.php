@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Register As Advertisement</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul class="ads_bread">
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><span>Register As Advertisement</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="register_section">
        <!-- register_form_wrapper -->
        <div class="register_tab_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div role="tabpanel">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="row clearfix">
                                        <form id="signup_form" class="signup_form" action="{{ route('creating.advertiser') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="role_id" id="role_id" value="2" />
                                            <input type="hidden" name="job_id" id="job_id" value="4" />
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="first_name">First Name*</label>
                                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First Name*" />
                                                @if($errors->has('first_name'))
                                                    <p class="help-block error">{{ $errors->first('first_name') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}" placeholder="Middle Name" />
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name" />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="email">Email Address*</label>
                                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address" />
                                                @if($errors->has('email'))
                                                    <p class="help-block error">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="mobile">Mobile Number</label>
                                                <input type="number" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Mobile Number" />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password" />
                                                @if($errors->has('password'))
                                                    <p class="help-block error">{{ $errors->first('password') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" value="{{ old('confirm_password') }}" placeholder="Password" />
                                                @if($errors->has('confirm_password'))
                                                    <p class="help-block error">{{ $errors->first('confirm_password') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="check-box text-center">
                                                    <input type="checkbox" name="checkbox" id="account-option_3" required />
                                                    <label for="account-option_3">I agreed to the <a href="{{ url('/terms-and-conditions') }}" target="_blank" class="check_box_anchr">Terms & Conditions</a> and <a href="{{ url('/privacy-policy') }}" target="_blank" class="check_box_anchr">Privacy Policy</a> governing the use of scienzejobs.com</label>
                                                    @if($errors->has('checkbox'))
                                                        <p class="help-block error">{{ $errors->first('checkbox') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="login_btn_wrapper register_btn_wrapper login_wrapper">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary login_btn">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm-Password-Start -->
    <script type="text/javascript">
        jQuery('#signup_form').validate({
			rules : {
				password : {minlength : 8},
				confirm_password : {minlength : 8, equalTo : "#password"}
			}
		});

        $('#submit').click(function(){
            console.log($('#signup_form').valid());
        });
    </script>

@include('front.footer')