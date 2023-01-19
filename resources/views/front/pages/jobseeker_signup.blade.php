@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Job-Seeker Sign-Up</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/sign-up') }}">Select Role</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Job-Seeker Sign-Up</li>
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
                                        <form id="registration_form" class="registration_form" action="{{ route('create.job-seeker') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="role_id" id="role_id" value="2" />
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
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
                                                <label for="dob">Date Of Birth*</label>
                                                <input type="date" name="dob" id="dob" placeholder="dd-mm-yyyy" value="{{ old('dob') }}" />
                                                @if($errors->has('dob'))
                                                    <p class="help-block error">{{ $errors->first('dob') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="email">Email*</label>
                                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address*" />
                                                @if($errors->has('email'))
                                                    <p class="help-block error">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="mobile_number">Mobile Number*</label>
                                                <input type="number" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}" placeholder="Mobile Number*" />
                                                @if($errors->has('mobile_number'))
                                                    <p class="help-block error">{{ $errors->first('mobile_number') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="other_number">Any Other Contact Number (Optional)</label>
                                                <input type="number" name="other_number" id="other_number" value="{{ old('other_number') }}" placeholder="Any Other Contact Number" />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="photo">Photograph (attachment)*</label>
                                                    <input type='file' name="photo" id="photo" value="{{ old('photo') }}" />
                                                    @if($errors->has('photo'))
                                                        <p class="help-block error">{{ $errors->first('photo') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div id="image-preview" class="choose_feature image-preview"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="resume">CV (attachment)*</label>
                                                <input type='file' name="resume" id="resume" value="{{ old('resume') }}" />
                                                @if($errors->has('resume'))
                                                    <p class="help-block error">{{ $errors->first('resume') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="description">About Your Self*</label>
                                                <textarea name="description" id="description" placeholder="About Your Self..." rows="8">{{ old('description') }}</textarea>
                                                @if($errors->has('description'))
                                                    <p class="help-block error">{{ $errors->first('description') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="presernt_work">Details of the present employment*</label>
                                                <textarea name="presernt_work" id="presernt_work" placeholder="Details of the present employment..." rows="4">{{ old('presernt_work') }}</textarea>
                                                @if($errors->has('presernt_work'))
                                                    <p class="help-block error">{{ $errors->first('presernt_work') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="exp_salary">Expected Salary*</label>
                                                <input type="text" name="exp_salary" id="exp_salary" value="{{ old('exp_salary') }}" placeholder="Expected Salary" />
                                                @if($errors->has('exp_salary'))
                                                    <p class="help-block error">{{ $errors->first('exp_salary') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="address">Address 1*</label>
                                                <textarea name="address" id="address" placeholder="Address One..." rows="2">{{ old('address') }}</textarea>
                                                @if($errors->has('address'))
                                                    <p class="help-block error">{{ $errors->first('address') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="address2">Address 2</label>
                                                <textarea name="address2" id="address2" placeholder="Address Two..." rows="2">{{ old('address2') }}</textarea>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="zip_code">Postal/Zip Code*</label>
                                                <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" placeholder="Postal/Zip Code" />
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
                                                    <option disabled selected value="">State</option>
                                                    <?php foreach($state as $states){ ?>
                                                        <option value="{{ $states->state }}" @if (old("state") == "$states->state") selected="selected" @endif>{{ $states->state }}</option>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('state'))
                                                    <p class="help-block error">{{ $errors->first('state') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group multi_select col-md-6 col-sm-6 col-xs-12">
                                                <label for="subcategories">Categories (Select Atleast Five Category)*</label>
                                                <select class="form-select chosen-select" multiple="multiple" name="subcategories[]" id="subcategories" data-placeholder="Selection of job by subject of research/specialisation">
                                                    <?php foreach($category as $categories){ ?>
                                                        <optgroup label="{{ $categories->title }}">
                                                            <?php foreach($subcategory as $subcategories){if($categories->id == $subcategories->category_id){ ?>
                                                                <option value="{{ $subcategories->id }}">{{ $subcategories->title }}</option>
                                                            <?php }} ?>
                                                        </optgroup>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('subcategories'))
                                                    <p class="help-block error">{{ $errors->first('subcategories') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="selection_job">Selection of job by Designation*</label>
                                                <select class="form-select" name="selection_job" id="selection_job">
                                                    <option disabled selected value="">Select job by Designation</option>
                                                    <?php foreach($designation as $designations){ ?>
                                                        <option value="{{ $designations->id }}" @if (old("selection_job") == "$designations->id") selected="selected" @endif>{{ $designations->title }}</option>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('selection_job'))
                                                    <p class="help-block error">{{ $errors->first('selection_job') }}</p>
                                                @endif
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
				input_field: "#photo",
				preview_box: "#image-preview",
				label_field: "#photo",
				label_default: "Choose File",
				label_selected: "Change File",
				no_label: false
			});
		});
	</script>

@include('front.footer')