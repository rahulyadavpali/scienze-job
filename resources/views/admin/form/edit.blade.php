@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.information.title')</h3>
    {!! Form::model($form, ['method' => 'PUT', 'route' => ['admin.form.update', $form->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('name', 'Form Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('use', 'Form Use*', ['class' => 'control-label']) !!}
                    {!! Form::text('use', old('use'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                    @if($errors->has('use'))
                        <p class="help-block">
                            {{ $errors->first('use') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('meta_title', 'Meta Tag Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('meta_title', old('meta_title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                    @if($errors->has('meta_title'))
                        <p class="help-block">
                            {{ $errors->first('meta_title') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('meta_description', 'Meta Tag Description*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control title', 'placeholder' => '','rows'=>4]) !!}
                    @if($errors->has('meta_description'))
                        <p class="help-block">
                            {{ $errors->first('meta_description') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('meta_keyword', 'Meta Tag Keywords*', ['class' => 'control-label']) !!}
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

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('.ckeditor').ckeditor();
        });
    </script>

    {!! Form::close() !!}
@stop
