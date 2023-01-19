
<style>
    #statelist li:nth-child(n+10){display:none;}
</style>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="jp_rightside_job_categories_wrapper jp_job_location_wrapper">
        <div class="jp_rightside_job_categories_heading"><h4>Jobs by Location</h4></div>
        <div class="jp_rightside_job_categories_content">
            <ul id="statelist">
                <?php foreach($location as $locations){ ?>
                    <li><i class="fa fa-caret-right"></i> <a href="{{ url('/job-location',[$locations->id]) }}">{{ $locations->state }}</a></li>
                <?php }if(Auth::user() !== null){ ?>
                    <li><i class="fa fa-plus-circle"></i> <a href="{{ url('show-all-jobs') }}">View All Jobs</a></li>
                <?php }else{ ?>
                    <li></li>
                <?php } ?>
            </ul>
            <span class="lis_read">Read More</span>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('span').click(function () {
            $('#statelist li:hidden').slice(0, 10).show();
            if ($('#statelist li').length == $('#statelist li:visible').length) {
                $('span ').hide();
            }
        });
    });
</script>
