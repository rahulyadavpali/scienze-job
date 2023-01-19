@extends('layouts.app')

@section('content')
    <h3 class="page-title">Edit Category</h3>
    <div class="main_divs">
        {!! Form::model($category, ['method' => 'PUT', 'route' => ['admin.category.update', $category->id], 'files'=>true,]) !!}
        <div class="panel-default">
            <div class="panel-heading">Create</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 form-group">
                        <label for="g_categroy">Group Category *</label>
                        <select class="form-control" name="g_categroy" id="g_categroy">
                            <option value="">Select Group Category</option>
                            <option value="0" selected="selected">Parent</option>
                        </select>
                        @if($errors->has('g_categroy'))
                            <p class="help-block">{{ $errors->first('g_categroy') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        <label for="m_categroy">Main Category *</label>
                        <?php $cat_group = DB::table('tb_category')->where('id', '=', $category->id)->get(); ?>
                        <select class="form-control" name="m_categroy" id="m_categroy">
                            <option value="">Select Main Category</option>
                            <option value="0" @if(0 == $cat_group[0]->parent_id) selected="selected" @endif>Parent</option>
                            @foreach($categories as $categorys)
                                <option value="{{ $categorys->id }}" @if($categorys->id == $cat_group[0]->parent_id) selected="selected" @endif>{{ $categorys->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('m_categroy'))
                            <p class="help-block">{{ $errors->first('m_categroy') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('name'))
                            <p class="help-block">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '','rows'=>4]) !!}
                        @if($errors->has('description'))
                            <p class="help-block">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_title', 'Meta Title*', ['class' => 'control-label']) !!}
                        {!! Form::text('meta_title', old('meta_title'), ['class' => 'form-control title', 'placeholder' => '']) !!}
                        @if($errors->has('meta_title'))
                            <p class="help-block">{{ $errors->first('meta_title') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_description', 'Meta Description*', ['class' => 'control-label']) !!}
                        {!! Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'placeholder' => '','rows'=>4]) !!}
                        @if($errors->has('meta_description'))
                            <p class="help-block">{{ $errors->first('meta_description') }}</p>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('meta_keyword', 'Meta Keywords', ['class' => 'control-label']) !!}
                        {!! Form::textarea('meta_keyword', old('meta_keyword'), ['class' => 'form-control', 'placeholder' => '','rows'=>4]) !!}
                        @if($errors->has('meta_keyword'))
                            <p class="help-block">{{ $errors->first('meta_keyword') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right move_sbm_btn">
                        {!! Form::submit(trans('Update'), ['class' => 'btn btn-info']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@stop