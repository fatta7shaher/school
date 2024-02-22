@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('List_Question')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('List_Question')}}
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
                            <a href="{{route('Question.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">اضافة سؤال جديد</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{trans('the_question')}}</th>
                                            <th scope="col">{{trans('the_answers')}}</th>
                                            <th scope="col">{{trans('The_correct_answer')}}</th>
                                            <th scope="col">{{trans('the_degree')}}</th>
                                            <th scope="col">{{trans('name_quizzes')}}</th>
                                            <th scope="col">{{trans('Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($questions as $question)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$question->title}}</td>
                                            <td>{{$question->answers}}</td>
                                            <td>{{$question->right_answer}}</td>
                                            <td>{{$question->score}}</td>
                                            <td>{{$question->quizze->name}}</td>
                                            <td>
                                                <a href="{{route('Question.edit.{id}',$question->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_exam{{ $question->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        @include('pages.Question.destroy')
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