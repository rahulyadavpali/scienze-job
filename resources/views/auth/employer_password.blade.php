@include('front.header')

    <!-- Block-Back-Option -->
    <script type="text/javascript">
        window.history.forward();
        function noBack(){window.history.forward();}
    </script>

    <script type="text/javascript">
        $().ready(function(){
            $("#pasword_form").validate({
                rules: {
                    password: {required: true},
                    password_confirmation: {required: true},
                },
                messages: {
                    password: {required: "Please creacte password atleast 6-characters."},
                    password_confirmation: {required: "Confirm Password should be equal to Password."},
                }
            });
        });
    </script>

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Create Profile Password</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/home') }}">Home</a> <i class="fa fa-angle-right"></i></li>
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
                            <!-- Nav tabs -->
                            <ul id="tabOne" class="nav register-tabs">
                                <li class="active"><a href="#contentOne-1" data-toggle="tab">Create Profile Password</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="login_wrapper">
                                        <div class="row clearfix">
                                            <form id="pasword_form" class="create_password" role="form" method="POST" action="{{ url('/creating-user') }}">
                                                @csrf
                                                <input type="hidden" name="role_id" id="role_id" value="2" />
                                                <input type="hidden" name="job_id" id="job_id" value="{{ $job_id }}" />
                                                <input type="hidden" name="employer_id" id="employer_id" value="{{ $user_id }}" />
                                                <input type="hidden" name="name" id="name" value="{{ $name }}" />
                                                <input type="hidden" name="email" id="email" value="{{ $email }}" />
                                                <div class="formsix-e">
                                                    <div class="form-group i-password">
                                                        <label for="password">Password*</label>
                                                        <input type="password" class="form-control" name="password" id="password" />
                                                        @if($errors->has('password'))
                                                            <p class="help-block error">{{ $errors->first('password') }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group i-password">
                                                        <label for="password_confirmation">Confirm Password*</label>
                                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
                                                        @if($errors->has('password_confirmation'))
                                                            <p class="help-block error">{{ $errors->first('password_confirmation') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                                    <button type="submit" id="submit" class="btn btn-primary login_btn">Next</button>
                                                </div>
                                                <div>
                                                    <ul>
                                                        <li>- Should have At least one Uppercase letter,</li>
                                                        <li>- At least one Lower case letter,</li>
                                                        <li>- Also, At least one numeric value,</li>
                                                        <li>- And, At least one special character,</li>
                                                        <li>- Must be greater than 6 characters.</li>
                                                    </ul>
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
    </div>

    <!-- Confirm-Password-Start -->
    <script type="text/javascript">
        jQuery('#pasword_form').validate({
			rules : {
				password : {minlength : 8},
				password_confirmation : {minlength : 8, equalTo : "#password"}
			}
		});

        $('#submit').click(function(){
            console.log($('#pasword_form').valid());
        });
    </script>

@include('front.footer')