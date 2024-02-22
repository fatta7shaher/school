@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('Student_details')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('Student_details')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="card-body">
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02" role="tab" aria-controls="home-02" aria-selected="true">{{trans('Student_details')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02" role="tab" aria-controls="profile-02" aria-selected="false">{{trans('Attachments')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel" aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{trans('student_name')}}</th>
                                            <td>{{$Student->name }}</td>
                                            <th scope="row">{{trans('E-mail')}}</th>
                                            <td>{{$Student->email}}</td>
                                            <th scope="row">{{trans('Gender')}}</th>
                                            <td>{{$Student->gender->Name}}</td>
                                            <th scope="row">{{trans('Nationality')}}</th>
                                            <td>{{$Student->Nationality->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('Name')}}</th>
                                            <td>{{ $Student->grade->Name }}</td>
                                            <th scope="row">{{trans('Class Name')}}</th>
                                            <td>{{$Student->classroom->Name_Class}}</td>
                                            <th scope="row">{{trans('section')}}</th>
                                            <td>{{$Student->section->name_section}}</td>
                                            <th scope="row">{{trans('Date_of_Birth')}}</th>
                                            <td>{{ $Student->Date_Birth}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('parent')}}</th>
                                            <td>{{ $Student->myparent->name_father}}</td>
                                            <th scope="row">{{trans('academic_year')}}</th>
                                            <td>{{ $Student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form method="post" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="academic_year">{{trans('Attachments')}}
                                                        : <span class="text-danger">*</span></label>
                                                    <input type="file" accept="image/*" name="photos[]" multiple required>
                                                    <input type="hidden" name="student_name" value="{{$Student->name}}">
                                                    <input type="hidden" name="student_id" value="{{$Student->id}}">
                                                </div>
                                            </div>
                                            <br><br>
                                            <button type="submit" class="button button-border x-small">
                                                {{trans('submit')}}
                                            </button>
                                        </form>
                                    </div>
                                    <br>
                                    <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('filename')}}</th>
                                                <th scope="col">{{trans('created_at')}}</th>
                                                <th scope="col">{{trans('Processes')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Student->images as $attachment)
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$attachment->filename}}</td>
                                                <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-info btn-sm" href="{{url('Download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}" role="button"><i class="fas fa-download"></i>&nbsp; {{trans('Download')}}</a>

                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#Delete_img{{ $attachment->id }}" title="{{ trans('Delete') }}">{{trans('Delete')}}
                                                    </button>

                                                </td>
                                            </tr>
                                            @include('pages.student_delete_img')
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
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection