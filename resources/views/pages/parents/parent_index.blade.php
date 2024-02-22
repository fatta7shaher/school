@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('Parents')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('Parents')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->


<div class="row">
    <div class="col-md-12 mb-30">

        <div class="card card-statistics h-100">

            <div class="card-body">

                <div class="col-xl-12 mb-30">

                    <div class="card card-statistics h-100">

                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="{{route('parent.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{trans('Add_Parents')}}</a><br><br>
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Father name in Arabic')}}</th>
                                            <th>{{trans('E-mail')}}</th>
                                            <th>{{trans('ID Number')}}</th>
                                            <th>{{trans('Passport number')}}</th>
                                            <th>{{trans('phone number')}}</th>
                                            <th>{{trans('Job title in Arabic')}}</th>
                                            <th>{{trans('Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($my_parent as $parent)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$parent->name_father}}</td>
                                            <td>{{$parent->email}}</td>
                                            <td>{{$parent->national_id_father}}</td>
                                            <td>{{$parent->passport_id_father}}</td>
                                            <td>{{$parent->phone_father}}</td>
                                            <td>{{$parent->job_father}}</td>
                                            <td>
                                                <a href="{{route('parent.edit.{id}',$parent->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_parent{{ $parent->id }}" title="{{ trans('Delete') }}"><i class="fa fa-trash"></i></button>

                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection0