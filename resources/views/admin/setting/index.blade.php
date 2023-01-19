@extends('layouts.app')

@section('content')
    <h3 class="page-title">Setting</h3>

    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setting as $sett)
                        <tr>
                            <th>{{ $sett->type }}</th>
                            <th>{{ $sett->title }}</th>
                            <?php if($sett->type == "logo"){ ?>
                                <td>
                                    <img style="width:220px;height:110px;object-fit: contain;object-position: center;" src="{{ url('upload/gallery/'.$sett->value) }}" />
                                </td>
                            <?php }else{ ?>
                                <td>{{ $sett->value }}</td>
                            <?php } ?>
                            <td>
                                @can('setting_edit')
                                    <a href="{{ route('admin.setting.edit',[$sett->id]) }}" class="btn btn-xs btn-warning">@lang('quickadmin.qa_edit')</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop