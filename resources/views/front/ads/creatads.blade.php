@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Create Advetise</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul class="ads_bread">
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/advertiser-user') }}">Seller Profile</a> <i class="fa fa-angle-right"></i></li>
                                    <li><span>Create Advetise</span></li>
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
                                        <form id="signup_form" class="signup_form" action="{{ route('auth.seller.createadvertise') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="user_id" id="user_id" value="{{ $user_detail->id }}" />
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" value="{{ $user_detail->email }}" readonly />
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <fieldset style="margin-top: 10px;border: 1px solid #e5e5e5;padding: 10px 0;">
                                                    <legend style="font-size:15px;margin-bottom: 2px; text-align: left;border-style: none;width: 150px;margin-left: 12px;">Plan Detail</legend>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="plan_name">Plan Name</label>
                                                        <input type="text" name="plan_name" id="plan_name" value="{{ $plans->plan_name }}" readonly />
                                                    </div>
                                                    <input type="hidden" name="plan_id" id="plan_id" value="{{ $plans->id }}" />
                                                </fieldset>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <fieldset style="margin-top: 10px;border: 1px solid #e5e5e5;padding: 10px 0;">
                                                    <legend style="font-size:15px;margin-bottom: 2px; text-align: left;border-style: none;width: 150px;margin-left: 12px;">Adevrtisement Images</legend>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="name">Name*</label>
                                                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Small description about image..." />
                                                        @if($errors->has('name'))
                                                            <p class="help-block error">{{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="link">Link*</label>
                                                        <input type="text" name="link" id="link" value="{{ old('link') }}" placeholder="Website Link OR the page you want to redirect" />
                                                        @if($errors->has('link'))
                                                            <p class="help-block error">{{ $errors->first('link') }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="image">Vertical Adevrtisement Image*</label>
                                                        <input type="file" name="image" id="image" value="{{ old('image') }}" required />
                                                        @if($errors->has('image'))
                                                            <p class="help-block error">{{ $errors->first('image') }}</p>
                                                        @endif
                                                        <p style="font-size: 14px;">Image dimension must be width: 260px, height: 380px</p>
                                                    </div>
                                                </fieldset>
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

@include('front.footer')