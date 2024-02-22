@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
تعديل كتاب {{$book->title}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
تعديل كتاب {{$book->title}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('library.update','test')}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">اسم الكتاب</label>
                                    <input type="text" name="title" value="{{$book->title}}" class="form-control">
                                    <input type="hidden" name="id" value="{{$book->id}}" class="form-control">
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="grade_id">{{trans('Name')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="grade_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                            <option value="{{ $grade->id }}" {{$book->grade_id == $grade->id ?'selected':''}}>{{ $grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="classroom_id">{{trans('classrooms')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="class_room_id">
                                            <option value="{{$book->Classroom_id}}">{{$book->classroom->Name_Class}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{trans('section')}} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
                                            <option value="{{$book->section_id}}">{{$book->section->name_section}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>

                            <div class="form-row">
                                <div class="col">

                                    <embed src="{{ URL::asset('attachments/library/'.$book->file_name) }}" type="application/pdf" height="150px" width="100px"><br><br>

                                    <div class="form-group">
                                        <label for="academic_year">المرفقات : <span class="text-danger">*</span></label>
                                        <input type="file" accept="application/pdf" name="file_name">
                                    </div>

                                </div>
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
                        </form>
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
<script>
    $(document).ready(function() {
        $('select[name="grade_id"]').on('change', function() {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="class_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection