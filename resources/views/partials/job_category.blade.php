<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="jp_rightside_job_categories_wrapper">
        <div class="jp_rightside_job_categories_heading"><h4>Jobs by Category</h4></div>
        <div class="jp_rightside_job_categories_content">
            <ul>
                <?php foreach($category as $categorys){ ?>
                    <li><i class="fa fa-caret-right"></i> <a href="{{ url('/job-category',[$categorys->id]) }}">{{ $categorys->title }}</a></li>
                <?php }if(Auth::user() !== null){ ?>
                    <li><i class="fa fa-plus-circle"></i> <a href="{{ url('show-all-jobs') }}">View All Jobs</a></li>
                <?php }else{ ?>
                    <li></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>