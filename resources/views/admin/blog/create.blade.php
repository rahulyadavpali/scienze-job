@extends('layouts.app')

@section('content')
    <h3 class="page-title">Create New Blog</h3>
    <div class="main_divs">
        {!! Form::open(['method' => 'POST', 'route' => ['admin.blog.store'], 'files'=>true,]) !!}
        <div class="panel-default">
            <div class="panel-heading">Create</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('blog_title', 'Blog Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('blog_title', old('blog_title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('blog_title'))
                            <p class="help-block">{{ $errors->first('blog_title') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('sub_para', 'Sub Paragraph*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('sub_para', old('sub_para'), ['class' => 'form-control', 'placeholder' => 'Word limit 300','rows'=>2]) !!}
                        @if($errors->has('sub_para'))
                            <p class="help-block">
                                {{ $errors->first('sub_para') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('poste_date', 'Posting Date*', ['class' => 'control-label']) !!}
                        {!! Form::date('poste_date', old('poste_date'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('poste_date'))
                            <p class="help-block">{{ $errors->first('poste_date') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('category', 'Category*', ['class' => 'control-label']) !!}
                        {!! Form::text('category', old('category'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('category'))
                            <p class="help-block">{{ $errors->first('category') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        <label for="feature_img" class="control-label">Blog Feature Image*</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="file" name="feature_img" id="feature_img" class="form-control" />
                                <p>#(For Feature Image)<p>
                            </div>
                            <div class="col-sm-6">
                                <div id="image-preview" class="choose_feature image-preview"></div>
                            </div>
                        </div>
                        @if($errors->has('feature_img'))
                            <p class="help-block">
                                {{ $errors->first('feature_img') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('blog_description', 'Blog Description*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('blog_description', old('blog_description'), ['class' => 'ckeditor form-control title', 'placeholder' => '','rows'=>10]) !!}
                        @if($errors->has('blog_description'))
                            <p class="help-block">{{ $errors->first('blog_description') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('author_name', 'Author Name', ['class' => 'control-label']) !!}
                        {!! Form::text('author_name', old('author_name'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('author_name'))
                            <p class="help-block">
                                {{ $errors->first('author_name') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('author_comment', 'Author Comment', ['class' => 'control-label']) !!}
                        {!! Form::textarea('author_comment', old('author_comment'), ['class' => 'form-control', 'placeholder' => '','rows'=>4]) !!}
                        @if($errors->has('author_comment'))
                            <p class="help-block">
                                {{ $errors->first('author_comment') }}
                            </p>
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
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_keywords', 'Meta Keywords*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('meta_keywords', old('meta_keywords'), ['class' => 'form-control', 'placeholder' => '','rows'=>4]) !!}
                        @if($errors->has('meta_keywords'))
                            <p class="help-block">
                                {{ $errors->first('meta_keywords') }}
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
				input_field: "#feature_img",
				preview_box: "#image-preview",
				label_field: "#feature_img",
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
