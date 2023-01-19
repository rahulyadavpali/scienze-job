@extends('layouts.app')
@section('content')
    <h3 class="page-title">Page SEO Option (Title, Description, Keywords)</h3>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($seo) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>Page Name</th>
                        <th>Meta Tittle</th>
                        <th>Meta Desctiption</th>
                        <th>Meta Keywords</th>
                        <th>@lang('quickadmin.information.fields.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($seo) > 0)
                        @foreach ($seo as $seo)
                            <tr data-entry-id="{{ $seo->id }}">
                                <td>{{ $seo->page }}</td>
                                <td>{{ $seo->meta_title }}</td>
                                <td>{{ $seo->meta_description }}</td>
                                <td>{{ $seo->meta_keyword }}</td>
                                <td>
                                    @can('information_view')
                                        <a href="{{ route('admin.seo.show',[$seo->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('information_edit')
                                        <a href="{{ route('admin.seo.edit',[$seo->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop