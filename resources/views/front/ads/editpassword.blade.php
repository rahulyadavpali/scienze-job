@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Edit Password</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul class="ads_bread">
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/advertiser-user') }}">Seller Profile</a> <i class="fa fa-angle-right"></i></li>
                                    <li><span>Edit Password</span></li>
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
                                        <form id="signup_form" class="signup_form" action="{{ route('auth.update.advertiser.password') }}" method="POST">
                                            @csrf
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" value="{{ $user_detail->email }}" readonly />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="password">New Password</label>
                                                <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password" />
                                                @if($errors->has('password'))
                                                    <p class="help-block error">{{ $errors->first('password') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="confirm_password">Confirm New Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" value="{{ old('confirm_password') }}" placeholder="Password" />
                                                @if($errors->has('confirm_password'))
                                                    <p class="help-block error">{{ $errors->first('confirm_password') }}</p>
                                                @endif
                                            </div>
                                            <div class="login_btn_wrapper register_btn_wrapper login_wrapper">
                                                <button type="submit" name="submit" class="btn btn-primary login_btn">Submit</button>
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