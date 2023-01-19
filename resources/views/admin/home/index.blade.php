@extends('layouts.app')

@section('content')
    <h3 class="page-title">Home Banner</h3>
    <div class="panel panel-default">
        <div class="panel-heading">Menu Options</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Option</th>
                        <th>Title</th>
                        <th>Meta Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Home Page - Banner</td>
                        <td>{{ $banner->title }}</td>
                        <td>{{ $banner->meta_tag }}</td>
                        <td>
                            <a href="{{ route('admin.home.banner.show', [$banner->id]) }}" class="btn btn-success">View Detail</a>
                            <a href="{{ route('admin.home.banner.edit', [$banner->id]) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Home Page - Top Companies</td>
                        <td>Top Companies</td>
                        <td>Not for this section.</td>
                        <td>
                            <a href="{{ route('admin.home.view.companies') }}" class="btn btn-success">View Detail</a>
                            <!-- <a href="{{ route('admin.home.edit.companies') }}" class="btn btn-warning">Edit</a> -->
                        </td>
                    </tr>
                    <tr>
                        <td>Home Page - Clients Review</td>
                        <td>What Clients Say?</td>
                        <td></td>
                        <td>
                            <a href="{{ route('admin.home.client') }}" class="btn btn-success">View Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Home Page - Offers Section (Key Highlight)</td>
                        <td>Offering The Best Deals</td>
                        <td></td>
                        <td>
                            <a href="{{ route('admin.home.offers') }}" class="btn btn-success">View Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
