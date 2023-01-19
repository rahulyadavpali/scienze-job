@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit Sub-Category</h3>
    <div class="main_divs">
        {!! Form::model($subcategory, ['method' => 'PUT', 'route' => ['admin.subcategory.update', $subcategory->id], 'files'=>true,]) !!}
        <div class="panel-default">
            <div class="panel-heading">Create</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        <label for="category_id">Parent Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <?php foreach($category as $categories){
                                if($subcategory->category_id == $categories->id){ ?>
                                    <option selected value="{{ $categories->id }}">{{ $categories->title }}</option>
                                <?php }
                                else{ ?>
                                    <option value="{{ $categories->id }}">{{ $categories->title }}</option>
                                <?php }
                            } ?>
                        </select>
                        @if($errors->has('category_id'))
                            <p class="help-block">{{ $errors->first('category_id') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('title', 'Cub-Category Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('title'))
                            <p class="help-block">{{ $errors->first('title') }}</p>
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
                        {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'placeholder' => '','rows'=>4]) !!}
                        @if($errors->has('meta_description'))
                            <p class="help-block">
                                {{ $errors->first('meta_description') }}
                            </p>
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