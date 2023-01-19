@inject('request', 'Illuminate\Http\Request')

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <section class="sidebar make_scroll">
        <ul class="sidebar-menu">
            <li class="{{ $request->segment(2) == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('/admin/dashboard') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('setting_access')
            <li class="{{ $request->segment(2) == 'setting' ? 'active' : '' }}">
                <a href="{{ route('admin.setting.index') }}">
                    <i class="fa fa-cog"></i>
                    <span class="title">Setting</span>
                </a>
            </li>
            @endcan

            @can('category_access')
            <li class="{{ $request->segment(2) == 'category' ? 'active' : '' }}">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-th-large"></i>
                    <span class="title">Category</span>
                </a>
            </li>
            @endcan

            @can('designation_access')
            <li class="{{ $request->segment(2) == 'designation' ? 'active' : '' }}">
                <a href="{{ route('admin.designation.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">Job Designation</span>
                </a>
            </li>
            @endcan

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                        <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.roles.index') }}">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">
                                    @lang('quickadmin.roles.title')
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.users.index') }}">
                                <i class="fa fa-user"></i>
                                <span class="title">
                                    @lang('quickadmin.users.title')
                                </span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('job_access')
            <li class="{{ $request->segment(2) == 'job' ? 'active' : '' }}">
                <a href="{{ route('admin.job.index') }}">
                    <i class="fa fa-university"></i>
                    <span class="title">All Institutes</span>
                </a>
            </li>
            @endcan

            @can('job_access')
            <!-- <li class="{{ $request->segment(2) == 'jobs' ? 'active' : '' }}">
                <a href="{{ route('admin.job.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">All Jobs</span>
                </a>
            </li> -->
            @endcan

            @can('registration_access')
            <li class="{{ $request->segment(1) == 'registration_list' ? 'active' : '' }}">
                <a href="{{ route('auth.registration_list') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">All Registration</span>
                </a>
            </li>
            @endcan

            @can('home_access')
            <li class="{{ $request->segment(2) == 'seo' ? 'active' : '' }}">
                <a href="{{ route('admin.seo.index') }}">
                    <i class="fa fa-search"></i>
                    <span class="title">SEO Options</span>
                </a>
            </li>
            @endcan

            @can('home_access')
            <li class="{{ $request->segment(2) == 'home' ? 'active' : '' }}">
                <a href="{{ route('admin.home.index') }}">
                    <i class="fa fa-home"></i>
                    <span class="title">Home Management</span>
                </a>
            </li>
            @endcan

            @can('plan_access')
            <li class="{{ $request->segment(2) == 'plan' ? 'active' : '' }}">
                <a href="{{ route('admin.plan.index') }}">
                    <i class="fa fa-money"></i>
                    <span class="title">Plan Management</span>
                </a>
            </li>
            @endcan

            @can('plan_access')
            <li class="{{ $request->segment(2) == 'advertisment' ? 'active' : '' }}">
                <a href="{{ route('admin.advertisment.index') }}">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="title">Advertisement Plan</span>
                </a>
            </li>
            @endcan

            @can('home_access')
            <li class="{{ $request->segment(2) == 'faq' ? 'active' : '' }}">
                <a href="{{ route('admin.faq.index') }}">
                    <i class="fa fa-comments"></i>
                    <span class="title">FAQ</span>
                </a>
            </li>
            @endcan

            @can('blog_access')
            <li class="{{ $request->segment(2) == 'blog' ? 'active' : '' }}">
                <a href="{{ route('admin.blog.index') }}">
                    <i class="fa fa-th"></i>
                    <span class="title">Blogs</span>
                </a>
            </li>
            @endcan

            @can('designation_access')
            <li class="{{ $request->segment(2) == 'jobtype' ? 'active' : '' }}">
                <a href="{{ route('admin.jobtype.index') }}">
                    <i class="fa fa-search"></i>
                    <span class="title">Job Type</span>
                </a>
            </li>
            @endcan

            @can('designation_access')
            <li class="{{ $request->segment(2) == 'joblocation' ? 'active' : '' }}">
                <a href="{{ route('admin.joblocation.index') }}">
                    <i class="fa fa-location-arrow"></i>
                    <span class="title">Job Location</span>
                </a>
            </li>
            @endcan

            @can('form_access')
            <li class="{{ $request->segment(1) == 'form_list' ? 'active' : '' }}">
                <a href="{{ route('auth.form_list') }}">
                    <i class="fa fa-list-alt"></i>
                    <span class="title">Forms Management</span>
                </a>
            </li>
            @endcan

            @can('information_access')
            <li class="{{ $request->segment(1) == 'information_list' ? 'active' : '' }}">
                <a href="{{ route('auth.information_list') }}">
                    <i class="fa fa-info-circle"></i>
                    <span class="title">Information</span>
                </a>
            </li>
            @endcan

            <li class="{{ $request->segment(1) == 'website' ? 'active' : '' }}">
                <a href="{{ route('admin.website.index') }}">
                    <i class="fa fa-link"></i>
                    <span class="title">Websites Data</span>
                </a>
            </li>

            <li class="{{ $request->segment(1) == 'enquiry_list' ? 'active' : '' }}">
                <a href="{{ route('auth.enquiry_list') }}">
                    <i class="fa fa-envelope"></i>
                    <span class="title">Enquiry</span>
                </a>
            </li>

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
            <br>
        </ul>
    </section>
</aside>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
    <button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
