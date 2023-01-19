@extends('layouts.app')

@section('content')
    <h3 class="page-title">Enquiry / Contact Us : Messages</h3>

    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($information) > 0 ? 'datatable' : '' }} @can('information_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('information_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Received At</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($information) > 0)
                    @foreach ($information as $information)
                            <tr data-entry-id="{{ $information->id }}">
                                @can('information_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $information->name }}</td>
                                <td>{{ $information->email }}</td>
                                <td>{{ $information->subject }}</td>
                                <td>{{ $information->message }}</td>
                                <td>{{ $information->created_at }}</td>
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
        @can('information_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.contact.mass_destroy_contact') }}';
        @endcan
    </script>
@endsection