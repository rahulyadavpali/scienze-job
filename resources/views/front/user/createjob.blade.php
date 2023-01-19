@include('front.header')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>ADD NEW JOB</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/user') }}">Profile</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Add New Job</li>
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
                                <li class="active"><a href="#contentOne-1" data-toggle="tab">Create New Job</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="jp_regiter_top_heading">
                                        <p>Fields with * are mandetory </p>
                                    </div>
                                    <div class="row">
                                        <form id="posting_form" class="job_posting_form" method="POST" enctype="multipart/form-data" action="{{ route('auth.create.store') }}">
                                            @csrf
                                            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" />
                                            <input type="hidden" name="employer_id" id="employer_id" value="{{ $user_detail->id }}" />
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" value="{{ $user_detail->email }}" readonly />
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="company_name">Institute/University/Organization</label>
                                                <input type="text" name="company_name" id="company_name" value="{{ $user_detail->company_name }}" readonly />
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="job_title">Job Title*</label>
                                                <input type="text" name="job_title" id="job_title" value="{{ old('job_title') }}" />
                                                @if($errors->has('job_title'))
                                                    <p class="help-block error">{{ $errors->first('job_title') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="post_no">Nunmber of post*</label>
                                                <input type="number" name="post_no" id="post_no" value="{{ old('post_no') }}" />
                                                @if($errors->has('post_no'))
                                                    <p class="help-block error">{{ $errors->first('post_no') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="salary">Salary*</label>
                                                <input type="text" name="salary" id="salary" value="{{ old('salary') }}" />
                                                @if($errors->has('salary'))
                                                    <p class="help-block error">{{ $errors->first('salary') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="expectation">Description*</label>
                                                <textarea name="expectation" id="expectation" placeholder="Expectations for the advertised position..." rows="4">{{ old('expectation') }}</textarea>
                                                @if($errors->has('expectation'))
                                                    <p class="help-block error">{{ $errors->first('expectation') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="copy">Copy of the advertisement(JPG)</label>
                                                    <input type='file' name="copy" id="copy" value="{{ old('copy') }}" />
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div id="image-preview" class="choose_feature image-preview"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="pdf">Copy of the advertisement(PDF)</label>
                                                    <input type='file' name="pdf" id="pdf" value="{{ old('pdf') }}" />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="remarks">Remarks</label>
                                                <textarea name="remarks" id="remarks" placeholder="Remarks if any..." rows="4">{{ old('remarks') }}</textarea>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="location">City*</label>
                                                <input type="text" name="location" id="location" value="{{ old('location') }}" />
                                                @if($errors->has('location'))
                                                    <p class="help-block error">{{ $errors->first('location') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="state">State*</label>
                                                <select class="form-select" name="state" id="state">
                                                    <option disabled selected value="">State</option>
                                                    <?php foreach($state as $states){ ?>
                                                        <option value="{{ $states->id }}" @if (old("state") == "$states->id") selected="selected" @endif>{{ $states->state }}</option>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('state'))
                                                    <p class="help-block error">{{ $errors->first('state') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="categories">Categories*</label>
                                                <select class="form-select" name="categories" id="category" required>
                                                    <option value="">Selection of job by subject of research/specialisation</option>
                                                    <?php foreach($category as $categories){ ?>
                                                        <option value="{{ $categories->id }}" @if (old("categories") == "$categories->id") selected="selected" @endif>{{ $categories->title }}</option>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('categories'))
                                                    <p class="help-block error">{{ $errors->first('categories') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="subcategories">Subcategories*</label>
                                                <select class="form-select" name="subcategories" id="subcategories" required>
                                                    <option value="">In Science/Medical Sciences</option>
                                                </select>
                                                @if($errors->has('subcategories'))
                                                    <p class="help-block error">{{ $errors->first('subcategories') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="selection_job">Selection of job by Designation*</label>
                                                <select class="form-select" name="selection_job" id="selection_job" required>
                                                    <option selected disabled value="">Select job by Designation</option>
                                                    <?php foreach($designation as $designations){ ?>
                                                        <option value="{{ $designations->id }}" @if (old("selection_job") == "$designations->id") selected="selected" @endif>{{ $designations->title }}</option>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('selection_job'))
                                                    <p class="help-block error">{{ $errors->first('selection_job') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="job_type">Job Type*</label>
                                                <select class="form-select" name="job_type" id="job_type" required>
                                                    <option selected disabled value="">Select Job Type</option>
                                                    <?php foreach($jobtype as $job_type){ ?>
                                                        <option value="{{ $job_type->id }}" @if (old("job_type") == "$job_type->id") selected="selected" @endif>{{ $job_type->title }}</option>
                                                    <?php } ?>
                                                </select>
                                                @if($errors->has('job_type'))
                                                    <p class="help-block error">{{ $errors->first('job_type') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="start_date">Start Date*</label>
                                                <input type="text" name="start_date" id="startDate" value="{{ old('start_date') }}" />
                                                @if($errors->has('start_date'))
                                                    <p class="help-block error">{{ $errors->first('start_date') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label for="end_date">End Date*</label>
                                                <input type="text" name="end_date" id="endDate" value="{{ old('end_date') }}" />
                                                @if($errors->has('end_date'))
                                                    <p class="help-block error">{{ $errors->first('end_date') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="meta_title">Meta Title</label>
                                                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" />
                                                @if($errors->has('meta_title'))
                                                    <p class="help-block error">{{ $errors->first('meta_title') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="meta_description">Meta Description</label>
                                                <textarea name="meta_description" id="meta_description" placeholder="Meta Description..." rows="3">{{ old('meta_description') }}</textarea>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="meta_keywords">Keywords</label>
                                                <textarea name="meta_keywords" id="meta_keywords" placeholder="Meta Description..." rows="3">{{ old('meta_keywords') }}</textarea>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="check-box text-center">
                                                    <input type="checkbox" name="agree" id="agree" value="1" required />
                                                    &ensp;
                                                    <label for="account-option_1">I agreed to the <a href="#" class="check_box_anchr">Terms and Conditions</a> governing the use of jobportal.</label>
                                                </div>
                                            </div>
                                            <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                                <button type="submit" id="submit" class="btn btn-primary login_btn">Create Job</button>
                                            </div>
                                        </form>
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

    <script type="text/javascript">
		$(document).ready(function(){
            // Image-Preview ---
			$.uploadPreview({
				input_field: "#copy",
				preview_box: "#image-preview",
				label_field: "#copy",
				label_default: "Choose File",
				label_selected: "Change File",
				no_label: false
			});

            // Sub-Category ---
            $('#category').on('change', function () {
                var category_id = this.value;
                $("#subcategories").html('');
                $.ajax({
                    url: "{{url('api/fetch-subcategory')}}",
                    type: "POST",
                    data: {
                        category_id: category_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result)
                    {
                        $('#subcategories').html('<option value="">In Science/Medical Sciences</option>');
                        $.each(result, function (key, value){
                            $("#subcategories").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                    }
                });
            });
		});
	</script>

    <script>
        //Start date and end date
        var start = new Date();
        // set end date to max one year period:
        var end = new Date(new Date().setYear(start.getFullYear()+1));

        $('#startDate, #endDate').datepicker('setDate', start );
        $('#startDate').datepicker({
            startDate : start,
            format: "dd-mm-yyyy",
            todayHighlight: true,
            autoclose: true,
            endDate   : end
        // update "toDate" defaults whenever "fromDate" changes
        }).on('changeDate', function(){
            // set the "toDate" start to not be later than "fromDate" ends:
            $('#endDate').val("").datepicker("update");
            $('#endDate').datepicker('setStartDate', new Date($(this).val()));
        });

        $('#endDate').datepicker({
            startDate : start,
            format: "dd-mm-yyyy",
            todayHighlight: true,
            endDate   : end
        });
    </script>

@include('front.footer')