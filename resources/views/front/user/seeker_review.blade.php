@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Review Us</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/user') }}">Profile</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Review Us</li>
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
                                <li class="active"><a href="#contentOne-1" data-toggle="tab">Review Us</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="jp_regiter_top_heading"><p>Fields with * are mandetory </p></div>
                                    <div class="row">
                                        <form id="posting_form" class="job_posting_form" method="POST" enctype="multipart/form-data" action="{{ route('auth.employer.review.store') }}">
                                            @csrf
                                            <input type="hidden" name="employer_id" id="employer_id" value="{{ $rev_detail->id }}" />
                                            <input type="hidden" name="logo" id="logo" value="{{ $rev_detail->photo }}" />
                                            <input type="hidden" name="role_type" id="role_type" value="2" />
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="company_name">Institute/Orgnization</label>
                                                <input type="text" name="company_name" id="company_name" value="{{ $rev_detail->first_name }} {{ $rev_detail->middle_name }} {{ $rev_detail->last_name }}" readonly />
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" value="{{ $rev_detail->email }}" readonly />
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="review_text">Write Your Review</label>
                                                <textarea id="review_text" name="review_text" placeholder="Write your review for us..." rows="4">{{ old('review_text') }}</textarea>
                                                @if($errors->has('review_text'))
                                                    <p class="help-block error">{{ $errors->first('review_text') }}</p>
                                                @endif
                                            </div>
                                            <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                                <button type="submit" id="submit" class="btn btn-primary login_btn">Send Us</button>
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