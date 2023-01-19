@extends('layouts.app')
@section('content')
    <h3 class="page-title">Create FAQ</h3>
    <div class="main_divs">
        {!! Form::open(['method' => 'POST', 'route' => ['admin.faq.store'], 'files'=>true,]) !!}
        <div class="panel-default">
            <div class="panel-heading">Create</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('title', 'FAQ Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('title'))
                            <p class="help-block">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('description', 'Description*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'ckeditor form-control', 'placeholder' => '','rows'=>4]) !!}
                        @if($errors->has('description'))
                            <p class="help-block">{{ $errors->first('description') }}</p>
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
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@stop