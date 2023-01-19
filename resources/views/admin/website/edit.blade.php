@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit Website Data</h3>
    <form action="{{ route('admin.website.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $plans->id }}" />
        <div class="panel panel-default">
            <div class="panel-heading">@lang('quickadmin.qa_edit')</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('name', 'Website Name*', ['class' => 'control-label']) !!}
                        <input type="text" name="name" id="name" value="{{ $plans->name }}" class="form-control" />
                        @if($errors->has('name'))
                            <p class="help-block">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('link', 'Job Page Link*', ['class' => 'control-label']) !!}
                        <input type="text" name="link" id="link" value="{{ $plans->link }}" class="form-control" />
                        @if($errors->has('link'))
                            <p class="help-block">{{ $errors->first('link') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        <div class="col-sm-6">
                            {!! Form::label('link', 'Website logo*', ['class' => 'control-label']) !!}
                            <input type="file" name="e_logo" id="e_logo" class="form-control" />
                            @if($errors->has('e_logo'))
                                <p class="help-block">{{ $errors->first('e_logo') }}</p>
                            @endif
                        </div>
                        <div class="col-sm-6" style="text-align: center;">
                            <p>Old Logo<p>
                            <img style="width:250px;height: auto;object-fit: contain;object-position: center;" src="{{ url('upload/websites-logo/'.$plans->logo) }}" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('main_url', 'Main URL*', ['class' => 'control-label']) !!}
                        <input type="text" name="main_url" id="main_url" value="{{ $plans->main_url }}" class="form-control" />
                        @if($errors->has('main_url'))
                            <p class="help-block">
                                {{ $errors->first('main_url') }}
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

@stop
