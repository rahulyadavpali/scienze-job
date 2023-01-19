@extends('layouts.app')

@section('content')
    <h3 class="page-title">{{ $category->title }}</h3>
    <p>
        <a href="{{ route('admin.subcategory.create') }}" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Sub-Category</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($subcategory) > 0 ? 'datatable' : '' }} @can('category_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('category_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>Category Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($subcategory) > 0)
                    @foreach ($subcategory as $subcategories)
                            <tr data-entry-id="{{ $subcategories->id }}">
                                @can('category_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $subcategories->title }}</td>
                                <td>
                                    @can('blog_edit')
                                        <a href="{{ route('admin.subcategory.edit', [$subcategories->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('category_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.subcategory.destroy', $subcategories->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('category_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.subcategory.mass_destroy') }}';
        @endcan
    </script>
@endsection