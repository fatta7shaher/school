@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{__('List_Subject')}} 
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{__('List_Subject')}} 
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
                            <a href="{{route('Subject.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{__('add_subject')}}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('name_subject')}}</th>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('classroom')}}</th>
                                            <th>{{__('Name_Teacher')}}</th>
                                            <th>{{__('Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subjects as $subject)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$subject->name}}</td>
                                            <td>{{$subject->grade->Name}}</td>
                                            <td>{{$subject->classroom->Name_Class}}</td>
                                            <td>{{$subject->teacher->Name}}</td>
                                            <td>
                                                <a href="{{route('Subject.edit.{id}',$subject->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_subject{{ $subject->id }}" title="{{__('Delete')}}"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="delete_subject{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{route('Subject.destroy','test')}}" method="post">
                                                    {{method_field('delete')}}
                                                    {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{__('delete_subject')}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ trans('are sure of the deleting process?') }} {{$subject->name}}</p>
                                                            <input type="hidden" name="id" value="{{$subject->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Cansel') }}</button>
                                                                <button type="submit" class="btn btn-danger">{{ trans('submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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