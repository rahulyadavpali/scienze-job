@include('front.header')

    <script type="text/javascript">
        $().ready(function(){
            $("#login_form").validate({
                rules: {password: {required: true},},
                messages: {password: {required: "Please creacte password atleast 8-characters."},}
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
                            <h2>Advertiser Login</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul class="ads_bread">
                                    <li><a href="{{ url('/home') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><span>Advertiser Login</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jp login wrapper start -->
	<div class="login_section">
		<div class="login_form_wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 ad_login_div">
						<h1>LOGIN TO YOUR <span>Advertiser</span> ACCOUNT</h1>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were problems with input:
                                <br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
						<div class="login_wrapper">
                            <form id="login_form" class="login_forms" role="form" method="POST" action="{{ url('login-advertisement') }}">
                                @csrf
                                <div class="formsix-pos">
                                    <div class="form-group i-email">
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Username*" />
                                    </div>
                                    @if($errors->has('email'))
                                        <p class="help-block error">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="formsix-e">
                                    <div class="form-group i-password">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password *" />
                                    </div>
                                    @if($errors->has('password'))
                                        <p class="help-block error">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="login_remember_box">
                                    <label class="control control--checkbox">Remember me
                                        <input type="checkbox" name="remember" id="remember"><span class="control__indicator"></span>
                                    </label>
                                    <!-- <a href="#" class="forget_password">Forgot Password</a> -->
                                </div>
                                <div class="login_btn_wrapper">
                                    <button type="submit" id="submit" class="btn btn-primary login_btn">Login</button>
                                </div>
                                <div class="login_message">
                                    <p>Don’t have an account ? <a href="{{ url('/advertising-with-us') }}">Register Now</a></p>
                                </div>
                            </form>
						</div>
						<p>In case you are using a public/shared computer we recommend that you logout to prevent any un-authorized access to your account.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@include('front.footer')