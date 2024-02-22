@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('sections') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('sections') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('department add') }}</a>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">
                        @foreach ($grades as $Grade)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{ $Grade->Name }}</a>
                            <div class="acd-des">
                                <div class="row">
                                    <div class="col-xl-12 mb-30">
                                        <div class="card card-statistics h-100">
                                            <div class="card-body">
                                                <div class="d-block d-md-flex justify-content-between">
                                                    <div class="d-block">
                                                    </div>
                                                </div>
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th>#</th>
                                                                <th>{{ trans('Department Name') }}
                                                                </th>
                                                                <th>{{ trans('Class Name') }}</th>
                                                                <th>{{ trans('Status') }}</th>
                                                                <th>{{ trans('Processes') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            @foreach ($Grade->sections as $list_sections)
                                                            <tr>
                                                                <?php $i++; ?>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $list_sections->name_section }}</td>
                                                                <td>{{ $list_sections->My_classs->Name_Class }}
                                                                </td>
                                                                <td>
                                                                    @if ($list_sections->status === 1)
                                                                    <label class="badge badge-success">{{ trans('Active') }}</label>
                                                                    @else
                                                                    <label class="badge badge-danger">{{ trans('In Active') }}</label>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#edit{{ $list_sections->id }}">{{ trans('Edit') }}</a>
                                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $list_sections->id }}">{{ trans('Delete') }}</a>
                                                                </td>
                                                            </tr>
                                                            <!--تعديل قسم جديد -->
                                                            <div class="modal fade" id="edit{{ $list_sections->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                                                                {{ trans('Department Edit') }}
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('section.update') }}" method="POST">
                                                                                {{ method_field('patch') }}
                                                                                {{ csrf_field() }}
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <input type="text" name="name_section_Ar" class="form-control" value="{{ $list_sections->getTranslation('name_section', 'ar') }}">
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <input type="text" name="name_section_En" class="form-control" value="{{ $list_sections->getTranslation('name_section', 'en') }}">
                                                                                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $list_sections->id }}">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="col">
                                                                                    <label for="inputName" class="control-label">{{ trans('Name') }}</label>
                                                                                    <select name="grade_id" class="custom-select" onclick="console.log($(this).val())">
                                                                                        <!--placeholder-->
                                                                                        <option value="{{ $Grade->id }}">
                                                                                            {{ $Grade->Name }}
                                                                                        </option>
                                                                                        @foreach ($list_sections as $list_Grade)
                                                                                        <option value="{{ $list_sections->id }}">
                                                                                            {{ $list_sections->Name }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <br>
                                                                                <div class="col">
                                                                                    <label for="inputName" class="control-label">{{ trans('Class Name') }}</label>
                                                                                    <select name="class_id" class="custom-select">
                                                                                        <option value="{{ $list_sections->My_classs->id }}">
                                                                                            {{ $list_sections->My_classs->Name_Class }}
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <br>
                                                                                <div class="col">
                                                                                    <div class="form-check">

                                                                                        @if ($list_sections->status === 1)
                                                                                        <input type="checkbox" checked class="form-check-input" name="status" id="exampleCheck1">
                                                                                        @else
                                                                                        <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1">
                                                                                        @endif
                                                                                        <label class="form-check-label" for="exampleCheck1">{{ trans('Status') }}</label>
                                                                                        <div class="col">
                                                                                            <label for="inputName" class="control-label">{{ trans('Name_Teacher') }}</label>
                                                                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                                @foreach($list_sections->teachers as $teacher)
                                                                                                <option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                                                                                                @endforeach

                                                                                                @foreach($teachers as $teacher)
                                                                                                <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Cansel') }}</button>
                                                                            <button type="submit" class="btn btn-danger">{{ trans('Edit') }}</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- delete_modal_Grade -->
                                                            <div class="modal fade" id="delete{{ $list_sections->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                                                {{ trans('Department Delete') }}
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('section.destroy') }}" method="post">
                                                                                {{ method_field('Delete') }}
                                                                                @csrf
                                                                                {{ trans('are sure of the deleting process?') }}
                                                                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $list_sections->id }}">
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('cancel') }}</button>
                                                                                    <button type="submit" class="btn btn-danger">{{ trans('Delete') }}</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--اضافة قسم جديد -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                    {{ trans('department add') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('section.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="name_section_Ar" class="form-control" placeholder="{{ trans('Department name in Arabic') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="name_section_En" class="form-control" placeholder="{{ trans('Department name in English') }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('Name') }}</label>
                                        <select name="grade_id" class="custom-select" onchange="console.log($(this).val())">
                                            <!--placeholder-->
                                            <option value="" selected disabled>{{ trans('Name') }}
                                            </option>
                                            @foreach ($List_Grades as $list_Grade)
                                            <option value="{{ $list_Grade->id }}"> {{ $list_Grade->Name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('Class Name') }}</label>
                                        <select name="class_id" class="custom-select">
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('Name_Teacher') }}</label>
                                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                            @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Cansel') }}</button>
                                <button type="submit" class="btn btn-danger">{{ trans('Save_Data') }}</button>
                            </div>
                            </form>
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

    <script>
        $(document).ready(function() {
            $('select[name="grade_id"]').on('change', function() {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ url('/classes') }}/" + grade_id,
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