@extends('layouts.app')

@section('content')
    <h3 class="page-title">Home Page Banner</h3>
    <form action="{{ route('admin.home.banner.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $banner->id }}" />
        <div class="panel panel-default">
            <div class="panel-heading">@lang('quickadmin.qa_edit')</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                        <input type="text" name="title" id="title" value="{{ $banner->title }}" class="form-control" />
                        @if($errors->has('title'))
                            <p class="help-block">
                                {{ $errors->first('title') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('sub_title', 'Sub Title', ['class' => 'control-label']) !!}
                        <input type="text" name="sub_title" id="sub_title" value="{{ $banner->sub_title }}" class="form-control" />
                        @if($errors->has('sub_title'))
                            <p class="help-block">
                                {{ $errors->first('sub_title') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        <label for="image">Banner Image*</label>
                        <input type="file" name="image" id="image" value="{{ $banner->image }}" class="form-control title" />
                        @if($errors->has('image'))
                            <p class="help-block">
                                {{ $errors->first('image') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_tag', 'Meta Title', ['class' => 'control-label']) !!}
                        <input type="text" name="meta_tag" id="meta_tag" value="{{ $banner->meta_tag }}" class="form-control" />
                        @if($errors->has('meta_tag'))
                            <p class="help-block">
                                {{ $errors->first('meta_tag') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_description', 'Description*', ['class' => 'control-label']) !!}
                        <textarea id="meta_description" name="meta_description" class="form-control" rows="6">{{ $banner->meta_description }}</textarea>
                        @if($errors->has('meta_description'))
                            <p class="help-block">
                                {{ $errors->first('meta_description') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('author', 'Author Name(For SEO Tags)', ['class' => 'control-label']) !!}
                        <input type="text" name="author" id="author" value="{{ $banner->author }}" class="form-control" />
                        @if($errors->has('author'))
                            <p class="help-block">
                                {{ $errors->first('author') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_keywords', 'Keywords*', ['class' => 'control-label']) !!}
                        <textarea id="meta_keywords" name="meta_keywords" class="form-control" rows="6">{{ $banner->meta_keywords }}</textarea>
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
    </form>

@stop
