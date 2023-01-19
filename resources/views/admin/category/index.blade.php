@extends('layouts.app')

@section('content')
    <h3 class="page-title">All Category</h3>
    <p>
        <a href="{{ route('admin.category.create') }}" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create New Category</a>
    </p>
    <!-- <p><a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Sub-Category</a></p> -->

    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($category) > 0 ? 'datatable' : '' }} @can('category_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('category_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>Category Name</th>
                        <th>Meta Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($category) > 0)
                    @foreach ($category as $categorys)
                            <tr data-entry-id="{{ $categorys->id }}">
                                @can('category_delete')
                                    <td></td>
                                @endcan
                                <td>
                                    <?php 
                                        if($categorys->parent_id == 0){echo '';}
                                        else
                                        {
                                            $parent_cat = DB::table('tb_category')->where('id', '=', $categorys->parent_id)->get();
                                            echo $parent_cat[0]->name.' > '; 
                                        }
                                    ?>
                                    {{ $categorys->name }}
                                </td>
                                <td>{{ $categorys->meta_title }}</td>
                                <td>
                                    @can('blog_edit')
                                        <a href="{{ route('admin.category.edit', [$categorys->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('category_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.category.destroy', $categorys->id])) !!}
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
            window.route_mass_crud_entries_destroy = '{{ route('admin.category.mass_destroy') }}';
        @endcan
    </script>
@endsection