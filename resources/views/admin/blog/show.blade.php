@extends('layouts.app')

@section('content')
    <h3 class="page-title">Job Detail</h3>

    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_view')</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Blog Title</th>
                            <td>{{ $blog->title }}</td>
                        </tr>
                        <tr>
                            <th>Feature Image</th>
                            <td>
                                <img style="width:250px;height:200px;object-fit: contain;object-position: center;" src="{{ url('upload/blog/'.$blog->feature_img) }}" />
                            </td>
                        </tr>
                        <tr>
                            <th>Posted Date</th>
                            <td>{{ $blog->posting_date }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $blog->category }}</td>
                        </tr>
                        <tr>
                            <th>Blog Description</th>
                            <td style="text-align: justify">{!! $blog->description !!}</td>
                        </tr>
                        <tr>
                            <th>Author Name</th>
                            <td>{{ $blog->author_name }}</td>
                        </tr>
                        <tr>
                            <th>Author Comment</th>
                            <td>{{ $blog->author_comment }}</td>
                        </tr>
                        <tr>
                            <th>Meta Tag Title</th>
                            <td>{{ $blog->meta_title }}</td>
                        </tr>
                        <tr>
                            <th>Meta Tag Description</th>
                            <td>{{ $blog->meta_description }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.blog.index') }}" class="btn btn-default">Back To Job List</a>
        </div>
    </div>
@stop