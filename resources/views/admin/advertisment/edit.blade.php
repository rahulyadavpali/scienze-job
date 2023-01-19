@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit Plan</h3>
    <form action="{{ route('admin.advertisment.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $plans->id }}" />
        <div class="panel panel-default">
            <div class="panel-heading">@lang('quickadmin.qa_edit')</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('plan_name', 'Plan Name*', ['class' => 'control-label']) !!}
                        <input type="text" name="plan_name" id="plan_name" value="{{ $plans->plan_name }}" class="form-control" />
                        @if($errors->has('plan_name'))
                            <p class="help-block">
                                {{ $errors->first('plan_name') }}
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
                        {!! Form::label('location', 'Plan Location*', ['class' => 'control-label']) !!}
                        <input type="text" name="location" id="location" value="{{ $plans->location }}" class="form-control" />
                        @if($errors->has('location'))
                            <p class="help-block">
                                {{ $errors->first('location') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('plan_price', 'Final Plan Price*', ['class' => 'control-label']) !!}
                        <input type="text" name="plan_price" id="plan_price" value="{{ $plans->plan_price }}" class="form-control" />
                        @if($errors->has('plan_price'))
                            <p class="help-block">
                                {{ $errors->first('plan_price') }}
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
