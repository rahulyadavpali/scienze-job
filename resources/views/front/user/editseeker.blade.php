@include('front.header')

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
                                        {!! Form::model($user_detail, ['method' => 'POST', 'route' => ['auth.update.jobseeker', $user_detail->id], 'files'=>true,]) !!}
                                            <input type="hidden" name="role_id" id="role_id" value="2" />
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="prefix">Select Title For You*</label>
                                                <select name="prefix" id="prefix">
                                                    <option selected value="{{ $user_detail->prefix }}">{{ $user_detail->prefix }}</option>
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
                                                <label for="dob">Date Of Birth*</label>
                                                <input type="date" name="dob" id="dob" value="{{ $user_detail->dob }}" />
                                                @if($errors->has('dob'))
                                                    <p class="help-block error">{{ $errors->first('dob') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="email">Email*</label>
                                                <input type="email" name="email" id="email" value="{{ $user_detail->email }}" />
                                                @if($errors->has('email'))
                                                    <p class="help-block error">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="mobile_number">Mobile Number*</label>
                                                <input type="number" name="mobile_number" id="mobile_number" value="{{ $user_detail->mobile_number }}" />
                                                @if($errors->has('mobile_number'))
                                                    <p class="help-block error">{{ $errors->first('mobile_number') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="other_number">Any Other Contact Number (Optional)</label>
                                                <input type="number" name="other_number" id="other_number" value="{{ $user_detail->other_number }}" />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="e_photo">Photograph (attachment)*</label>
                                                    <input type='file' name="e_photo" id="e_photo" value="{{ $user_detail->photo }}" />
                                                    @if($errors->has('e_photo'))
                                                        <p class="help-block error">{{ $errors->first('e_photo') }}</p>
                                                    @endif
                                                    <div id="image-preview" class="choose_feature image-preview"></div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="selected_feature">
                                                        <img src="{{ url('upload/applicant-image/'.$user_detail->photo) }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="e_resume">CV (attachment)*</label>
                                                <input type='file' name="e_resume" id="e_resume" value="{{ $user_detail->resume }}" />
                                                @if($errors->has('e_resume'))
                                                    <p class="help-block error">{{ $errors->first('e_resume') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="description">About Your Self*</label>
                                                <textarea name="description" id="description" rows="8">{{ $user_detail->description }}</textarea>
                                                @if($errors->has('description'))
                                                    <p class="help-block error">{{ $errors->first('description') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="presernt_work">Details of the present employment*</label>
                                                <textarea name="presernt_work" id="presernt_work" rows="4">{{ $user_detail->presernt_work }}</textarea>
                                                @if($errors->has('presernt_work'))
                                                    <p class="help-block error">{{ $errors->first('presernt_work') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="exp_salary">Expected Salary*</label>
                                                <input type="text" name="exp_salary" id="exp_salary" value="{{ $user_detail->exp_salary }}" />
                                                @if($errors->has('exp_salary'))
                                                    <p class="help-block error">{{ $errors->first('exp_salary') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="address">Address 1*</label>
                                                <textarea name="address" id="address" rows="2">{{ $user_detail->address }}</textarea>
                                                @if($errors->has('address'))
                                                    <p class="help-block error">{{ $errors->first('address') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="address2">Address 2</label>
                                                <textarea name="address2" id="address2" rows="2">{{ $user_detail->address2 }}</textarea>
                                                @if($errors->has('address2'))
                                                    <p class="help-block error">{{ $errors->first('address2') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="zip_code">Postal/Zip Code*</label>
                                                <input type="text" name="zip_code" id="zip_code" value="{{ $user_detail->zip_code }}" />
                                                @if($errors->has('zip_code'))
                                                    <p class="help-block error">{{ $errors->first('zip_code') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <label for="city">City*</label>
                                                <input type="text" name="city" id="city" value="{{ $user_detail->city }}" />
                                                @if($errors->has('city'))
                                                    <p class="help-block error">{{ $errors->first('city') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="state">State*</label>
                                                <select class="form-select" name="state" id="state">
                                                    <option selected value="{{ $user_detail->state }}">{{ $user_detail->state }}</option>
                                                    <?php foreach($state as $states){ ?>
                                                        <option value="{{ $states->state }}" @if (old("state") == "$states->state") selected="selected" @endif>{{ $states->state }}</option>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('state'))
                                                    <p class="help-block error">{{ $errors->first('state') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="linkedin" style="color: #0072b1;"><i class="fa fa-linkedin-square"></i> Linkedin</label>
                                                <input type="text" name="linkedin" id="linkedin" placeholder="Linkedin (Link)" value="{{ $user_detail->linkedin }}" />
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="facebook" style="color: #4267B2;"><i class="fa fa-facebook-official"></i> Facebook</label>
                                                <input type="text" name="facebook" id="facebook" placeholder="Facebook (Link)" value="{{ $user_detail->facebook }}" />
                                            </div>
                                            <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                                <label for="twitter" style="color: #1DA1F2;"><i class="fa fa-twitter-square"></i> Twitter</label>
                                                <input type="text" name="twitter" id="twitter" placeholder="Twitter (Link)" value="{{ $user_detail->twitter }}" />
                                            </div>
                                            <div class="form-group multi_select col-md-6 col-sm-6 col-xs-12">
                                                <label for="subcategories">Categories (Select Atleast Five Category)*</label>
                                                <select class="form-select chosen-select" multiple="multiple" name="subcategories[]" id="subcategories" data-placeholder="Selection of job by subject of research/specialisation">
                                                    <?php foreach($category as $categories){ ?>
                                                        <optgroup label="{{ $categories->title }}">
                                                            <?php foreach($subcategory as $subcategories){ ?>
                                                                <?php if($categories->id == $subcategories->category_id){ ?>
                                                                    <?php if($subcategories->id == $user_detail->subcategories1){ ?>
                                                                        <option selected value="{{ $subcategories->id }}">{{ $subcategories->title }}</option>
                                                                    <?php }elseif($subcategories->id == $user_detail->subcategories2){ ?>
                                                                        <option selected value="{{ $subcategories->id }}">{{ $subcategories->title }}</option>
                                                                    <?php }elseif($subcategories->id == $user_detail->subcategories3){ ?>
                                                                        <option selected value="{{ $subcategories->id }}">{{ $subcategories->title }}</option>
                                                                    <?php }elseif($subcategories->id == $user_detail->subcategories4){ ?>
                                                                        <option selected value="{{ $subcategories->id }}">{{ $subcategories->title }}</option>
                                                                    <?php }elseif($subcategories->id == $user_detail->subcategories5){ ?>
                                                                        <option selected value="{{ $subcategories->id }}">{{ $subcategories->title }}</option>
                                                                    <?php }else{ ?>
                                                                        <option value="{{ $subcategories->id }}">{{ $subcategories->title }}</option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </optgroup>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('subcategories'))
                                                    <p class="help-block error">{{ $errors->first('subcategories') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="selection_job">Selection of job by Designation*</label>
                                                <?php $selection_job = DB::table('designation')->where('id', '=', $user_detail->selection_job)->get(); ?>
                                                <select class="form-select" name="selection_job" id="selection_job" required>
                                                    <option value="{{ $selection_job[0]->id }}">{{ $selection_job[0]->title }}</option>
                                                    <?php foreach($designation as $designations){ ?>
                                                        <option value="{{ $designations->id }}" @if (old("selection_job") == "$designations->id") selected="selected" @endif>{{ $designations->title }}</option>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('selection_job'))
                                                    <p class="help-block error">{{ $errors->first('selection_job') }}</p>
                                                @endif
                                            </div>
                                            <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                                <button type="submit" class="btn btn-primary login_btn">Update</button>
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
				input_field: "#e_photo",
				preview_box: "#image-preview",
				label_field: "#e_photo",
				label_default: "Choose File",
				label_selected: "Change File",
				no_label: false
			});
            $('#dob').datetimepicker({
                format: '{{ config('app.date_format_js') }}',
            });
		});
	</script>

@include('front.footer')