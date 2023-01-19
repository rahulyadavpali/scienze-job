@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit Job</h3>
    <div class="main_divs">
        {!! Form::model($job, ['method' => 'PUT', 'route' => ['admin.job.update', $job->id], 'files'=>true,]) !!}
        <div class="panel-default">
            <div class="panel-heading">Edit</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('company_name', 'Company Name*', ['class' => 'control-label']) !!}
                        {!! Form::text('company_name', old('company_name'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('company_name'))
                            <p class="help-block">{{ $errors->first('company_name') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('company_link', 'Company Link', ['class' => 'control-label']) !!}
                        {!! Form::text('company_link', old('company_link'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('company_link'))
                            <p class="help-block">{{ $errors->first('company_link') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        <label for="company_logo" class="control-label">Company Logo*</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="file" name="company_logo" id="company_logo" class="form-control" value="{{ $job->company_logo }}" />
                                <p>#(For Company Logo)<p>
                            </div>
                            <div class="col-sm-6">
                                <div id="image-preview" class="choose_feature image-preview"></div>
                            </div>
                            <div class="col-sm-3" style="text-align: center;">
                                <img style="width:180px;height:180px;object-fit: cover;object-position: center;" src="{{ url('upload/employer/'.$job->company_logo) }}" />
                                <p>Old Feature Image<p>
                            </div>
                        </div>
                        @if($errors->has('company_logo'))
                            <p class="help-block">
                                {{ $errors->first('company_logo') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('address', 'Address*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('address', old('address'), ['class' => 'form-control', 'placeholder' => '','rows'=>3]) !!}
                        @if($errors->has('address'))
                            <p class="help-block">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        <label for="job_type">Job Type*</label>
                        <select id="job_type" name="job_type" class="form-control title">
                            <option value="{{ $job->job_type }}">{{ $job->job_type }}</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Temporary">Temporary</option>
                        </select>
                        @if($errors->has('job_type'))
                            <p class="help-block">
                                {{ $errors->first('job_type') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('job_title', 'Job Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('job_title', old('job_title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('job_title'))
                            <p class="help-block">{{ $errors->first('job_title') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                {!! Form::label('job_time', 'Job Time*', ['class' => 'control-label']) !!}
                                {!! Form::text('job_time', old('job_time'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                                @if($errors->has('job_time'))
                                    <p class="help-block">{{ $errors->first('job_time') }}</p>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12">
                                {!! Form::label('date_posted', 'Date Posted*', ['class' => 'control-label']) !!}
                                {!! Form::date('date_posted', old('date_posted'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                                @if($errors->has('date_posted'))
                                    <p class="help-block">{{ $errors->first('date_posted') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                {!! Form::label('hours', 'Hours*', ['class' => 'control-label']) !!}
                                {!! Form::text('hours', old('hours'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                                @if($errors->has('hours'))
                                    <p class="help-block">{{ $errors->first('hours') }}</p>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12">
                                {!! Form::label('salary', 'Salary*', ['class' => 'control-label']) !!}
                                {!! Form::text('salary', old('salary'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                                @if($errors->has('salary'))
                                    <p class="help-block">{{ $errors->first('salary') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('category', 'Category*', ['class' => 'control-label']) !!}
                        {!! Form::text('category', old('category'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('category'))
                            <p class="help-block">{{ $errors->first('category') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('experience', 'Experience*', ['class' => 'control-label']) !!}
                        {!! Form::text('experience', old('experience'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('experience'))
                            <p class="help-block">{{ $errors->first('experience') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('job_decription', 'Job Description*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('job_decription', old('job_decription'), ['class' => 'ckeditor form-control title', 'placeholder' => '','rows'=>10]) !!}
                        @if($errors->has('job_decription'))
                            <p class="help-block">{{ $errors->first('job_decription') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('min_qualification', 'Minimum Qualifications', ['class' => 'control-label']) !!}
                        {!! Form::textarea('min_qualification', old('min_qualification'), ['class' => 'ckeditor form-control title', 'placeholder' => '','rows'=>10]) !!}
                        @if($errors->has('min_qualification'))
                            <p class="help-block">{{ $errors->first('min_qualification') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('how_apply', 'How To Apply', ['class' => 'control-label']) !!}
                        {!! Form::textarea('how_apply', old('how_apply'), ['class' => 'ckeditor form-control title', 'placeholder' => '','rows'=>10]) !!}
                        @if($errors->has('how_apply'))
                            <p class="help-block">{{ $errors->first('how_apply') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_title', 'Meta Tag Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('meta_title', old('meta_title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('meta_title'))
                            <p class="help-block">
                                {{ $errors->first('meta_title') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_description', 'Meta Tag Description*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'placeholder' => '','rows'=>4]) !!}
                        @if($errors->has('meta_description'))
                            <p class="help-block">
                                {{ $errors->first('meta_description') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right move_sbm_btn">
                        {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-info']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <!-- Image-Preview -->
    <script type="text/javascript">
		$(document).ready(function(){
			$.uploadPreview({
				input_field: "#company_logo",
				preview_box: "#image-preview",
				label_field: "#company_logo",
				label_default: "Choose File",
				label_selected: "Change File",
				no_label: false
			});
		});
	</script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

@stop
