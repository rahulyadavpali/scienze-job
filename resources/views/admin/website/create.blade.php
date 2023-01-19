@extends('layouts.app')

@section('content')
    <h3 class="page-title">Add New Website</h3>
    <form action="{{ route('admin.website.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading">Add New Website</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('name', 'Website Name*', ['class' => 'control-label']) !!}
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" />
                        @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('link', 'Job Page Link*', ['class' => 'control-label']) !!}
                        <input type="text" name="link" id="link" value="{{ old('link') }}" class="form-control" />
                        @if($errors->has('link'))
                            <p class="help-block">
                                {{ $errors->first('link') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('link', 'Website logo*', ['class' => 'control-label']) !!}
                        <input type="file" name="logo" id="logo" class="form-control" />
                        @if($errors->has('logo'))
                            <p class="help-block">{{ $errors->first('logo') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('main_url', 'Main URL*', ['class' => 'control-label']) !!}
                        <input type="text" name="main_url" id="main_url" value="{{ old('main_url') }}" class="form-control" />
                        @if($errors->has('main_url'))
                            <p class="help-block">
                                {{ $errors->first('main_url') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        {!! Form::submit(trans('Add'), ['class' => 'btn btn-info']) !!}
                    </div>
                </div>
            </div>
        </div>
    </form>

@stop
