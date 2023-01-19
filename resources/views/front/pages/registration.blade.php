@include('front.header')

    <!-- Block-Back-Option -->
    <script type="text/javascript">
        window.history.forward();
        function noBack(){window.history.forward();}
    </script>

    <!-- Jquery-Form-Validation -->
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

    <!-- Category-DropDown -->
    <script>
        var stateObject = new Array("Andhra Pradesh", "Andaman and Nicobar Islands", "Arunachal Pradesh", "Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala", "Ladakh", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", "Uttarakhand", "West Bengal");
        var categoriesObject = {
            <?php foreach($category as $categories){ ?>
                "<?php echo $categories->title;?>": {
                    <?php foreach($subcategory as $subcategories){ ?>
                        "<?php echo $subcategories->title;?>": [
                                    <?php foreach($designation as $designations){ ?>
                                        "<?php echo $designations->title;?>",
                                    <?php } ?>
                                ],
                    <?php } ?>
                },
            <?php } ?>
        }
        window.onload = function() {
            var stateSel = document.getElementById("state");
            var categorieSel = document.getElementById("categories");
            var subcategorieSel = document.getElementById("subcategories");
            var selectionjobSel = document.getElementById("selection_job");

            for (var i=0; i<stateObject.length; i++) {
                stateSel.options[stateSel.options.length] = new Option(stateObject[i]);
            }

            for (var x in categoriesObject) {
                categorieSel.options[categorieSel.options.length] = new Option(x, x);
            }
            categorieSel.onchange = function() {
                selectionjobSel.length = 1;
                subcategorieSel.length = 1;
                //display correct values
                for (var y in categoriesObject[this.value]) {
                    subcategorieSel.options[subcategorieSel.options.length] = new Option(y, y);
                }
            }
            subcategorieSel.onchange = function() {
                selectionjobSel.length = 1;
                //display correct values
                var z = categoriesObject[categorieSel.value][this.value];
                for (var i = 0; i < z.length; i++) {
                    selectionjobSel.options[selectionjobSel.options.length] = new Option(z[i], z[i]);
                }
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
                            <h2>REGISTER AS JOB-SEEKER</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">HOME</a> <i class="fa fa-angle-right"></i></li>
                                    <li>REGISTER AS JOB-SEEKER</li>
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
                                <li class="active"><a href="#contentOne-1" data-toggle="tab">i am job-seeker</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="jp_regiter_top_heading">
                                        <p>Fields with * are mandetory </p>
                                    </div>
                                    <div class="row">
                                        <?php if (count($formfield) > 0){ ?>
                                            <form id="registration_form" class="registrater_form" method="POST" enctype="multipart/form-data" action="{{ route('save.registration') }}">
                                                @csrf
                                                <input type="hidden" name="role_id" id="role_id" value="3" />
                                                <?php foreach($formfield as $formfields){ ?>
                                                    <?php if($formfields->status == 1){ ?>
                                                        <?php if($formfields->required == 1){ ?>
                                                            <?php if($formfields->field_type == 'select'){ ?>
                                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                    <label for="{{ $formfields->field_name }}">{{ $formfields->form_label }}*</label>
                                                                    <select class="form-select" name="{{ $formfields->field_name }}" id="{{ $formfields->field_id }}" required>
                                                                        <option selected disabled value="">{{ $formfields->placeholder }}</option>
                                                                    </select>
                                                                    @if($errors->has($formfields->field_name))
                                                                        <p class="help-block">{{ $errors->first($formfields->field_name) }}</p>
                                                                    @endif
                                                                </div>
                                                            <?php }else{ ?>
                                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                    <label for="{{ $formfields->field_name }}">{{ $formfields->form_label }}*</label>
                                                                    <input type="{{ $formfields->field_type }}" name="{{ $formfields->field_name }}" id="{{ $formfields->field_id }}" value="{{ old('name') }}" placeholder="{{ $formfields->placeholder }}" required />
                                                                    @if($errors->has($formfields->field_name))
                                                                        <p class="help-block">{{ $errors->first($formfields->field_name) }}</p>
                                                                    @endif
                                                                </div>
                                                            <?php }?>
                                                        <?php }else{ ?>
                                                            <?php if($formfields->field_type == 'select'){ ?>
                                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                    <label for="{{ $formfields->field_name }}">{{ $formfields->form_label }}</label>
                                                                    <select class="form-select" name="{{ $formfields->field_name }}" id="{{ $formfields->field_id }}">
                                                                        <option selected disabled value="">{{ $formfields->placeholder }}</option>
                                                                    </select>
                                                                    @if($errors->has($formfields->field_name))
                                                                        <p class="help-block">{{ $errors->first($formfields->field_name) }}</p>
                                                                    @endif
                                                                </div>
                                                            <?php }else{ ?>
                                                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                                    <label for="{{ $formfields->field_name }}">{{ $formfields->form_label }}</label>
                                                                    <input type="{{ $formfields->field_type }}" name="{{ $formfields->field_name }}" id="{{ $formfields->field_id }}" value="{{ old('name') }}" placeholder="{{ $formfields->placeholder }}" />
                                                                </div>
                                                            <?php }?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="check-box text-center">
                                                        <input type="checkbox" name="agree" id="agree" value="1" required />
                                                        &ensp;
                                                        <label for="account-option_1">I agreed to the <a href="#" class="check_box_anchr">Terms and Conditions</a> governing the use of jobportal.</label>
                                                    </div>
                                                </div>
                                                <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                                    <button type="submit" id="submit" class="btn btn-primary login_btn">register</button>
                                                </div>
                                            </form>
                                        <?php }else{ ?>
                                            <p>The form is currently unavailable.</p>
                                        <?php } ?>
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

@include('front.footer')