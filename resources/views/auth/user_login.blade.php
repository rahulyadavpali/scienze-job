@include('front.header')

    <script type="text/javascript">
        $().ready(function(){
            $("#login_form").validate({
                rules: {password: {required: true},},
                messages: {password: {required: "Please creacte password atleast 6-characters."},}
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
                            <h2>Login</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/home') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Login</li>
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
					<div class="col-md-8 col-md-offset-2">
						<h1>LOGIN TO YOUR ACCOUNT</h1>
						<div class="login_wrapper">
                            <form id="login_form" class="login_forms" role="form" method="POST" action="{{ url('login-user') }}">
                                @csrf
                                <div class="formsix-pos">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Username*" required />
                                    </div>
                                </div>
                                <div class="formsix-e">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password*" required />
                                    </div>
                                </div>
                                @error('email')
                                    <p class="help-block error">{{ $message }}</p>
                                @enderror
                                @error('password')
                                    <p class="help-block error">{{ $message }}</p>
                                @enderror
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
                                    <p>Don’t have an account ? <a href="{{ url('/sign-up') }}">Register Now</a></p>
                                </div>
                            </form>
						</div>
						<p class="seller_text">Are you a advertiser, <a href="{{ url('/advertiser-login') }}">Login from here</a>.</p>
						<p>In case you are using a public/shared computer we recommend that you logout to prevent any un-authorized access to your account.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@include('front.footer')