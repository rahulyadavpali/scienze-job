@extends('layouts.app')
@section('content')
    <h3 class="page-title">SEO</h3>
    {!! Form::model($seo, ['method' => 'PUT', 'route' => ['admin.seo.update', $seo->id]]) !!}
        <div class="panel panel-default">
            <div class="panel-heading">@lang('quickadmin.qa_edit')</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('page', 'Page Name*', ['class' => 'control-label']) !!}
                        {!! Form::text('page', old('page'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('page'))
                            <p class="help-block">
                                {{ $errors->first('meta_title') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_title', 'Meta Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('meta_title', old('meta_title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('meta_title'))
                            <p class="help-block">
                                {{ $errors->first('meta_title') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_description', 'Meta Description*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control title', 'placeholder' => '','rows'=>6]) !!}
                        @if($errors->has('meta_description'))
                            <p class="help-block">
                                {{ $errors->first('meta_description') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_keyword', 'Meta Keywords', ['class' => 'control-label']) !!}
                        {!! Form::textarea('meta_keyword', old('meta_keyword'), ['class' => 'form-control title', 'placeholder' => '','rows'=>4]) !!}
                        @if($errors->has('meta_keyword'))
                            <p class="help-block">
                                {{ $errors->first('meta_keyword') }}
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
    {!! Form::close() !!}
@stop