@include('front.header')

    <section class="open_contest_section">
        <div class="container">
            <div class="row">
                <div class="open_contest_container">
                    <div class="contest_head">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="information_text">
                                    <div class="success_div">
                                        <img class="success_icon" src="{{ url('assets/images/Icons/success-icon.jpg') }}" />
                                        <h1>Your Entry Submit Successfully</h1>
                                        <p>Your entry is verified by our experts and you will get an email by us.</p>
                                        <a href="{{ url('/') }}">Back To Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('front.footer')