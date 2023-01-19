@extends('layouts.app')
@section('content')
    <h3 class="page-title">Edit Offers</h3>
    {!! Form::model($offer, ['method' => 'POST', 'route' => ['admin.home.offers.update', $offer->id], 'files'=>true,]) !!}
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading">Edit</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('icon', 'Icon*', ['class' => 'control-label']) !!}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <input type="file" name="icon" id="icon" value="{{ old('icon') }}" class="form-control" />
                                <p>use only png image for good quality*</p>
                                @if($errors->has('icon'))
                                    <p class="help-block">{{ $errors->first('icon') }}</p>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <img style="width:180px;height:180px;object-fit: contain;object-position: center;" src="{{ url('upload/icon/'.$offer->icon) }}" />
                                <p>Old icon<p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('title'))
                            <p class="help-block">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('description', 'Description*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control ckeditor']) !!}
                        @if($errors->has('description'))
                            <p class="help-block">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-info']) !!}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

@stop
