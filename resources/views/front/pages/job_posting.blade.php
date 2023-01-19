@include('front.header')

    <!-- Category-DropDown -->
    <script>
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
            var categorieSel = document.getElementById("categories");
            var subcategorieSel = document.getElementById("subcategories");
            var selectionjobSel = document.getElementById("selection_job");
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
                            <h2>POSTING JOB</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">HOME</a> <i class="fa fa-angle-right"></i></li>
                                    <li>POSTING JOB</li>
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
                                <li class="active"><a href="#contentOne-1" data-toggle="tab">i am employer seeking an employee</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="jp_regiter_top_heading">
                                        <p>Fields with * are mandetory </p>
                                    </div>
                                    <div class="row">
                                        <?php if (count($formfield) > 0){ ?>
                                            <form id="posting_form" class="job_posting_form" method="POST" enctype="multipart/form-data" action="{{ route('job.apply.save') }}">
                                                @csrf
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

    <!-- Image-Preview -->
    <script type="text/javascript">
        $(document).ready(function(){
            $.uploadPreview({
                input_field: "#copy_advertisement",
                preview_box: "#image-preview",
                label_field: "#copy_advertisement",
                label_default: "Choose File",
                label_selected: "Change File",
                no_label: false
            });
        });
    </script>

@include('front.footer')