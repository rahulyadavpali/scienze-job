@extends('layouts.app')
@section('content')
    <h3 class="page-title">Contestant Detail</h3>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('quickadmin.qa_view')</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Registration Number/Id</th>
                            <td>{{ $registration->registration_id }}</td>
                        </tr>
                        <tr>
                            <th>Applicant Photo</th>
                            <td>
                                <img style="width:125px;height:125px;object-fit: contain;object-position: center;" src="{{ url('upload/applicant-image/'.$registration->photo) }}" />
                            </td>
                        </tr>
                        <tr>
                            <th>Resume</th>
                            <td>
                                <a href="{{ url('upload/applicant-cv/'.$registration->resume) }}" target="_blank">{{ $registration->resume }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Full Name</th>
                            <td>{{ $registration->prefix }} {{ $registration->first_name }} {{ $registration->middle_name }} {{ $registration->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{ $registration->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $registration->mobile_number }}</td>
                        </tr>
                        <tr>
                            <th>Other Phone Number</th>
                            <td>{{ $registration->other_number }}</td>
                        </tr>
                        <tr>
                            <th>About Job-Seeker</th>
                            <td>{{ $registration->description }}</td>
                        </tr>
                        <tr>
                            <th>Previous Work</th>
                            <td>{{ $registration->presernt_work }}</td>
                        </tr>
                        <tr>
                            <th>Salary</th>
                            <td>{{ $registration->exp_salary }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $registration->address }}</td>
                        </tr>
                        <tr>
                            <th>Postal/Zip Code</th>
                            <td>{{ $registration->zip_code }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $registration->city }}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{ $registration->state }}</td>
                        </tr>
                        <tr>
                            <th>Categories</th>
                            <td>{{ $registration->categories }}</td>
                        </tr>
                        <tr>
                            <th>Sub-Categories</th>
                            <td>
                                <?php if($registration->subcategories1 !== null){$skills = DB::table('sub_category')->where('id', '=', $registration->subcategories1)->get(); ?>
                                    {{ $skills[0]->title }}, 
                                <?php } if($registration->subcategories2 !== null){$skills = DB::table('sub_category')->where('id', '=', $registration->subcategories2)->get(); ?>
                                    {{ $skills[0]->title }}, 
                                <?php } if($registration->subcategories3 !== null){$skills = DB::table('sub_category')->where('id', '=', $registration->subcategories3)->get(); ?>
                                    {{ $skills[0]->title }}, 
                                <?php } if($registration->subcategories4 !== null){$skills = DB::table('sub_category')->where('id', '=', $registration->subcategories4)->get(); ?>
                                    {{ $skills[0]->title }}, 
                                <?php } if($registration->subcategories5 !== null){$skills = DB::table('sub_category')->where('id', '=', $registration->subcategories5)->get(); ?>
                                    {{ $skills[0]->title }}
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Selection of job by Designation</th>
                            <td>{{ $registration->selection_job }}</td>
                        </tr>
                        
                        <tr>
                            <th>Agree all Term & Condition</th>
                            <td>
                                <?php 
                                    if($registration->accept_terms == 1){echo 'Agree to all terms and condition.';}
                                    else{echo 'DisAgree to all terms and condition.';}
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.registration.index') }}" class="btn btn-default">Back To Registration List</a>
        </div>
    </div>
@stop