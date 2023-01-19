<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="jp_rightside_job_categories_wrapper">
        <div class="jp_rightside_job_categories_heading">
            <h4>Jobs Type</h4>
        </div>
        <div class="jp_rightside_job_categories_content">
            <ul>
                <?php foreach($job_type as $jobtype){ ?>
                    <li><i class="fa fa-caret-right"></i> <a href="{{ url('/job-type',[$jobtype->id]) }}">{{ $jobtype->title }}</a></li>
                <?php } ?>
                <li></li>
            </ul>
        </div>
    </div>
</div>