@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
اضافة فاتورة جديدة
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
اضافة فاتورة جديدة {{$student->name}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class=" row mb-30" action="{{ route('Feeinvoice.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Fees">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">{{__('Name')}}</label>
                                            <select class="fancyselect" name="student_id" required>
                                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{__('Type_of_fees')}}</label>
                                            <div class="box">
                                                <select class="fancyselect" name="fee_id" required>
                                                    <option value="">{{__('Choose from the list')}}</option>
                                                    @foreach($fees as $fee)
                                                    <option value="{{$fee->id }}">{{ $fee->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{__('amount')}}</label>
                                            <div class="box">
                                                <select class="fancyselect" name="amount" required>
                                                    <option value="">{{__('Choose from the list')}}</option>
                                                    @foreach($fees as $fee)
                                                    <option value="{{$fee->amount }}">{{$fee->amount }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="description" class="mr-sm-2">{{__('Statement')}}</label>
                                            <div class="box">
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('Processes') }}:</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('Insert_record') }}" />
                                </div>
                            </div><br>
                            <input type="hidden" name="grade_id" value="{{$student->grade_id}}">
                            <input type="hidden" name="class_room_id" value="{{$student->class_room_id}}">
                            <button type="submit" class="btn btn-primary">{{__('Information for sure')}}</button>
                        </div>
                    </div>
                </form>
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