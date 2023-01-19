@include('front.header')

    <!-- State-DropDown -->
    <script>
        var stateObject = new Array("Andhra Pradesh", "Andaman and Nicobar Islands", "Arunachal Pradesh", "Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala", "Ladakh", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", "Uttarakhand", "West Bengal");
        window.onload = function()
        {
            var stateSel = document.getElementById("state");
            for(var i=0; i<stateObject.length; i++)
            {
                stateSel.options[stateSel.options.length] = new Option(stateObject[i]);
            }
        }
    </script>

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Edit Profile</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/user') }}">Profile</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Edit Profile</li>
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
                                <li class="active"><a href="#contentOne-1" data-toggle="tab">Edit Profile</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="jp_regiter_top_heading">
                                        <p>Fields with * are mandetory</p>
                                    </div>
                                    <div class="row clearfix">
                                        {!! Form::model($user_detail, ['method' => 'POST', 'route' => ['auth.update.employer', $user_detail->id], 'files'=>true,]) !!}
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="prefix">Select Title For You*</label>
                                                <select name="prefix" id="prefix">
                                                    <option selected value="{{ $user_detail->prefix }}">{{ $user_detail->prefix }}</option>
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Ms.">Ms.</option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Prof.">Prof.</option>
                                                </select>
                                                @if($errors->has('prefix'))
                                                    <p class="help-block error">{{ $errors->first('prefix') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="first_name">First Name*</label>
                                                <input type="text" name="first_name" id="first_name" value="{{ $user_detail->first_name }}" />
                                                @if($errors->has('first_name'))
                                                    <p class="help-block error">{{ $errors->first('first_name') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" name="middle_name" id="middle_name" value="{{ $user_detail->middle_name }}" />
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" name="last_name" id="last_name" value="{{ $user_detail->last_name }}" />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="email">Email*</label>
                                                <input type="email" name="email" id="email" value="{{ $user_detail->email }}" />
                                                @if($errors->has('email'))
                                                    <p class="help-block error">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="contact_number">Contact Number*</label>
                                                <input type="number" name="contact_number" id="contact_number" value="{{ $user_detail->contact_number }}" />
                                                @if($errors->has('contact_number'))
                                                    <p class="help-block error">{{ $errors->first('contact_number') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="whatsapp_number">Whatsapp Number (Optional)</label>
                                                <input type="number" name="whatsapp_number" id="whatsapp_number" value="{{ $user_detail->whatsapp_number }}" />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_name">Institute/University/Organization Name*</label>
                                                <input type="text" name="company_name" id="company_name" value="{{ $user_detail->company_name }}" />
                                                @if($errors->has('company_name'))
                                                    <p class="help-block error">{{ $errors->first('company_name') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_website">Institute/University/Organization Website (Link)</label>
                                                <input type="text" name="company_website" id="company_website" value="{{ $user_detail->company_website }}" />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_description">Institute/University/Organization Description*</label>
                                                <textarea name="company_description" id="company_description" rows="8">{{ $user_detail->company_description }}</textarea>
                                                @if($errors->has('company_description'))
                                                    <p class="help-block error">{{ $errors->first('company_description') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="e_company_logo">Institute/University/Organization Logo*</label>
                                                    <input type='file' name="e_company_logo" id="e_company_logo" value="{{ $user_detail->company_logo }}" />
                                                    <div id="image-preview" class="choose_feature image-preview"></div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="selected_feature">
                                                        <img src="{{ url('upload/employer/'.$user_detail->company_logo) }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_address">Postal Address*</label>
                                                <textarea name="company_address" id="company_address" rows="3">{{ $user_detail->company_address }}</textarea>
                                                @if($errors->has('company_address'))
                                                    <p class="help-block error">{{ $errors->first('company_address') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="zip_code">Postal/Zip Code*</label>
                                                <input type="text" name="zip_code" id="zip_code" value="{{ $user_detail->zip_code }}" />
                                                @if($errors->has('zip_code'))
                                                    <p class="help-block error">{{ $errors->first('zip_code') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="city">City*</label>
                                                <input type="text" name="city" id="city" value="{{ $user_detail->city }}" />
                                                @if($errors->has('city'))
                                                    <p class="help-block error">{{ $errors->first('city') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="state">State*</label>
                                                <select class="form-select" name="state" id="state">
                                                    <option value="{{ $user_detail->state }}">{{ $user_detail->state }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_location">Map Location</label>
                                                <textarea name="company_location" id="company_location" rows="8">{{ $user_detail->company_location }}</textarea>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="linkedin" style="color: #0072b1;"><i class="fa fa-linkedin-square"></i> Linkedin</label>
                                                <input type="text" name="linkedin" id="linkedin" value="{{ $user_detail->linkedin }}" />
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="facebook" style="color: #4267B2;"><i class="fa fa-facebook-official"></i> Facebook</label>
                                                <input type="text" name="facebook" id="facebook" value="{{ $user_detail->facebook }}" />
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="twitter" style="color: #1DA1F2;"><i class="fa fa-twitter-square"></i> Twitter</label>
                                                <input type="text" name="twitter" id="twitter" value="{{ $user_detail->twitter }}" />
                                            </div>
                                            <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                                <button class="btn btn-primary login_btn" type="submit" value="Save">Update</button>
                                            </div>
                                        {!! Form::close() !!}
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
				input_field: "#e_company_logo",
				preview_box: "#image-preview",
				label_field: "#e_company_logo",
				label_default: "Choose File",
				label_selected: "Change File",
				no_label: false
			});
		});
	</script>

@include('front.footer')