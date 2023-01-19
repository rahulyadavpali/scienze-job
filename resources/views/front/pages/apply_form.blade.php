@include('front.header')

    <script type="text/javascript">
        $().ready(function(){
            $("#registration_form").validate({
                rules:{
                    name: {required: true}, 
                    father_name: {required: true}, 
                    email: {required: true}, 
                    password: {required: true}, 
                    confirm: {required: true}, 
                    experience: {required: true}, 
                    address: {required: true}, 
                    state: {required: true}, 
                    city: {required: true}, 
                    zip_code: {required: true}, 
                    image: {required: true}, 
                    resume: {required: true}
                },
                messages: {
                    name: {required: "Enter Your Full Name."}, 
                    father_name: {required: "Enter Your Fathers Name."}, 
                    email: {required: "Enter Your Email Address."}, 
                    password: {required: "Create a Strong Password."}, 
                    confirm: {required: "Confirm Your Password."}, 
                    experience: {required: "Enter Your Work Experience."}, 
                    address: {required: "Enter Address."}, 
                    state: {required: "Select Your State."}, 
                    city: {required: "Select Your City."}, 
                    zip_code: {required: "Enter Your City Postel Code."}, 
                    image: {required: "Upload Your Photo."}, 
                    resume: {required: "Upload Your CV(Resume)."}
                }
            });
        });
    </script>

    <div class="register_section">
        <!-- register_form_wrapper -->
        <div class="register_tab_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul id="tabOne" class="nav register-tabs">
                                <li class="active"><a href="#contentOne-1" data-toggle="tab">i am looking for a job</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="jp_regiter_top_heading">
                                        <p>Fields with * are mandetory </p>
                                    </div>
                                    <div class="row">
                                        <form id="registration_form" class="registrater_form" method="POST" enctype="multipart/form-data" action="{{ route('job.apply.save') }}">
                                            @csrf
                                            <input type="hidden" name="job_id" id="job_id" value="{{ $jb_id }}" />
                                            <input type="hidden" name="role_id" id="role_id" value="3" />
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="name">Full Name*</label>
                                                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Full Name" />
                                                @if($errors->has('name'))
                                                    <p class="help-block">{{ $errors->first('name') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="father_name">Father Name*</label>
                                                <input type="text" name="father_name" id="father_name" value="{{ old('father_name') }}" placeholder="Father's Name" />
                                                @if($errors->has('father_name'))
                                                    <p class="help-block">{{ $errors->first('father_name') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="phone">Mobile Number</label>
                                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Mobile Number" />
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="email">Email*</label>
                                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email*" />
                                                @if($errors->has('email'))
                                                    <p class="help-block">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="password">Password*</label>
                                                <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password" />
                                                @if($errors->has('password'))
                                                    <p class="help-block">{{ $errors->first('password') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="confirm">Confirm Password</label>
                                                <input type="password" name="confirm" id="confirm" value="{{ old('confirm') }}" placeholder="re-enter password*" />
                                                @if($errors->has('confirm'))
                                                    <p class="help-block">{{ $errors->first('confirm') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="qualification">Qualification</label>
                                                <input type="text" name="qualification" id="qualification" value="{{ old('qualification') }}" placeholder="Qualification" />
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="experience">Years of Experience*</label>
                                                <input type="text" name="experience" id="experience" value="{{ old('experience') }}" placeholder="Years of Experience" />
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="last_work">Last Work</label>
                                                <input type="text" name="last_work" id="last_work" value="{{ old('last_work') }}" placeholder="When Last work" />
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="address">Address*</label>
                                                <input type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Current Address" />
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="city">City*</label>
                                                <input type="text" name="city" id="city" placeholder="City" />
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="state">State*</label>
                                                <select class="form-select" name="state" id="state">
                                                    <option selected disabled value="">State</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Odisha">Odisha</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="zip_code">Zip Code*</label>
                                                <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" placeholder="Zip Code" />
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 custom_input">
                                                        <label for="image">Image*</label>
                                                        <input type='file' name="image" id="image" />
                                                        <div id="image-preview" class="choose_feature image-preview"></div>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 custom_input">
                                                        <label for="resume">Upload CV*</label>
                                                        <input type="file" name="resume" id="resume" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="check-box text-center">
                                                    <input type="checkbox" name="agree" id="agree" required />
                                                    &ensp;
                                                    <label for="account-option_1">I agreed to the <a href="#" class="check_box_anchr">Terms and Conditions</a> governing the use of jobportal.</label>
                                                </div>
                                            </div>
                                            <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                                <button type="submit" id="submit" class="btn btn-primary login_btn">register</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="login_message">
                                        <p>Already a member? <a href="#"> Login Here </a> </p>
                                    </div>
                                </div>
                            </div>
                            <p class="btm_txt_register_form">In case you are using a public/shared computer we recommend that you logout to prevent any un-authorized access to your account</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm-Password-Start -->
    <script type="text/javascript">
        jQuery('#registration_form').validate({
			rules : {
				password : {minlength : 6},
				confirm : {minlength : 6, equalTo : "#password"}
			}
		});

        $('#submit').click(function(){
            console.log($('#registration_form').valid());
        });
    </script>

    <!-- Image-Preview -->
    <script type="text/javascript">
		$(document).ready(function(){
			$.uploadPreview({
				input_field: "#image",
				preview_box: "#image-preview",
				label_field: "#image",
				label_default: "Choose File",
				label_selected: "Change File",
				no_label: false
			});
		});
	</script>

@include('front.footer')