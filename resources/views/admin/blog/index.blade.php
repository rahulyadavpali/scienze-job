@extends('layouts.app')

@section('content')
    <h3 class="page-title">All Blogs</h3>
    <p>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create New Blog</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($blog) > 0 ? 'datatable' : '' }} @can('blog_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('blog_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>Feature Image</th>
                        <th>Blog Title</th>
                        <th>Sub Paragraph</th>
                        <th>Posted Date</th>
                        <th>Category</th>
                        <th>Author Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($blog) > 0)
                    @foreach ($blog as $blogs)
                            <tr data-entry-id="{{ $blogs->id }}">
                                @can('blog_delete')
                                    <td></td>
                                @endcan
                                <td>
                                    <img style="width:125px;height:100px;object-fit: contain;object-position: center;" src="{{ url('upload/blog/'.$blogs->feature_img) }}" />
                                </td>
                                <td>{{ $blogs->title }}</td>
                                <td>{{ $blogs->sub_para }}</td>
                                <td>{{ $blogs->posting_date }}</td>
                                <td>{{ $blogs->category }}</td>
                                <td>{{ $blogs->author_name }}</td>
                                <td>
                                    @can('blog_view')
                                        <a href="{{ route('admin.blog.show',[$blogs->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('blog_edit')
                                        <a href="{{ route('admin.blog.edit', [$blogs->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('blog_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.blog.destroy', $blogs->id])) !!}
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
        @can('blog_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.blog.mass_destroy') }}';
        @endcan
    </script>
@endsection