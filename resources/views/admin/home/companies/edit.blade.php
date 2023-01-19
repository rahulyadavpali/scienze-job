@extends('layouts.app')

@section('content')
    <h3 class="page-title">Home : Top Companies</h3>
    <form action="{{ route('admin.home.company.update') }}" method="POST">
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading">@lang('quickadmin.qa_edit')</div>
            <div class="panel-body">
                <div class="row">
                    <input type="hidden" name="rank_id" id="rank_id" value="{{ $companies->id }}" />
                    <?php $employeres = DB::table('tb_employer')->where('id', '=', $companies->emploayer_id)->get(); ?>
                    <div class="col-xs-12 col-sm-12 form-group">
                        <label for="rank">For Rank : {{ $companies->ranks }}</label>
                        <select name="rank" id="rank" class="form-control">
                            @foreach($employer as $employers)
                                <?php if($companies->emploayer_id == $employers->id){ ?>
                                    <option selected value="{{ $employers->id }}">{{ $employers->company_name }}</option>
                                <?php }else{ ?>
                                    <option value="{{ $employers->id }}">{{ $employers->company_name }}</option>
                                <?php } ?>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        </div>
    </form>

@stop
