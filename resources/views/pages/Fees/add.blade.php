@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{__('Add_new_fees')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{__('Add_new_fees')}}
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
                <form method="post" action="{{ route('Fee.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">{{__('Name in Arabic')}}</label>
                            <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                        </div>
                        <div class="form-group col">
                            <label for="inputEmail4">{{__('Name in English')}}</label>
                            <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                        </div>
                        <div class="form-group col">
                            <label for="inputEmail4">{{__('amount')}}</label>
                            <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState"> {{__('Name')}}</label>
                            <select class="custom-select mr-sm-2" name="grade_id">
                                <option selected disabled>{{trans('Choose from the list')}}...</option>
                                @foreach($Grades as $Grade)
                                <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip"> {{__('classroom')}}</label>
                            <select class="custom-select mr-sm-2" name="class_room_id">
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip"> {{__('academic_year')}}</label>
                            <select class="custom-select mr-sm-2" name="year">
                                <option selected disabled>{{trans('Choose from the list')}}...</option>
                                @php
                                $current_year = date("Y")
                                @endphp
                                @for($year=$current_year; $year<=$current_year +1 ;$year++) <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip"> {{__('Type_of_fees')}}</label>
                            <select class="custom-select mr-sm-2" name="fee_type">
                                <option value="1">{{__('Study_Fees')}}</option>
                                <option value="2">{{__('Bus_fees')}}</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress">{{__('Notes')}}</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{__('Finish')}}</button>
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