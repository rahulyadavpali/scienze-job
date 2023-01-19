@extends('layouts.app')

@section('content')
    <h3 class="page-title">SEO</h3>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_view')</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Page Name</th>
                            <td>{{ $seo->page }}</td>
                        </tr>
                        <tr>
                            <th>Meta Title</th>
                            <td>{{ $seo->meta_title }}</td>
                        </tr>
                        <tr>
                            <th>Meta Description</th>
                            <td>{!! $seo->meta_description !!}</td>
                        </tr>
                        <tr>
                            <th>Meta Keywords</th>
                            <td>{{ $seo->meta_keyword }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.seo.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop