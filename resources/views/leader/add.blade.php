@extends('layouts.app')

@section('page_title')
<div class="row" style="direction: rtl">
    <div class="col-12 col-md-6 order-md-1 order-first" style="direction: rtl">
        <!-- <h3>الجرد الأسبوعي</h3> -->
    </div>
</div>
@endsection

@section('content')
<!-- START TITLE-->
<div class="col-12">
    <div class="card">
        <div class="card-header" style="background:#dce7f1;">
            <h4 class="card-title"> إضافة قائد جديد </h4>
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
                    <form class="form" method="post">
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

                    <div class="form-group">
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
                            <select name='type' class="form-control form-select" id="leaderType" >
                            <option value="دائم">دائم</option>
                            <option value="دعم">دعم </option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">اضافة</button>
                        </div>
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