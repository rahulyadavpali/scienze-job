@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit Plan</h3>
    <form action="{{ route('admin.plan.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $plans->id }}" />
        <div class="panel panel-default">
            <div class="panel-heading">@lang('quickadmin.qa_edit')</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('plan_title', 'Plan Title*', ['class' => 'control-label']) !!}
                        <input type="text" name="plan_title" id="plan_title" value="{{ $plans->plan_title }}" class="form-control" />
                        @if($errors->has('plan_title'))
                            <p class="help-block">
                                {{ $errors->first('plan_title') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('plan_price', 'Plan Price*', ['class' => 'control-label']) !!}
                        <input type="text" name="plan_price" id="plan_price" value="{{ $plans->plan_price }}" class="form-control" />
                        @if($errors->has('plan_price'))
                            <p class="help-block">
                                {{ $errors->first('plan_price') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('plan_description', 'Plan Description*', ['class' => 'control-label']) !!}
                        <textarea name="plan_description" id="plan_description" class="ckeditor form-control">{{ $plans->plan_description }}</textarea>
                        @if($errors->has('plan_description'))
                            <p class="help-block">
                                {{ $errors->first('plan_description') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_title', 'Meta Tag Title*', ['class' => 'control-label']) !!}
                        <input type="text" name="meta_title" id="meta_title" value="{{ $plans->meta_title }}" class="form-control" />
                        @if($errors->has('meta_title'))
                            <p class="help-block">
                                {{ $errors->first('meta_title') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_description', 'Meta Tag Description', ['class' => 'control-label']) !!}
                        <textarea class="form-control" name="meta_description" id="meta_description" rows="4">{{ $plans->meta_description }}</textarea>
                        @if($errors->has('meta_description'))
                            <p class="help-block">
                                {{ $errors->first('meta_description') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_keywords', 'Meta Tag Keywords', ['class' => 'control-label']) !!}
                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="4">{{ $plans->meta_keywords }}</textarea>
                        @if($errors->has('meta_keywords'))
                            <p class="help-block">
                                {{ $errors->first('meta_keywords') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('.ckeditor').ckeditor();
        });
    </script>

@stop
