<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $metaTitle }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="{{ $metaDescription }}" />
    <meta name="keywords" content="{{ $keywords }}" />
    <meta name="MobileOptimized" content="320" />

    <!--srart theme style -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/fonts.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/owl.theme.default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style_II.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/responsive2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/media.css') }}" />

    <!-- favicon links -->
    <link rel="shortcut icon" type="image/png" href="{{ url('assets/images/header/favicon.ico') }}" />

    <!-- Linked-JS-Start -->
    <script type="text/javascript" src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ url('adminlte/js/jquery.uploadPreview.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/js/share.js') }}"></script>

    <script type="text/javascript" src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

</head>
<body>
    <!-- preloader Start -->
    <!-- <div id="preloader">
        <div id="status"><img src="images/header/loadinganimation.gif" id="preloader_image" alt="loader">
        </div>
    </div> -->

    <!-- Top Header Wrapper Start -->
    <div class="jp_top_header_main_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="jp_top_header_left_wrapper">
                        <div class="jp_top_header_left_cont">
                            <!-- <p><i class="fa fa-phone"></i> &nbsp;Phone &nbsp;+123456789</p> -->
                            <p class="hdr_email"><i class="fa fa-envelope"></i> &nbsp;Email :&nbsp;<a href="mailto:{{ $email }}" target="_blank">{{ $email }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="jp_top_header_right_wrapper">
                        <div class="jp_top_header_right_cont">
                            <ul>
                                <?php if(Auth::user() !== null ){ ?>
                                    <?php $user = Auth::user();
                                    if ($user->job_id == 4){ ?>
                                        <li><a href="{{ url('/advertiser-user') }}"><i class="fa fa-user"></i>&nbsp; Profile</a></li>
                                    <?php }
                                    elseif ($user->job_id == 3){ ?>
                                        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-user"></i>&nbsp; Admin</a></li>
                                    <?php }
                                    else{ ?>
                                        <li><a href="{{ url('/user') }}"><i class="fa fa-user"></i>&nbsp; Profile</a></li>
                                    <?php } ?>
                                    <li><a href="#logout" onclick="$('#logout').submit();"><i class="fa fa-sign-in"></i>&nbsp; LOGOUT</a></li>
                                    {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
                                        <button type="submit">@lang('quickadmin.logout')</button>
                                    {!! Form::close() !!}
                                <?php }else{ ?>
                                    <li><a href="{{ url('/sign-up') }}"><i class="fa fa-user"></i>&nbsp; SIGN UP</a></li>
                                    <li><a href="{{ url('/user-login') }}"><i class="fa fa-sign-in"></i>&nbsp; LOGIN</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="jp_top_header_right__social_cont">
                            <ul>
                                <?php if(!empty($facebook)){ ?>
                                    <li><a href="{{ $facebook }}" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                <?php }if(!empty($twitter)){ ?>
                                    <li><a href="{{ $twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <?php }if(!empty($instagram)){ ?>
                                    <li><a href="{{ $instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <?php }if(!empty($linkedin)){ ?>
                                    <li><a href="{{ $linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Wrapper Start -->
    <div class="jp_top_header_img_wrapper">
        <div class="gc_main_menu_wrapper rheader_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hidden-xs hidden-sm hdr_logo_div">
                        <div class="gc_header_wrapper">
                            <div class="gc_logo hdr_logo">
                                <a href="{{ url('/') }}">
                                    <figure>
                                        <img src="{{ url('upload/gallery/'.$logo) }}" alt="Scienze Jobs Logo" title="Scienze Jobs" class="img-responsive"><span>Beta</span>
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 hdr_menu_div">
                        <div class="header-area hidden-menu-bar stick" id="sticker">
                            <!-- mainmenu start -->
                            <div class="mainmenu hm_hdr_mnu hdr_menu">
                                <ul class="float_left">
                                    <li class="has-mega gc_main_navigation">
                                        <a href="{{ url('/') }}" class="gc_main_navigation">Home</a>
                                    </li>
                                    <li class="has-mega gc_main_navigation">
                                        <a href="{{ url('/job') }}" class="gc_main_navigation">Job</a>
                                    </li>
                                    <li class="has-mega gc_main_navigation">
                                        <a href="{{ url('/plan') }}" class="gc_main_navigation">Plan</a>
                                    </li>
                                    <li class="has-mega gc_main_navigation">
                                        <a href="{{ url('/blog') }}" class="gc_main_navigation">Blog</a>
                                    </li>
                                    <li class="gc_main_navigation parent"><a href="{{ url('/contact') }}" class="gc_main_navigation">Contact</a></li>
                                </ul>
                            </div>
                            <!-- mobile menu area start -->
                            <header class="mobail_menu">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-8 col-8 rsp_hdr_logo">
                                            <div class="gc_logo hdr_logo">
                                                <a href="{{ url('/') }}">
                                                    <figure>
                                                        <img src="{{ url('upload/gallery/'.$logo) }}" alt="Scienze Jobs Logo" title="Scienze Jobs" class="img-responsive"><span>Beta</span>
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-4 col-4">
                                            <div class="cd-dropdown-wrapper">
                                                <a class="house_toggle" href="#">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px"><g><g><path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#000000"/></g><g><path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#000000"/></g><g><path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#000000"/></g><g><path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#000000"/></g><g><path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#000000"/></g></g></svg>
												</a>
                                                <nav class="cd-dropdown">
                                                    <a href="#" class="cd-close">Close</a>
                                                    <ul class="cd-dropdown-content">
                                                        <li><a href="{{ url('/') }}">Home</a></li>
                                                        <li><a href="{{ url('/job') }}">Jobs</a></li>
                                                        <li><a href="{{ url('/plan') }}">Plan</a></li>
                                                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                                                        <li><a href="{{ url('/contact') }}">Contact</a></li>
														<?php if(Auth::user() !== null ){ ?>
                                                            <?php $user = Auth::user();if($user->job_id == 4){ ?>
                                                                <li><a href="{{ url('/advertiser-user') }}"><i class="fa fa-user"></i>&nbsp; Profile</a></li>
                                                            <?php }else{ ?>
                                                                <li><a href="{{ url('/user') }}"><i class="fa fa-user"></i>&nbsp; Profile</a></li>
                                                            <?php } ?>
                                                            <li><a href="#mobile_logout" onclick="$('#mobile_logout').submit();">Logout</a></li>
                                                            {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'mobile_logout']) !!}
                                                                <button type="submit">@lang('quickadmin.logout')</button>
                                                            {!! Form::close() !!}
                                                        <?php }else{ ?>
                                                            <li><a href="{{ url('/sign-up') }}">Sign Up</a></li>
                                                            <li><a href="{{ url('/user-login') }}">Login</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
