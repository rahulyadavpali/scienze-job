@extends('layouts.app')

@section('content')
    <h3 class="page-title">All Registration</h3>

    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_list')</div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($registration) > 0 ? 'datatable' : '' }} @can('registration_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('registration_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>Applicant Photo</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <!-- <th>Last Work</th> -->
                        <th>City</th>
                        <th>State</th>
                        <th>Zip Code</th>
                        <th>Date/Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($registration) > 0)
                    @foreach ($registration as $registration)
                            <tr data-entry-id="{{ $registration->id }}">
                                @can('registration_delete')
                                    <td></td>
                                @endcan
                                <td>
                                    <img style="width:75px;height:75px;object-fit: contain;object-position: center;" src="{{ url('upload/applicant-image/'.$registration->photo) }}" />
                                </td>
                                <td>{{ $registration->prefix }} {{ $registration->first_name }} {{ $registration->middle_name }} {{ $registration->last_name }}</td>
                                <td>{{ $registration->email }}</td>
                                <td>{{ $registration->mobile_number }}</td>
                                <!-- <td>{{ $registration->presernt_work }}</td> -->
                                <td>{{ $registration->city }}</td>
                                <td>{{ $registration->state }}</td>
                                <td>{{ $registration->zip_code }}</td>
                                <td>{{ $registration->created_at }}</td>
                                <td>
                                    @can('registration_view')
                                    <a href="{{ route('admin.registration.show',[$registration->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('registration_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.registration.destroy', $registration->id])) !!}
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
        @can('registration_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.registration.mass_destroy') }}';
        @endcan
    </script>
@endsection