@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">


@section('content')


<div class="col-12">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>عنوان رئيسي</h4>
                <p>عنوان فرعي</p>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    @foreach($leaders as $leader)
                    <div class="col-md-3">
                        <div class="card" style="border-radius: 15px; background-color:#f4f4f4">
                            <div class="card-body text-center">
                                <div class="mt-3 mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" class="rounded-circle img-fluid" style="width: 100px;" />
                                </div>
                                <h4 class="mb-2">{{$leader->name}}</h4>
                                <p class="text-muted mb-4">عدد السفراء<span class="mx-2">|</span> <a href="#!">فريق المتابعة</a></p>
                       
                                <a class="btn btn-primary btn-rounded btn-lg"href="{{route('manipulatLeader',['listAll','update',$leader->id])}}">
                                    تعديل
                                 </a>

                                 <a class="btn btn-primary btn-rounded btn-lg"href="{{route('transferLeader',['listAll',$leader->id])}}">
                                    نقل
                                 </a>

                                <div class="d-flex justify-content-between text-center mt-5 mb-2">
                                    <div>
                                        <p class="mb-2 h5">0</p>
                                        <p class="text-muted mb-0">تجميد</p>
                                    </div>
                                    <div class="px-3">
                                        <p class="mb-2 h5">0</p>
                                        <p class="text-muted mb-0">صفر</p>
                                    </div>
                                    <div>
                                        <p class="mb-2 h5">0</p>
                                        <p class="text-muted mb-0">انسحاب</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>

    @endsection