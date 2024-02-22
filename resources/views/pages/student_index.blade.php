@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('list_students')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('list_students')}}
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
                            <a href="{{route('student.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{trans('Add_Student')}}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('student_name')}}</th>
                                            <th>{{trans('E-mail')}}</th>
                                            <th>{{trans('Gender')}}</th>
                                            <th>{{trans('Name')}}</th>
                                            <th>{{trans('classroom')}}</th>
                                            <th>{{trans('section')}}</th>
                                            <th>{{trans('Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->Name}}</td>
                                            <td>{{$student->grade->Name}}</td>
                                            <td>{{$student->classroom->Name_Class}}</td>
                                            <td>{{$student->section->name_section}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        .
                                                    </button>

                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        .
                                                    </button>

                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        .
                                                    </button>
                                                </div>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{trans('Processes')}}
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{route('student.show.{id}',$student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;{{trans('View_student_data')}}</a>
                                                        <a class="dropdown-item" href="{{route('student.edit.{id}',$student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('Modify_student_data')}}</a>
                                                        <a class="dropdown-item" href="{{route('Feeinvoice.show.{id}',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;{{trans('Add_a_fee_invoice')}}&nbsp;</a>
                                                        <a class="dropdown-item" href="{{route('receipt.show.{id}',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;{{trans('Catch_Receipt')}}</a>
                                                        <a class="dropdown-item" href="{{route('ProcessingFee.show.{id}',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;{{trans('Exclude_fees')}}</a>
                                                        <a class="dropdown-item" href="{{route('Payment.show.{id}',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;{{trans('receipt')}}</a>
                                                        <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;{{trans('Delete_student_data')}}</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('pages.student_delete')
                                        @endforeach
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
@endsection