@extends('layouts.app')

@section('content')
    <h3 class="page-title">Home : Clients Review</h3>
    <div class="panel panel-default">
        <div class="panel-heading">Details</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name/Institute Name</th>
                                <th>Review Text</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($review as $reviews){ ?>
                                <tr>
                                    <td>
                                        <?php if($reviews->role_type == 1){ ?>
                                            <img src="{{ url('upload/employer/'.$reviews->image) }}" style="width: 180px;height: 180px;object-fit: contain;object-position: center;" />
                                        <?php }else{ ?>
                                            <img src="{{ url('upload/applicant-image/'.$reviews->image) }}" style="width: 180px;height: 180px;object-fit: contain;object-position: center;" />
                                        <?php } ?>
                                    </td>
                                    <td>{{ $reviews->name }}</td>
                                    <td>{{ $reviews->review_text }}</td>
                                    <td>
                                        @can('home_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.home.destroy', $reviews->id])) !!}
                                        {!! Form::submit(trans('Delete This Review'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                        @endcan
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
