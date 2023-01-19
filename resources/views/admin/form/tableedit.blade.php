@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.information.title')</h3>
    {!! Form::model($form_table, ['method' => 'POST', 'route' => ['admin.form.update_table', $form_table->id]]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('form_label', 'Form Label*', ['class' => 'control-label']) !!}
                    {!! Form::text('form_label', old('form_label'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                    @if($errors->has('form_label'))
                        <p class="help-block">
                            {{ $errors->first('form_label') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('field_type', 'Form Type*', ['class' => 'control-label']) !!}
                    {!! Form::text('field_type', old('field_type'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                    @if($errors->has('field_type'))
                        <p class="help-block">
                            {{ $errors->first('field_type') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('field_name', 'Form Name (for name tag)*', ['class' => 'control-label']) !!}
                    {!! Form::text('field_name', old('field_name'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                    @if($errors->has('field_name'))
                        <p class="help-block">
                            {{ $errors->first('field_name') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('field_id', 'Form ID (for id tag)*', ['class' => 'control-label']) !!}
                    {!! Form::text('field_id', old('field_id'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                    @if($errors->has('field_id'))
                        <p class="help-block">
                            {{ $errors->first('field_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    {!! Form::label('placeholder', 'Form Placeholder*', ['class' => 'control-label']) !!}
                    {!! Form::text('placeholder', old('placeholder'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                    @if($errors->has('placeholder'))
                        <p class="help-block">
                            {{ $errors->first('placeholder') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    <label for="required">Required (If this field is require/mandatory)*</label>
                    <select id="required" name="required" class="form-control title">
                        <option value="{{ $form_table->required }}">
                            <?php if($form_table->required == 1){echo 'Required';}else{echo 'Not Required';} ?>
                        </option>
                        <?php if($form_table->required == 1){ ?>
                            <option value="0">Not Required</option>
                        <?php }else{ ?>
                            <option value="1">Required</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    <label for="status">Field Status*</label>
                    <select id="status" name="status" class="form-control title">
                        <option value="{{ $form_table->status }}">
                            <?php if($form_table->status == 1){echo 'Activate';}else{echo 'In-Activate';} ?>
                        </option>
                        <?php if($form_table->status == 1){ ?>
                            <option value="0">In-Activate</option>
                        <?php }else{ ?>
                            <option value="1">Activate</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-right">
                    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-info']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop
