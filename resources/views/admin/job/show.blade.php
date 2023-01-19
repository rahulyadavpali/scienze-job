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
                            <th>Institute Logo</th>
                            <td>
                                <img style="width:150px;height:100px;object-fit: contain;object-position: center;" src="{{ url('upload/employer/'.$job->company_logo) }}" />
                            </td>
                        </tr>
                        <tr>
                            <th>Institute Name</th>
                            <td>{{ $job->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Institute URL</th>
                            <td><a href="{{ $job->company_website }}" target="_blank">{{ $job->company_website }}</a></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $job->email }}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>{{ $job->contact_number }}</td>
                        </tr>
                        <tr>
                            <th>WhatsApp Number</th>
                            <td>{{ $job->whatsapp_number }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $job->company_address }}</td>
                        </tr>
                        <tr>
                            <th>Postal/Zip Code</th>
                            <td>{{ $job->zip_code }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $job->city }}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{ $job->state }}</td>
                        </tr>
                        <tr>
                            <th>Institute Description</th>
                            <td><p style="text-align: justify">{!! $job->company_description !!}</p></td>
                        </tr>
                        <tr>
                            <th>Google Maps</th>
                            <td>{!! $job->company_location !!}</td>
                        </tr>
                        <tr>
                            <th>Linkedin</th>
                            <td><a href="{{ $job->linkedin }}" target="_blank">{{ $job->linkedin }}</a></td>
                        </tr>
                        <tr>
                            <th>Facebook</th>
                            <td><a href="{{ $job->facebook }}" target="_blank">{{ $job->facebook }}</a></td>
                        </tr>
                        <tr>
                            <th>Twitter</th>
                            <td><a href="{{ $job->twitter }}" target="_blank">{{ $job->twitter }}</a></td>
                        </tr>
                        <tr>
                            <th>Posted Date</th>
                            <td>{{ $job->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <?php if($job->status == 1){echo 'Active';}else{echo 'Deactivate';} ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.job.index') }}" class="btn btn-default">Back To Job List</a>
        </div>
    </div>
@stop