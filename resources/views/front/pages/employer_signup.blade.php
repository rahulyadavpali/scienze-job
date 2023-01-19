@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Employer Sign-Up</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/sign-up') }}">Select Role</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Employer Sign-Up</li>
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
                                <li class="active"><a href="#contentOne-1" data-toggle="tab">New Registration</a></li>
                                <li><a href="{{ url('/user-login') }}">Already Have Account</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="jp_regiter_top_heading">
                                        <p>Fields with * are mandetory</p>
                                    </div>
                                    <div class="row clearfix">
                                        <form id="registration_form" class="registration_form" action="{{ route('create.employer') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="role_id" id="role_id" value="2" />
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="prefix">Institute Type*</label>
                                                <select class="form-select" name="institute_type" id="institute_type" required>
                                                    <option disabled selected value="">Select Institute Type</option>
                                                    <?php foreach($jobtype as $job_type){ ?>
                                                        <option value="{{ $job_type->id }}" @if (old("institute_type") == "$job_type->id") selected="selected" @endif>{{ $job_type->title }}</option>
                                                    <?php } ?>
                                                </select>
                                                <label for="prefix">Select Title For You*</label>
                                                <select name="prefix" id="prefix">
                                                    <option disabled selected value="">Select Title For You</option>
                                                    <option value="Mr." @if (old("prefix") == "Mr.") selected="selected" @endif>Mr.</option>
                                                    <option value="Ms." @if (old("prefix") == "Ms.") selected="selected" @endif>Ms.</option>
                                                    <option value="Dr." @if (old("prefix") == "Dr.") selected="selected" @endif>Dr.</option>
                                                    <option value="Prof." @if (old("prefix") == "Prof.") selected="selected" @endif>Prof.</option>
                                                </select>
                                                @if($errors->has('prefix'))
                                                    <p class="help-block error">{{ $errors->first('prefix') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="first_name">First Name*</label>
                                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First Name*" required />
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
                                                <label for="email">Email*</label>
                                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address*" required />
                                                @if($errors->has('email'))
                                                    <p class="help-block error">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="contact_number">Contact Number*</label>
                                                <input type="number" name="contact_number" id="contact_number" value="{{ old('contact_number') }}" placeholder="Contact Number*" required />
                                                @if($errors->has('contact_number'))
                                                    <p class="help-block error">{{ $errors->first('contact_number') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="whatsapp_number">Whatsapp Number (Optional)</label>
                                                <input type="number" name="whatsapp_number" id="whatsapp_number" placeholder="Whatsapp Number" />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_name">Institute/University/Organization Name*</label>
                                                <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" placeholder="Institute/university/organization" required />
                                                @if($errors->has('company_name'))
                                                    <p class="help-block error">{{ $errors->first('company_name') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_website">Institute/University/Organization Website (Link)</label>
                                                <input type="text" name="company_website" id="company_website" placeholder="Website" />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_description">Institute/University/Organization Description*</label>
                                                <textarea name="company_description" id="company_description" placeholder="Institute/University/Organization Description..." rows="8" required>{{ old('company_description') }}</textarea>
                                                @if($errors->has('company_description'))
                                                    <p class="help-block error">{{ $errors->first('company_description') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_logo">Institute/University/Organization Logo*</label>
                                                <input type='file' name="company_logo" id="company_logo" value="{{ old('company_logo') }}" required />
                                                @if($errors->has('company_logo'))
                                                    <p class="help-block error">{{ $errors->first('company_logo') }}</p>
                                                @endif
                                                <div id="image-preview" class="choose_feature image-preview"></div>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_address">Postal Address*</label>
                                                <textarea name="company_address" id="company_address" placeholder="Postal Address" rows="3" required>{{ old('company_address') }}</textarea>
                                                @if($errors->has('company_address'))
                                                    <p class="help-block error">{{ $errors->first('company_address') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="zip_code">Postal/Zip Code*</label>
                                                <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" placeholder="Postal/Zip Code" required />
                                                @if($errors->has('zip_code'))
                                                    <p class="help-block error">{{ $errors->first('zip_code') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <label for="city">City*</label>
                                                <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="City" />
                                                @if($errors->has('city'))
                                                    <p class="help-block error">{{ $errors->first('city') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="state">State*</label>
                                                <select class="form-select" name="state" id="state">
                                                    <option selected disabled value="">State</option>
                                                    <?php foreach($state as $states){ ?>
                                                        <option value="{{ $states->state }}" @if (old("state") == "$states->state") selected="selected" @endif>{{ $states->state }}</option>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('state'))
                                                    <p class="help-block error">{{ $errors->first('state') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_location">Map Location</label>
                                                <textarea name="company_location" id="company_location" placeholder="Google Map Location" rows="4"></textarea>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="linkedin" style="color: #0072b1;"><i class="fa fa-linkedin-square"></i> Linkedin</label>
                                                <input type="text" name="linkedin" id="linkedin" placeholder="Linkedin (Link)" />
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="facebook" style="color: #4267B2;"><i class="fa fa-facebook-official"></i> Facebook</label>
                                                <input type="text" name="facebook" id="facebook" placeholder="Facebook (Link)" />
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="twitter" style="color: #1DA1F2;"><i class="fa fa-twitter-square"></i> Twitter</label>
                                                <input type="text" name="twitter" id="twitter" placeholder="Twitter (Link)" />
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="check-box text-center">
                                                    <input type="checkbox" name="checkbox" id="account-option_1" required />
                                                    &ensp;
                                                    <label for="account-option_1">I agreed to the <a href="{{ url('/terms-and-conditions') }}" target="_blank" class="check_box_anchr">Terms & Conditions</a> and <a href="{{ url('/privacy-policy') }}" target="_blank" class="check_box_anchr">Privacy Policy</a> governing the use of scienzejobs.com</label>
                                                    @if($errors->has('checkbox'))
                                                        <p class="help-block error">{{ $errors->first('checkbox') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                                <button type="submit" class="btn btn-primary login_btn">Next</button>
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

    <!-- Image-Preview -->
    <script type="text/javascript">
		$(document).ready(function(){
			$.uploadPreview({
				input_field: "#company_logo",
				preview_box: "#image-preview",
				label_field: "#company_logo",
				label_default: "Choose File",
				label_selected: "Change File",
				no_label: false
			});
		});
	</script>

@include('front.footer')