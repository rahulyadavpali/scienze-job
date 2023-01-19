@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.information.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.information.fields.title')</th>
                            <td>{{ $information->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.information.fields.description')</th>
                            <td>{!! $information->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.information.fields.meta_title')</th>
                            <td>{{ $information->meta_title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.information.fields.meta_description')</th>
                            <td>{{ $information->meta_description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.information.fields.meta_keyword')</th>
                            <td>{{ $information->meta_keywords }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.information.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop