@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.information.title')</h3>
    {!! Form::model($setting, ['method' => 'PUT', 'route' => ['admin.setting.update', $setting->id], 'files'=>true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 form-group">
                    <label for="type" class="control-label">{{ $setting->type }}</label>
                    <input type="text" name="type" id="type" value="{{ $setting->type }}" class="form-control" readonly />
                </div>
                <div class="col-xs-12 col-sm-12 form-group">
                    <?php if($setting->type == "logo"){ ?>
                        <label for="value" class="control-label">{{ $setting->title }}</label>
                        <input type="file" name="value" id="value" class="form-control" required />
                    <?php }elseif($setting->type == "email"){ ?>
                        <label for="value" class="control-label">{{ $setting->title }}</label>
                        <input type="email" name="value" id="value" value="{{ $setting->value }}" class="form-control" />
                    <?php }elseif($setting->type == "phone number"){ ?>
                        <label for="value" class="control-label">{{ $setting->title }}</label>
                        <input type="number" name="value" id="value" value="{{ $setting->value }}" class="form-control" />
                    <?php }elseif($setting->type == "address"){ ?>
                        <label for="value" class="control-label">{{ $setting->title }}</label>
                        <textarea class="form-control ckeditor" name="value" id="value" cols="30" rows="3">{{ $setting->value }}</textarea>
                    <?php }elseif($setting->field == "paragraph"){ ?>
                        <label for="value" class="control-label">{{ $setting->title }}</label>
                        <textarea class="form-control ckeditor" name="value" id="value" cols="30" rows="3">{{ $setting->value }}</textarea>
                    <?php }else{ ?>
                        <label for="value" class="control-label">{{ $setting->title }}</label>
                        <input type="text" name="value" id="value" value="{{ $setting->value }}" class="form-control" />
                    <?php } ?>
                    @if($errors->has('value'))
                        <p class="help-block">{{ $errors->first('value') }}</p>
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
