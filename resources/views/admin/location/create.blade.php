@extends('layouts.app')

@section('content')
    <h3 class="page-title">Create New Job Location For Filter</h3>
    <div class="main_divs">
        {!! Form::open(['method' => 'POST', 'route' => ['admin.joblocation.store'], 'files'=>true,]) !!}
        <div class="panel-default">
            <div class="panel-heading">Create</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('location', 'New Location*', ['class' => 'control-label']) !!}
                        {!! Form::text('location', old('location'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('location'))
                            <p class="help-block">{{ $errors->first('location') }}</p>
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