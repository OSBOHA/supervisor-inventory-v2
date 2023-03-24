@extends('layouts.app')

@section('page_title')
<div class="row" style="direction: rtl">
    <div class="col-12 col-md-6 order-md-1 order-first" style="direction: rtl">
        <!-- <h3>الجرد الأسبوعي</h3> -->
    </div>
</div>
@endsection

@section('content')
@if (session('message'))
    <div class="alert alert-{{ session('status') }}">
        {{ session('message') }}
    </div>
@endif 
<!-- START TITLE-->
<div class="col-12">
    <div class="card">
        <div class="card-header" style="background:#dce7f1;">
            @if($type_page == "add")
            <h4 class="card-title"> إضافة قائد جديد </h4>
            @endif
            <!-- show if leader -->
            @if($type_page == "update")
            <h4 class="card-title"> تعديل بيانات القائد </h4>
            @endif
        </div>
    </div>
</div>
<!-- END TITLE -->
<section id="multiple-column-form">
    <div class="row match-height">
        <!-- START ADD NEW LEADER -->
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background:#dce7f1;">
                    <h4 class="card-title"> معلومات القائد</h4>
                </div>

                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('manipulatLeader.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-light-danger color-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if($type_page == "update")
                            <div class="form-group">
                                <input class="form-check-input" type="hidden" name="leader_id" id="leader_id" value="{{$leader->id}}">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">اسم القائد</label>
                                    <input type="text" name='name' class="form-control" id="leaderName" rows="3" value="{{$leader->name}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="team" class="form-label">فريق المتابعة</label>
                                    <input type="text" name='team' class="form-control" id="leaderTeam" rows="3" value="{{$leader->team}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="type" class="form-label">نوع القائد</label>
                                    <select name='type' class="form-control form-select" id="leaderType">
                                        <option value="permanent">دائم</option>
                                        <option value="support">دعم </option>
                                        <option value="withdrawn">منسحب </option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary"  name="update" value="update">تعديل</button>
                                <button type="submit" class="btn btn-danger" name="delete" value="delete">حذف</button>
                               
                               </div>
                                @endif
                                @if($type_page == "add")
                                <div class="form-group">
                                    <input class="form-check-input" type="hidden" name="leader_id" id="leader_id">

                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">اسم القائد</label>
                                        <input type="text" name='name' class="form-control" id="leaderName" rows="3">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="team" class="form-label">فريق المتابعة</label>
                                        <input type="text" name='team' class="form-control" id="leaderTeam" rows="3">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="type" class="form-label">نوع القائد</label>
                                        <select name='type' class="form-control form-select" id="leaderType">
                                            <option value="permanent">دائم</option>
                                            <option value="support">دعم </option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary"  name="add">اضافة</button>                                  </div>
                                @endif
                                    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ADD NEW LEADER -->
    </div>
</section>

@endsection