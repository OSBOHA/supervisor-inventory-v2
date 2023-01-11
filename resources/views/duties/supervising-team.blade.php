@extends('layouts.app')

@section('page_title')
<div class="row" style="direction: rtl">
    <div class="col-12 col-md-6 order-md-1 order-first" style="direction: rtl">
        <!-- <h3>الجرد الأسبوعي</h3> -->
    </div>
</div>
@endsection

@section('content')
<!-- START SELECT SUPERVISOR -->
<div class="col-12">
    <div class="card">
        <div class="card-header" style="background:#dce7f1;">
            <h4 class="card-title">المراقبون في فريقي </h4>
        </div>

        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h6>اختر المراقب الذي تريد إدخال الجرد له</h6>
                        <form action="#" id="select_form" autocomplete="off">
                            <div class="input-group mb-3 ">
                                <select class="form-select" id="select_supervisor">
                                    <option selected>المراقبون في فريقي</option>
                                    @foreach ($supervisors as $supervisor)
                                        <option value="{{$supervisor->id}}">{{$supervisor->user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SELECT SUPERVISOR -->

        <!-- Start SUPERVISOR DUTIES FORM -->

<section id="multiple-column-form">
    <div class="row match-height" id="supervisor_duties_form" style="display: none;">
        <form action="{{route('supervisingTeam.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
            <input class="form-check-input" type="hidden" name="supervisor_id" id="supervisor_id" value="{{$supervisor->id}}">
            <!-- START TEAM iNFO -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background:#dce7f1;">
                        <h4 class="card-title"> معدل الفريق وعدد القادة</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <h6> عدد القادة</h6>
                                        <div class="position-relative">
                                            <input type="tesxt" class="form-control" placeholder=" عدد القادة" id="leader_members" name="leader_members">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <h6> معدل الفريق</h6>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder=" معدل الفريق" id="team_final_mark" name="team_final_mark">
                                            <div class="form-control-icon">
                                                <i class="bi bi-bar-chart-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END TEAM iNFO -->


            <!-- START WEEKLY POSTS -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background:#dce7f1;">
                        <h4 class="card-title"> المنشورات الأسبوعية</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <!-- START FOLLOW UP POST -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>منشور المتابعة</h5>
                                        <div class="" id="follow_up_post">
                                            <div>
                                                <input class="form-check-input" type="radio" name="follow_up_post" id="follow_up_post_1" value="published">
                                                <label class="form-check-label" for="follow_up_post_1">
                                                    نشر
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="radio" name="follow_up_post" id="follow_up_post_2" value="didnt publish">
                                                <label class="form-check-label" for="follow_up_post_2">
                                                    لم ينشر
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="radio" name="follow_up_post" id="follow_up_post_3" value="published instead">
                                                <label class="form-check-label" for="follow_up_post_3">
                                                    تم بالنيابة
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="radio" name="follow_up_post" id="follow_up_post_4" value="incomplete">
                                                <label class="form-check-label" for="follow_up_post_4">
                                                    غير مستوفي المعايير
                                                </label>
                                            </div>
                                        </div>

                                        <hr />

                                        <h6> المعايير التي لم يتم </h6>
                                        <div class="" id="follow_up_post_incomplete">

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_1" value="نشره الأحد في وقت مناسب">
                                                <label class="form-check-label" for="follow_up_post_incomplete_1">
                                                    نشره الأحد في وقت مناسب
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_2" value="تاغ للقادة">
                                                <label class="form-check-label" for="follow_up_post_incomplete_2">
                                                    تاغ للقادة
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_3" value="ذكر رقم الإسبوع والشهر">
                                                <label class="form-check-label" for="follow_up_post_incomplete_3">
                                                    ذكر رقم الإسبوع والشهر
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_4" value="عبارة تشجيعية">
                                                <label class="form-check-label" for="follow_up_post_incomplete_4">
                                                    عبارة تشجيعية
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_5" value="صورة مناسبة">
                                                <label class="form-check-label" for="follow_up_post_incomplete_5">
                                                    صورة مناسبة
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_6" value="سؤال واضح عن الإنجاز">
                                                <label class="form-check-label" for="follow_up_post_incomplete_6">
                                                    سؤال واضح عن الإنجاز
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_7" value="تعليق منفصل لكل قائد">
                                                <label class="form-check-label" for="follow_up_post_incomplete_7">
                                                    تعليق منفصل لكل قائد
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END FOLLOW UP POST -->

                                <!-- START EVALUATION PROBLEMS POST -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>منشور مشاكل التقييم</h5>
                                        <div class="" id="mark_problems_post">

                                            <div>
                                                <input class="form-check-input" type="radio" name="mark_problems_post" id="mark_problems_post_1" value="published">
                                                <label class="form-check-label" for="mark_problems_post_1">
                                                    نشر
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="radio" name="mark_problems_post" id="mark_problems_post_2" value="didnt publish">
                                                <label class="form-check-label" for="mark_problems_post_2">
                                                    لم ينشر
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="radio" name="mark_problems_post" id="mark_problems_post_3" value="published instead">
                                                <label class="form-check-label" for="mark_problems_post_3">
                                                    تم بالنيابة
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="radio" name="mark_problems_post" id="mark_problems_post_4" value="incomplete">
                                                <label class="form-check-label" for="mark_problems_post_4">
                                                    غير مستوفي المعايير
                                                </label>
                                            </div>
                                        </div>
                                        <hr />

                                        <h6> المعايير التي لم يتم </h6>
                                        <div class="" id="mark_problems_post_incomplete">

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="mark_problems_post_incomplete[]" id="mark_problems_post_incomplete_1" value="نشره عند فتح الموقع">
                                                <label class="form-check-label" for="mark_problems_post_incomplete_1">
                                                    نشره عند فتح الموقع
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="mark_problems_post_incomplete[]" id="mark_problems_post_incomplete_2" value="تاغ للقادة">
                                                <label class="form-check-label" for="mark_problems_post_incomplete_2">
                                                    تاغ للقادة
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="checkbox" name="mark_problems_post_incomplete[]" id="mark_problems_post_incomplete_3" value="تعليق مهمة الخميس">
                                                <label class="form-check-label" for="mark_problems_post_incomplete_3">
                                                    تعليق مهمة الخميس
                                                </label>
                                            </div>
                                            <div>
                                                <input class="form-check-input" type="checkbox" name="mark_problems_post_incomplete[]" id="mark_problems_post_incomplete_4" value="تعليق مهمة السبت">
                                                <label class="form-check-label" for="mark_problems_post_incomplete_4">
                                                    تعليق مهمة السبت
                                                </label>
                                            </div>
                                            <div>
                                                <input class="form-check-input" type="checkbox" name="mark_problems_post_incomplete[]" id="mark_problems_post_incomplete_5" value="متابعة استفسارات القادة">
                                                <label class="form-check-label" for="mark_problems_post_incomplete_5">
                                                    متابعة استفسارات القادة
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END EVALUATION PROBLEMS POST -->


    </div>
    </div>
    </div>
    </div>
    <!-- END WEEKLY POSTS -->

    </div>



    <!-- START WEEKLY POSTS -->
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="background:#dce7f1;">
                <h4 class="card-title"> المنشورات الشهرية</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">

                        <!-- START RETURNED MEMBERS POST -->
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <h5>منشور العائدون</h5>
                                <div class="" id="returning_ambassadors_post">
                                    <div>
                                        <input class="form-check-input" type="radio" name="returning_ambassadors_post" id="returning_ambassadors_post_1" value="تم المتابعة">
                                        <label class="form-check-label" for="returning_ambassadors_post_1">
                                            تم المتابعة
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="returning_ambassadors_post" id="returning_ambassadors_post_2" value="تم المتابعة بعد 3 أيام">
                                        <label class="form-check-label" for="returning_ambassadors_post_2">
                                            تم المتابعة بعد 3 أيام
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="returning_ambassadors_post" id="returning_ambassadors_post_3" value="لم تتم المتابعة">
                                        <label class="form-check-label" for="returning_ambassadors_post_3">
                                            لم تتم المتابعة
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END RETURNED MEMBERS POST -->
                        <!-- START NEW MEMBERS POST -->
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <h5>منشور عضو جديد</h5>
                                <div class="" id="new_ambassadors_post">
                                    <div>
                                        <input class="form-check-input" type="radio" name="new_ambassadors_post" id="new_ambassadors_post_1" value="تم المتابعة">
                                        <label class="form-check-label" for="new_ambassadors_post_1">
                                            تم المتابعة
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="new_ambassadors_post" id="new_ambassadors_post_2" value="نقص في المتابعة">
                                        <label class="form-check-label" for="new_ambassadors_post_2">
                                            نقص في المتابعة
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="" id="new_ambassadors_post_incomplete">
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="new_ambassadors_post_incomplete[]" id="new_ambassadors_post_incomplete_1" value="متابعة التواصل مع السفراء الجدد">
                                        <label class="form-check-label" for="new_ambassadors_post_incomplet_1">
                                            متابعة التواصل مع السفراء الجدد
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="new_ambassadors_post_incomplete[]" id="new_ambassadors_post_incomplete_2" value="منشن للقادة في الأسبوع الثالث">
                                        <label class="form-check-label" for="new_ambassadors_post_incomplete_2">
                                            منشن للقادة في الأسبوع الثالث
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END NEW MEMBERS POST -->

                        <!-- START WITHDRAWN POST -->
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <h5>منشور المنسحبون</h5>
                                <div class="" id="new_ambassadors_post">

                                    <div>
                                        <input class="form-check-input" type="radio" name="withdrawn_ambassadors_post" id="withdrawn_ambassadors_post_1" value="تم المتابعة">
                                        <label class="form-check-label" for="withdrawn_ambassadors_post_1">
                                            تم المتابعة
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="withdrawn_ambassadors_post" id="withdrawn_ambassadors_post_2" value="تم المتابعة وتنبيه غير المتفاعلين">
                                        <label class="form-check-label" for="withdrawn_ambassadors_post_2">
                                            تم المتابعة وتنبيه غير المتفاعلين
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="withdrawn_ambassadors_post" id="withdrawn_ambassadors_post_3" value="لم تتم المتابعة">
                                        <label class="form-check-label" for="withdrawn_ambassadors_post_3">
                                            لم تتم المتابعة
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END WITHDRAWN POST -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MONTHLY POSTS -->

    </div>

    <!-- START NEWS -->
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="background:#dce7f1;">
                <h4 class="card-title"> إيصال الأخبار</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <h5>النقاش المنهجي</h5>
                                    <div class="" id="discussion_post">

                                        <div>
                                            <input class="form-check-input" type="radio" name="discussion_post" id="discussion_post_1" value="published">
                                            <label class="form-check-label" for="discussion_post_1">
                                                تم
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="discussion_post" id="discussion_post_2" value="didnt publish">
                                            <label class="form-check-label" for="discussion_post_2">
                                                لم يتم
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="discussion_post" id="discussion_post_3" value="incomplete">
                                            <label class="form-check-label" for="discussion_post_3">
                                                غير مستوف المعايير
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="discussion_post" id="discussion_post_4" value="none">
                                            <label class="form-check-label" for="discussion_post_4">
                                                لا يوجد لهذا الأسبوع
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <h5>دورة القيادة</h5>
                                    <div class="" id="leader_training">

                                        <div>
                                            <input class="form-check-input" type="radio" name="leader_training" id="leader_training_1" value="published">
                                            <label class="form-check-label" for="leader_training_1">
                                                تم
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="leader_training" id="leader_training_2" value="didnt publish">
                                            <label class="form-check-label" for="leader_training_2">
                                                لم يتم
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="leader_training" id="leader_training_3" value="incomplete">
                                            <label class="form-check-label" for="leader_training_3">
                                                غير مستوف المعايير
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="leader_training" id="leader_training_4" value="none">
                                            <label class="form-check-label" for="leader_training_4">
                                                لا يوجد لهذا الأسبوع
                                            </label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END NEWS -->
    <div class="form-group col-12" style="margin-top:10px">
        <button type='submit' id="submit-btn" class="btn btn-primary w-100">حفظ</button>
    </div>

    </form>

    </div>
</section>
        <!-- END SUPERVISOR DUTIES FORM -->

        <!-- START SUPERVISOR DUTIES IMAGE -->
        <div class="col-12" id="super_duties_image">
            <div class="card">
                <div class="card-content">
                    <img src="https://picsum.photos/300" class="w-100">
                </div>
            </div>

        </div>
        <!-- END SUPERVISOR DUTIES IMAGE -->



<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
<script>
    $("#select_form").change(function() {
        $("#supervisor_id").val($("#select_form").find(":selected").val());
        $("#supervisor_duties_form").show();
        $("#super_duties_image").hide();

    });
    const validation = new JustValidate('#form');
    validation
        .addRequiredGroup(
            '#supervisor_reading',
            'يجب تحديد قراءة المراقب'
        )
        .addField('#no_of_pages', [{
            rule: 'number',
            errorMessage: 'أدخل رقمًا',
        }, ])
        .onSuccess((event) => {
            console.log('Validation passes and form submitted', event);
        });;
</script>

@endsection