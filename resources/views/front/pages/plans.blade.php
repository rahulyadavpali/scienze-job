@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_tittle_heading_wrapper">
                        <div class="jp_tittle_heading">
                            <h2>PLANS</h2>
                        </div>
                        <div class="jp_tittle_breadcrumb_main_wrapper">
                            <div class="jp_tittle_breadcrumb_wrapper">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i></li>
                                    <li>Plans Listing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- aboutus_section start-->
    <div class="jp_pricing_main_wrapper">
        <div class="container">
            <div class="row">
                @foreach ($plan as $plans)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 plan_price_div">
                        <div class="pricing_box1_wrapper pricing_border_box1_wrapper">
                            <div class="box1_heading_wrapper">
                                <h4>{{ $plans->plan_title }}</h4>
                            </div>
                            <div class="price_box1_wrapper">
                                <div class="price_box1 price_div">
                                    <h2><span>{!! $plans->plan_price !!}</span></h2>
                                </div>
                            </div>
                            <div class="pricing_cont_wrapper">
                                <div class="pricing_cont">
                                    {!! $plans->plan_description!!}
                                </div>
                            </div>
                            <div class="pricing_btn_wrapper">
                                <div class="pricing_btn1">
                                    <ul>
                                        <!-- <?php if(Auth::user() !== null ){ ?>
                                            <li><a href="{{ url('/user') }}"><i class="fa fa-plus-circle"></i> Get Started</a></li>
                                        <?php }else{ ?>
                                            <li>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Get Started</a>
                                            </li>
                                        <?php } ?> -->
                                        <li>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Get Started</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Plans</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jp_pricing_label_wrapper">
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="jp_pricing_info_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_pricing_cont_heading">
                        <h2>{{ $information->title }} :</h2>
                    </div>
                    <div class="jp_pricing_cont_wrapper">
                        {!! $information->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('front.footer')