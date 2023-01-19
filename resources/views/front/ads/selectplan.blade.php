@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>Advertisment Plans</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul class="ads_bread">
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li><a href="{{ url('/advertiser-user') }}">Seller Profile</a> <i class="fa fa-angle-right"></i></li>
                                    <li><span>Advertisment Plans</span></li>
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
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active register_left_form" id="contentOne-1">
                                    <div class="row clearfix">
                                        @foreach($plans as $plan)
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-12">
                                                <div class="advplan_div">
                                                    <a href="{{ route('auth.seller.create.ads', [$plan->id]) }}">
                                                        <h3>{{ $plan->plan_name }}</h3>
                                                        {!! $plan->plan_description !!}
                                                        <h4>Location : {{ $plan->location }}</h4>
                                                        <h5>Final Price : {{ $plan->plan_price }}</h5>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
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