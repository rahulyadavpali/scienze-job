@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.information.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.information.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('title', 'Information Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('description', 'Description*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'ckeditor form-control title', 'placeholder' => '','rows'=>10]) !!}
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
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
                    {!! Form::label('meta_description', 'Meta Tag Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control title', 'placeholder' => '','rows'=>4]) !!}
                    @if($errors->has('meta_description'))
                        <p class="help-block">
                            {{ $errors->first('meta_description') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('meta_keywords', 'Meta Tag Keywords', ['class' => 'control-label']) !!}
                    {!! Form::textarea('meta_keywords', old('meta_keywords'), ['class' => 'form-control title', 'placeholder' => '','rows'=>4]) !!}
                    @if($errors->has('meta_keywords'))
                        <p class="help-block">
                            {{ $errors->first('meta_keywords') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-right">
                    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-info']) !!}
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('.ckeditor').ckeditor();
        });
    </script>

    {!! Form::close() !!}
@stop
