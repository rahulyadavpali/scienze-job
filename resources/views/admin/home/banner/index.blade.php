@extends('layouts.app')

@section('content')
    <h3 class="page-title">Home Page Banner</h3>
    <div class="panel panel-default">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Option</th>
                            <td>Home Page Banner</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $banner->title }}</td>
                        </tr>
                        <tr>
                            <th>Sub Title</th>
                            <td>{{ $banner->sub_title }}</td>
                        </tr>
                        <tr>
                            <th>Banner Image</th>
                            <td>
                                <img src="{{ url('upload/gallery/'.$banner->image) }}" style="width: 700px;height: 500px;object-fit: contain;object-position: center;" />
                            </td>
                        </tr>
                        <tr>
                            <th>Meta Title</th>
                            <td>{{ $banner->meta_tag }}</td>
                        </tr>
                        <tr>
                            <th>Meta Description</th>
                            <td>{{ $banner->meta_description }}</td>
                        </tr>
                        <tr>
                            <th>Meta Keyword</th>
                            <td>{{ $banner->meta_keywords }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.home.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
