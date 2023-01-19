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
                                        <img class="success_icon" src="{{ url('assets/images/icons/success-icon.png') }}" />
                                        <h1>Your Job Posted Successfully.</h1>
                                        <p>A confirmation of your job entry has been sent to your registered email address.</p>
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