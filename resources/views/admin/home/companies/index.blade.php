@extends('layouts.app')

@section('content')
    <h3 class="page-title">Home : Top Companies</h3>
    <div class="panel panel-default">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Option</th>
                            <td>Top Companies</td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Ranks</th>
                                <th>Company Name</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($companies as $company){ ?>
                                <tr>
                                    <td>{{ $company->ranks }}</td>
                                    <?php if($company->emploayer_id !== null){ ?>
                                        <?php $employer = DB::table('tb_employer')->where('id', '=', $company->emploayer_id)->get(); ?>
                                        <td><p>{{ $employer[0]->company_name }}</p></td>
                                        <td>
                                            <img src="{{ url('upload/employer/'.$employer[0]->company_logo) }}" style="width: 100px;height: 100px;object-fit: contain;object-position: center;" />
                                        </td>
                                    <?php }else{ ?>
                                        <td><p>Currently Not Available</p></td>
                                        <td><p>Currently Not Available</p></td>
                                    <?php } ?>
                                    <td>
                                        <a href="{{ route('admin.home.edit.companies', [$company->id]) }}" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.home.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
