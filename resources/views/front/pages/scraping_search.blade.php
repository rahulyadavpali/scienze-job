@include('front.header')

    <!-- jp Tittle Wrapper Start -->
    <div class="jp_tittle_main_wrapper">
        <div class="jp_tittle_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="jp_job_heading_wrapper">
                        <div class="jp_job_heading">
                            <p>Search Result</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="job_search" action="{{ url('feed-search') }}" method="POST">
                        @csrf
                        <div class="jp_header_form_wrapper">
                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                <input type="text" name="keyword" id="keyword" placeholder="Keyword e.g. (Job Title, Description, Tags)" />
                                @if($errors->has('keyword'))
                                    <p class="help-block seo_error">{{ $errors->first('keyword') }}</p>
                                @endif
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="jp_form_btn_wrapper">
                                    <ul>
                                        <li><button type="submit"><i class="fa fa-search"></i> Search</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if(count($scrap) > 0){ ?>
        <div class="jp_listing_sidebar_main_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="tab-content">
                                    <div id="grid" class="tab-pane fade in active">
                                        <div class="row">
                                            <?php foreach ($scrap as $scraping){ ?>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="jp_job_post_main_wrapper_cont jp_job_post_grid_main_wrapper_cont">
                                                        <div class="jp_job_post_main_wrapper jp_job_post_grid_main_wrapper feed_pge_div">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="jp_job_post_right_cont feed_page_txt">
                                                                        <h4><a href="{{ \Storage::disk('website-pdf')->url($scraping->pdf) }}" target="_blank">{{ $scraping->title }}</a></h4>
                                                                        <p><a href="{{ $scraping->web_url }}" target="_blank">{{ $scraping->website_name }}</a></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="jp_job_post_right_btn_wrapper">
                                                                        <ul class="feed_page_detail">
                                                                            <li><a href="{{ \Storage::disk('website-pdf')->url($scraping->pdf) }}" target="_blank">View Detail</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else{ ?>
        <div class="jp_listing_sidebar_main_wrapper" style="padding-top: 100px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1><strong>Currently No Job Found.</strong></h1>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

@include('front.footer')