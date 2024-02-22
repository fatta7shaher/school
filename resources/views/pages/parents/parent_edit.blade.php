@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('Add_Parents')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('Add_Parents')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<form method="post" action="{{ route('parent.edit.{id}','test') }}" autocomplete="off">
    @method('PUT')
    @csrf
    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Father information')}}</h6><br>
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('E-mail')}}</label>
                    <input type="email" name="email" class="form-control">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="col">
                    <label for="title">{{trans('password')}}</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('Father name in Arabic')}}</label>
                    <input type="text" name="name_father" class="form-control">
                    @error('name_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('Father name in English')}}</label>
                    <input type="text" name="name_father_en" class="form-control">
                    @error('name_father_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="title">{{trans('Job title in Arabic')}}</label>
                    <input type="text" name="job_father" class="form-control">
                    @error('job_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="title">{{trans('Job title in English')}}</label>
                    <input type="text" name="job_father_en" class="form-control">
                    @error('job_father_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{trans('ID Number')}}</label>
                    <input type="text" name="national_id_father" class="form-control">
                    @error('national_id_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('Passport number')}}</label>
                    <input type="text" name="passport_id_father" class="form-control">
                    @error('passport_id_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('phone number')}}</label>
                    <input type="text" name="phone_father" class="form-control">
                    @error('phone_father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">{{trans('Nationality')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="nationality_father_id">
                        <option value="" selected>{{trans('Choose from the list')}}...</option>
                        @foreach($nationalities as $nationality)
                        <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                        @endforeach

                    </select>
                    @error('nationality_father_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputState">{{trans('Type_Blood')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="blood_type_father_id">
                        <option value="" selected>{{trans('Choose from the list')}}...</option>
                        @foreach($bloodTypes as $bloodTybe)
                        <option value="{{$bloodTybe->id}}">{{$bloodTybe->name}}</option>
                        @endforeach
                    </select>
                    @error('blood_type_father_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputZip">{{trans('Religion')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="religion_father_id">
                        <option value="" selected>{{trans('Choose from the list')}}...</option>
                        @foreach($religions as $religion)
                        <option value="{{$religion->id}}">{{$religion->name}}</option>
                        @endforeach
                    </select>
                    @error('religion_father_id')
                    <div class="alert alert-danger">{{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{trans('Father address')}}</label>
                <textarea class="form-control" name="address_father" id="exampleFormControlTextarea1" rows="4"></textarea>
                @error('address_father')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
</form>


<!-- //////////////////////////////////////////////////////////////////// -->

<h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Mother information')}}</h6><br>
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="form-row">
            <div class="col">
                <label for="title">{{trans('Mother name in Arabic')}}</label>
                <input type="text" name="name_mother" class="form-control">
                @error('name_mother')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{trans('Mother name in English')}}</label>
                <input type="text" name="name_mother_en" class="form-control">
                @error('name_mother_en')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{trans('Job title in Arabic')}}</label>
                <input type="text" name="job_mother" class="form-control">
                @error('job_mother')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{trans('Job title in English')}}</label>
                <input type="text" name="job_mother_en" class="form-control">
                @error('job_mother_en')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{trans('ID Number')}}</label>
                <input type="text" name="national_id_mother" class="form-control">
                @error('national_id_mother')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{trans('Passport number')}}</label>
                <input type="text" name="passport_id_mother" class="form-control">
                @error('passport_id_mother')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{trans('phone number')}}</label>
                <input type="text" name="phone_mother" class="form-control">
                @error('phone_mother')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{trans('Nationality')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="nationality_mother_id">
                    <option value="" selected>{{trans('Choose from the list')}}...</option>
                    @foreach($nationalities as $nationality)
                    <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                    @endforeach
                </select>
                @error('nationality_mother_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">{{trans('Type_Blood')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="blood_Type_mother_id">
                    <option value="" selected>{{trans('Choose from the list')}}...</option>
                    @foreach($bloodTypes as $bloodTybe)
                    <option value="{{$bloodTybe->id}}">{{$bloodTybe->name}}</option>
                    @endforeach
                </select>
                @error('blood_Type_mother_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputZip">{{trans('Religion')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="religion_mother_id">
                    <option value="" selected>{{trans('Choose from the list')}}...</option>
                    @foreach($religions as $religion)
                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                    @endforeach
                </select>
                @error('religion_mother_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{trans('Mother address')}}</label>
            <textarea class="form-control" name="address_mother" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('address_mother')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Attachments')}}</h6><br>
<div class="col-xs-12">
    <div class="col-md-12"><br>
        <!-- <label style="color: red">{{trans('Attachments')}}</label> -->
        <div class="form-group">
            <input type="file" name="photos" accept="image/*" multiple>
        </div>
        <br>
        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Save_Data')}}</button>
        <br>
        <br>
    </div>
</div>

<!-- row closed -->

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection0