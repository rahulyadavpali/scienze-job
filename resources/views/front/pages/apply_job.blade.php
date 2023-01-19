@include('front.header')

    <script type="text/javascript">
        $().ready(function(){
            $("#apply_form").validate({
                rules: {describe: {required: true},},
                messages: {describe: {required: "Describe about yourself."},}
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
                            <h2>Apply Job</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/job') }}">Job Listing</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Apply Job</li>
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
                                <li class="active"><a href="#contentOne-1" data-toggle="tab">Apply Job</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="row clearfix">
                                        <form id="apply_form" class="apply_form" action="{{ route('auth.send.application') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="employer_id" value="{{ $job->employer_id }}" />
                                            <input type="hidden" name="job_id" value="{{ $job->id }}" />
                                            <input type="hidden" name="seeker_id" value="{{ $seeker->id }}" />
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="{{ $seeker->first_name }} {{ $seeker->middle_name }} {{ $seeker->last_name }}" readonly />
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" value="{{ $seeker->email }}" readonly />
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="mobile">Mobile Number</label>
                                                <input type="text" name="mobile" value="{{ $seeker->mobile_number }}" readonly />
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="job_title">Job Title</label>
                                                <input type="text" name="job_title" value="{{ $job->job_title }}" readonly />
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_name">Company Name</label>
                                                <input type="text" name="company_name" value="{{ $job->company_name }}" readonly />
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <label for="describe">Describe Yourself</label>
                                                <textarea name="describe" id="describe" placeholder="Describe Yourself..." rows="6">{{ old('company_description') }}</textarea>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="check-box text-center">
                                                    <input type="checkbox" name="checkbox" id="account-option_1" required />
                                                    &ensp;
                                                    <label for="account-option_1">Accept the concern of user's all your data(CV & image) are send to company.</label>
                                                </div>
                                                @if($errors->has('checkbox'))
                                                    <p class="help-block error">{{ $errors->first('checkbox') }}</p>
                                                @endif
                                            </div>
                                            <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                                <button type="submit" class="btn btn-primary login_btn">Submit</button>
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