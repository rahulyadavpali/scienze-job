@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>{{ $information->title }}</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li>{{ $information->title }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- aboutus_section start-->
    <div class="aboutus_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="about_text_wrapper">
                        <div class="section_heading section_2_heading">
                            <h2>{{ $information->title }}</h2>
                        </div>
                        <div class="info_decription">
                            {!! $information->description !!}
                        </div>
                        <?php if($information->id == 12){ ?>
                            <div class="ad_reg_btn">
                                <a href="{{ url('/advertisement-signup') }}">Register New User</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('front.footer')