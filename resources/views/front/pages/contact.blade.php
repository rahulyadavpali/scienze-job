@include('front.header')

    <script type="text/javascript">
        $().ready(function(){
            $("#contact-form").validate({
                rules:{
                    name: {required: true}, email: {required: true}, message: {required: true}, captcha: {required: true}
                },
                messages: {
                    name: {required: "Please Enter Full Name."}, email: {required: "Please Enter Your Email Address."}, message: {required: "Please Type Your Message."}, captcha: {required: "Please Fill This Captcha field."},
                }
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
                            <h2>Contact Us</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Contact Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jp Contact form Wrapper Start -->
    <div class="jp_contact_form_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_contact_form_heading_wrapper">
                        <h2>Leave A Message</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <form id="contact-form" class="contact_form" method="POST" action="{{ url('store-contact') }}">
                        @csrf
                        <div class="jp_contact_form_box">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="jp_contact_inputs_wrapper">
                                    <i class="fa fa-user"></i>
                                    <input type="text" name="name" id="name" placeholder="Full Name *" />
                                    @if($errors->has('name'))
                                        <p class="help-block">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="jp_contact_inputs_wrapper jp_contact_inputs2_wrapper">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" name="email" id="email" placeholder="Email *" />
                                    @if($errors->has('email'))
                                        <p class="help-block">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="jp_contact_inputs_wrapper jp_contact_inputs3_wrapper">
                                    <i class="fa fa-pencil-square-o"></i>
                                    <input type="text" name="subject" id="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="jp_contact_inputs_wrapper jp_contact_inputs4_wrapper">
                                    <i class="fa fa-text-height"></i>
                                    <textarea name="message" id="message" placeholder="Type Your Message *" rows="6"></textarea>
                                    @if($errors->has('message'))
                                        <p class="help-block">{{ $errors->first('message') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                <div class="jp_contact_inputs_wrapper jp_contact_inputs3_wrapper">
                                    <div class="captcha">
                                        <span>{!! captcha_img('inverse') !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                <div class="jp_contact_inputs_wrapper jp_contact_inputs3_wrapper">
                                    <input type="text" name="captcha" id="captcha" placeholder="Enter Captcha" />
                                    @if ($errors->has('captcha'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('captcha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="jp_contact_form_btn_wrapper frm_btn">
                                    <ul>
                                        <li>
                                            <input type="submit" id="submit" name="submit" value="SEND" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="jp_contact_right_box_wrapper">
                        <div class="jp_contact_form_add_heading_wrapper">
                            <h2>Contact Info</h2>
                        </div>
                        <div class="jp_form_add_wrapper gc_map_add_wrapper1">
                            <div class="jp_map_location_icon_wrapper">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="gc_map_location_icon_cont_wrapper">
                                <h3><a href="{{ $map }}" target="_blank">{!! $address !!}</a></h3>
                            </div>
                        </div>
                        <div class="jp_form_add_wrapper gc_map_add_wrapper2">
                            <div class="jp_map_location_icon_wrapper">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="gc_map_location_icon_cont_wrapper gc_map_location_icon_cont_wrapper2">
                                <h3><a href="tel:{{ $phone }}" target="_blank">+91 {{ $phone }}</a></h3>
                            </div>
                        </div>
                        <div class="jp_form_add_wrapper gc_map_add_wrapper3">
                            <div class="jp_map_location_icon_wrapper">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="gc_map_location_icon_cont_wrapper gc_map_location_icon_cont_wrapper4">
                                <h3><a href="mailto:{{ $email }}" target="_blank">{{ $email }}</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="successModelPopup" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span onClick="window.location.reload();" class="close"><p>X</p></span>
            <div class="voter_modal_cnt suces_mdl">
                <!-- Open-Contest-Registration-Pop-Start -->
                <h5>Your Message Send Successfully.</h5>
                <div class="vtr_frm">
                    <button type="button" id="ok" onClick="window.location.reload();">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>

@include('front.footer')