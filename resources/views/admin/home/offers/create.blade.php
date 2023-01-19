@extends('layouts.app')
@section('content')
    <h3 class="page-title">Create Offers</h3>
    <form action="{{ route('admin.home.offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading">Create</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('icon', 'Icon*', ['class' => 'control-label']) !!}
                        <input type="file" name="icon" id="icon" value="{{ old('icon') }}" class="form-control" />
                        <p>use only png image for good quality*</p>
                        @if($errors->has('icon'))
                            <p class="help-block">{{ $errors->first('icon') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" />
                        @if($errors->has('title'))
                            <p class="help-block">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('description', 'Description*', ['class' => 'control-label']) !!}
                        <textarea name="description" id="description" class="ckeditor form-control">{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                            <p class="help-block">{{ $errors->first('description') }}</p>
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

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

@stop
