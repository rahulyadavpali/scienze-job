@extends('layouts.app')

@section('content')
    <h3 class="page-title">Create New Job Designation</h3>
    <div class="main_divs">
        {!! Form::model($designation, ['method' => 'PUT', 'route' => ['admin.designation.update', $designation->id], 'files'=>true,]) !!}
        <div class="panel-default">
            <div class="panel-heading">Create</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('title', 'Designation Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('title'))
                            <p class="help-block">{{ $errors->first('title') }}</p>
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

@stop