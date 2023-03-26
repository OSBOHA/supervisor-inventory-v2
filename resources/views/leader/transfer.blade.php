@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">


@section('content')
@if (session('message'))
    <div class="alert alert-{{ session('status') }}">
        {{ session('message') }}
    </div>
@endif 

<div class="col-12">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>نقل قائد </h4>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    
                    <div class="col-md-3">
                        <div class="card" style="border-radius: 15px; background-color:#f4f4f4">
                            <form action="{{route('transferLeader.store')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="card-body text-center">
                                <div class="mt-3 mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" class="rounded-circle img-fluid" style="width: 100px;" />
                                </div>
                                <input class="form-check-input" type="hidden" name="leader_id" id="leader_id" value="{{$leader->id}}">


                                <h4 class="mb-2"> {{$leader->name}}</h4>
                                <p class="text-muted mb-4"> {{$leader->type}} <span class="mx-2">|</span> 
                                    <!-- if leader have a Supervisor!-->
                                    <a href="#!"> {{$leader->supervisor->user->name ??'لايوجد مشرف'}} </a></p>

                                <label for="type" class="form-label">المراقبون</label>
                                    <select name="supervisor_id" class="form-control form-select">
                                        @foreach($supervisors as $supervisor)
                                        <option value="{{$supervisor->id}}">{{$supervisor->user->name}}</option>
                                        @endforeach
                                    </select>
                                     <button type="submit" class="btn btn-primary">نقل</button>
                                
                            </div>
                        </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

    @endsection