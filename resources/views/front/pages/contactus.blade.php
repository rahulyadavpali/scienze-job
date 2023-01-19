@include('front.header')

    <script type="text/javascript">
        $().ready(function(){
            $("#contact-form").validate({
                rules:{
                    name: {required: true}, email: {required: true}, message: {required: true}, captcha: {required: true},
                },
                messages: {
                    name: {required: "Please Enter Full Name."}, email: {required: "Please Enter Your Email Address."}, message: {required: "Please Type Your Message."}, captcha: {required: "Please Fill This Captcha field."},
                }
            });
        });
    </script>

    <section class="open_contest_section">
        <div class="container">
            <div class="row">
                <div class="open_contest_container">
                    <div class="contest_head">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="contest_heading">
                                    <h1>Contact Us<h1>
                                </div>
                                <div class="contact_container">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <form id="contact-form" class="contact_form" method="POST">
                                                @csrf
                                                <div class="frm_div">
                                                    <input type="text" name="name" id="name" placeholder="Full Name" />
                                                </div>
                                                <span class="text-danger" id="nameError"></span>
                                                <div class="frm_div">
                                                    <input type="email" name="email" id="email" placeholder="Email Address" />
                                                </div>
                                                <span class="text-danger" id="emailError"></span>
                                                <div class="frm_div">
                                                    <textarea name="message" id="message" placeholder="Your Message..." rows="4"></textarea>
                                                </div>
                                                <span class="text-danger" id="messageError"></span>
                                                <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Captcha*</label>
                                                    <div class="col-md-6">
                                                        <div class="captcha">
                                                        <span>{!! captcha_img('inverse'); !!}</span>
                                                        <button type="button" class="btn btn-success btn-refresh"><i class="fas fa-redo"></i></button>
                                                        </div>
                                                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                                        @if ($errors->has('captcha'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('captcha') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <span class="text-danger" id="captchaError"></span>
                                                <div class="frm_div frm_btn">
                                                    <input type="submit" id="submit" name="submit" value="Send" />
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-12"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
            $(document).ready(function(){
                // Success-Model ---
                $("#successModelPopup span.close").click(function(){
                    $("#successModelPopup").hide();
                });

                // Contact-Form ---
                $('#submit').click(function(e){
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': jQuery('input[name="_token"]').attr('value')}
                    });
                    $.ajax({
                        url: "{{ url('/send-contact') }}",
                        type: "POST",
                        data: $('#contact-form').serialize(),
                        dataType: "JSON",
                        success: function(response)
                        {
                            console.log(response);
                            if(response.success){
                                $("#successModelPopup").show();
                                // alert(response.success);
                            }else{  
                                alert(response.errors);
                            }
                        },
                        error:function(response)
                        {
                            // console.log(response);
                            $('#nameError').text(response.responseJSON.errors.first_name);
                            $('#emailError').text(response.responseJSON.errors.email);
                            $('#messageError').text(response.responseJSON.errors.password);
                            $('#captchaError').text(response.responseJSON.errors.captcha);
                        }
                    });
                });

                // Captcha-Ajax ---
                $(".btn-refresh").click(function(){
                    $.ajax({
                        type:'GET',
                        url:"{{ url('/refresh_captcha') }}",
                        success:function(data){
                            $(".captcha span").html(data.captcha);
                        }
                    });
                });
            });
        </script>

@include('front.footer')