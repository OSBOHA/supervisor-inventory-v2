@extends('layouts.app')
<style>
    .validation-alert {
        display: none;
    }
</style>
@section('page_title')
<div class="row" style="direction: rtl">
    <div class="col-12 col-md-6 order-md-1 order-first" style="direction: rtl">
        <!-- <h3>الجرد الأسبوعي</h3> -->
    </div>
</div>
@endsection

@section('content')
<!-- START SELECT LEADER -->
<div class="col-12">
    <div class="card">
        <div class="card-header" style="background:#dce7f1;">
            <h4 class="card-title">القادة في فريقي </h4>
        </div>

        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h6>اختر القائد الذي تريد إدخال الجرد الإسبوعي له</h6>
                        <form action="#" id="select_form" autocomplete="off">

                            <div class="input-group mb-3 ">
                                <select class="form-select" id="inputGroupSelect01">
                                    <option selected>القادة في فريقي</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SELECT LEADER -->

<!-- Start SUPERVISOR DUTIES FORM -->

<section id="multiple-column-form">
    <div class="row match-height" id="followup_team_duties_form" style="display: none;">
        <form action="#" id="form" method="post">
            @csrf
            <input class="form-check-input" type="hidden" name="leader_id" id="leader_id" value="0">

            <!-- START TEAM iNFO -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background:#dce7f1;">
                        <h4 class="card-title"> معدل الفريق وعدد أعضاءه</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <h6> عدد السفراء</h6>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder=" عدد السفراء" id="team_members">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="team_members_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="team_members_number">
                                            يجب أن تكون قيمة الحقل عددية
                                        </div>
                                        <!-- END VALIDATION  -->

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <h6> معدل الفريق</h6>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder=" معدل الفريق" id="team_final_mark">
                                            <div class="form-control-icon">
                                                <i class="bi bi-bar-chart-fill"></i>
                                            </div>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="team_final_mark_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="team_final_mark_number">
                                            يجب أن تكون قيمة الحقل عددية
                                        </div>
                                        <!-- END VALIDATION  -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END TEAM iNFO -->

            <!-- START TEAM POSTS -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background:#dce7f1;">
                        <h4 class="card-title"> المنشورات الأساسية</h4>
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

                                            <!-- START VALIDATION  -->
                                            <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="follow_up_post_required">
                                                هذا الحقل مطلوب
                                            </div>
                                            <!-- END VALIDATION  -->

                                        </div>

                                        <hr />

                                        <h6> المعايير التي لم يتم </h6>
                                        <div class="" id="follow_up_post_incomplete">

                                            <div>
                                                <input class="form-check-input follow_up_post_standard" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_1" value="نشره الأحد في وقت مناسب">
                                                <label class="form-check-label" for="follow_up_post_incomplete_1">
                                                    نشره الأحد في وقت مناسب
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input follow_up_post_standard" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_2" value="تاغ للسفراء">
                                                <label class="form-check-label" for="follow_up_post_incomplete_2">
                                                    تاغ للسفراء
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input follow_up_post_standard" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_3" value="ذكر رقم الإسبوع والشهر">
                                                <label class="form-check-label" for="follow_up_post_incomplete_3">
                                                    ذكر رقم الإسبوع والشهر
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input follow_up_post_standard" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_4" value="عبارة تشجيعية">
                                                <label class="form-check-label" for="follow_up_post_incomplete_4">
                                                    عبارة تشجيعية
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input follow_up_post_standard" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_5" value="صورة مناسبة">
                                                <label class="form-check-label" for="follow_up_post_incomplete_5">
                                                    صورة مناسبة
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input follow_up_post_standard" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_6" value="سؤال واضح عن الإنجاز">
                                                <label class="form-check-label" for="follow_up_post_incomplete_6">
                                                    سؤال واضح عن الإنجاز
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input follow_up_post_standard" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_7" value="تعليق منفصل لكل سفير">
                                                <label class="form-check-label" for="follow_up_post_incomplete_7">
                                                    تعليق منفصل لكل سفير
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input follow_up_post_standard" type="checkbox" name="follow_up_post_incomplete[]" id="follow_up_post_incomplete_8" value="أسبوع مخفف">
                                                <label class="form-check-label" for="follow_up_post_incomplete_8">
                                                    أسبوع مخفف
                                                </label>
                                            </div>
                                            <!-- START VALIDATION  -->
                                            <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="follow_up_post_incomplete_required">
                                                حدد معيارًا واحدًا على الأقل
                                            </div>
                                            <!-- END VALIDATION  -->

                                        </div>
                                    </div>
                                </div>
                                <!-- END FOLLOW UP POST -->

                                <!-- START ABOUT OSBOHA POST -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>اعرف مشروعك</h5>
                                        <div>
                                            <input class="form-check-input" type="radio" name="about_asboha_post" id="about_asboha_post_1" value="published">
                                            <label class="form-check-label" for="about_asboha_post_1">
                                                نشر
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="about_asboha_post" id="about_asboha_post_2" value="didnt publish">
                                            <label class="form-check-label" for="about_asboha_post_2">
                                                لم ينشر
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="about_asboha_post" id="about_asboha_post_3" value="published instead">
                                            <label class="form-check-label" for="about_asboha_post_3">
                                                تم بالنيابة
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="about_asboha_post" id="about_asboha_post_4" value="incomplete">
                                            <label class="form-check-label" for="about_asboha_post_4">
                                                غير مستوفي المعايير
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="about_asboha_post_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <!-- END VALIDATION  -->

                                        <hr />

                                        <h6> المعايير التي لم يتم </h6>
                                        <div>
                                            <input class="form-check-input about_asboha_post_standard" type="checkbox" name="about_asboha_post_incomplete[]" id="about_asboha_post_incomplete_1" value="نشره الخميس في وقت مناسب">
                                            <label class="form-check-label" for="about_asboha_post_incomplete_1">
                                                نشره الخميس في وقت مناسب
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input about_asboha_post_standard" type="checkbox" name="about_asboha_post_incomplete[]" id="about_asboha_post_incomplete_2" value="تاغ للسفراء">
                                            <label class="form-check-label" for="about_asboha_post_incomplete_2">
                                                تاغ للسفراء
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input about_asboha_post_standard" type="checkbox" name="about_asboha_post_incomplete[]" id="about_asboha_post_incomplete_3" value="نقله بشكل أنيق">
                                            <label class="form-check-label" for="about_asboha_post_incomplete_3">
                                                نقله بشكل أنيق
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input about_asboha_post_standard" type="checkbox" name="about_asboha_post_incomplete[]" id="about_asboha_post_incomplete_4" value="اعادة المنشن يوم الجمعة">
                                            <label class="form-check-label" for="about_asboha_post_incomplete_4">
                                                اعادة المنشن يوم الجمعة
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="about_asboha_post_incomplete_required">
                                            حدد معيارًا واحدًا على الأقل
                                        </div>
                                        <!-- END VALIDATION  -->
                                    </div>
                                </div>
                                <!-- END ABOUT OSBOHA POST -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END TEAM POSTS -->

            <!-- START FREEZ AND ZEROS -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background:#dce7f1;">
                        <h4 class="card-title"> حالة السفراء</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">

                                <!-- START ZERO -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>عدد الحاصلين على صفر</h5>
                                        <div>
                                            <input class="form-check-input" type="radio" name="zero_mark" id="zero_mark_1" value="option1">
                                            <label class="form-check-label" for="zero_mark_1">
                                                يوجد
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="zero_mark" id="zero_mark_2" value="option1">
                                            <label class="form-check-label" for="zero_mark_2">
                                                لا يوجد
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="zero_mark_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <!-- END VALIDATION  -->


                                        <div class="col-12 mt-3">
                                            <div class="form-group has-icon-left">
                                                <h6> عدد الحاصلين على صفر</h6>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control zero_mark_NO" placeholder=" عدد الحاصلين على صفر" id="zero_mark_NO" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                <!-- START VALIDATION  -->
                                                <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="zero_mark_NO_required">
                                                    هذا الحقل مطلوب
                                                </div>
                                                <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="zero_mark_NO_number">
                                                    يجب أن تكون قيمة الحقل عددية
                                                </div>
                                                <!-- END VALIDATION  -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END ZERO -->
                                <!-- START FREZE -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5> عدد حالات التجميد</h5>

                                        <div>
                                            <input class="form-check-input" type="radio" name="frozen_ambassadors" id="frozen_ambassadors_1" value="1">
                                            <label class="form-check-label" for="frozen_ambassadors_1">
                                                يوجد
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="frozen_ambassadors" id="frozen_ambassadors_2" value="0">
                                            <label class="form-check-label" for="frozen_ambassadors_2">
                                                لا يوجد
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="frozen_ambassadors_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <!-- END VALIDATION  -->

                                        <div class="col-12 mt-3">
                                            <div class="form-group has-icon-left">
                                                <h6> عدد المجمدين</h6>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control frozen_ambassadors_NO" placeholder=" عدد المجمدين" id="frozen_ambassadors_NO" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                <!-- START VALIDATION  -->
                                                <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="frozen_ambassadors_NO_required">
                                                    هذا الحقل مطلوب في حال وجود التجميد
                                                </div>
                                                <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="frozen_ambassadors_NO_number">
                                                    يجب أن تكون قيمة الحقل عددية
                                                </div>
                                                <!-- END VALIDATION  -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END FREEZE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FREEZ AND ZEROS -->


            <!-- START THURSDAY AND FRIDAY -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background:#dce7f1;">
                        <h4 class="card-title"> مهمة الخميس والجمعة</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">

                                <!-- START THURSDAY -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>مهمة الخميس</h5>
                                        <div>
                                            <input class="form-check-input" type="radio" name="thursday_task" id="thursday_task_1" value="1">
                                            <label class="form-check-label" for="thursday_task_1">
                                                تمت
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="thursday_task" id="thursday_task_2" value="0">
                                            <label class="form-check-label" for="thursday_task_2">
                                                لم تتم
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="thursday_task_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <!-- END VALIDATION  -->
                                    </div>
                                </div>
                                <!-- END THURSDAY -->
                                <!-- START FRIDAY -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5> مهمة الجمعة</h5>
                                        <div>
                                            <input class="form-check-input" type="radio" name="friday_task" id="friday_task_1" value="`1`">
                                            <label class="form-check-label" for="friday_task_1">
                                                تمت
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="radio" name="friday_task" id="friday_task_2" value="0">
                                            <label class="form-check-label" for="friday_task_2">
                                                لم تتم
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="friday_task_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <!-- END VALIDATION  -->

                                    </div>
                                </div>
                                <!-- END FRIDAY -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END THURSDAY AND FRIDAY -->

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
                                            <!-- START VALIDATION  -->
                                            <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="discussion_post_required">
                                                هذا الحقل مطلوب
                                            </div>
                                            <!-- END VALIDATION  -->

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
                                            <!-- START VALIDATION  -->
                                            <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="leader_training_required">
                                                هذا الحقل مطلوب
                                            </div>
                                            <!-- END VALIDATION  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END NEWS -->

            <!-- START FINAL MARKS -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background:#dce7f1;">
                        <h4 class="card-title"> العلامات النهائية</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>نشر العلامات النهائية</h5>

                                        <div>
                                            <input class="form-check-input" type="radio" name="final_mark" id="final_mark_1" value="published">
                                            <label class="form-check-label" for="final_mark_1">
                                                تم
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="final_mark" id="final_mark_2" value="didnt publish">
                                            <label class="form-check-label" for="final_mark_2">
                                                لم يتم
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="final_mark" id="final_mark_3" value="published instead">
                                            <label class="form-check-label" for="final_mark_3">
                                                تم بالنيابة
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="final_mark_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <!-- END VALIDATION  -->

                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>تدقيق العلامات النهائية</h5>
                                        <div>
                                            <input class="form-check-input" type="radio" name="audit_final_mark" id="audit_final_mark_1" value="done">
                                            <label class="form-check-label" for="audit_final_mark_1">
                                                تم
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="audit_final_mark" id="audit_final_mark_2" value="not done">
                                            <label class="form-check-label" for="audit_final_mark_2">
                                                لم يتم
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="audit_final_mark" id="audit_final_mark_3" value="untargeted">
                                            <label class="form-check-label" for="audit_final_mark_3">
                                                لم يكن التدقيق لهذا القائد هذا الأسبوع
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="audit_final_mark_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <!-- END VALIDATION  -->

                                    </div>
                                    <hr>
                                    <div>
                                        <h6>سكرين للتواصل مع القائد</h6>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control radius" id="audit_leader_messaging_1" disabled>
                                        </div>

                                        <div class="custom-file mt-1">
                                            <input type="file" class="custom-file-input form-control radius" id="audit_leader_messaging_2" disabled>
                                        </div>

                                        <div class="custom-file mt-1">
                                            <input type="file" class="custom-file-input form-control radius" id="audit_leader_messaging_3" disabled>
                                        </div>

                                        <div class="mt-3">
                                            <h6>سكرين لرد القائد على رسالتك</h6>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control radius" id="audit_leader_replay" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FINAL MARKS -->


            <!-- START WITHDRAWN AND LEADER READING -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background:#dce7f1;">
                        <h4 class="card-title"> المنسحبين - قراءة القائد </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">

                                <!-- START WITHDRAWN -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>إدخال روابط المنسحبين</h5>
                                        <div>
                                            <input class="form-check-input" type="radio" name="withdrawn_ambassadors" id="withdrawn_ambassadors_1" value="done">
                                            <label class="form-check-label" for="withdrawn_ambassadors_1">
                                                تم الادخال
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="withdrawn_ambassadors" id="withdrawn_ambassadors_2" value="not done">
                                            <label class="form-check-label" for="withdrawn_ambassadors_2">
                                                لم يتم الادخال
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="withdrawn_ambassadors" id="withdrawn_ambassadors_3" value="no withdrawal">
                                            <label class="form-check-label" for="withdrawn_ambassadors_3">
                                                لا يوجد منسحبين
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="withdrawn_ambassadors_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <!-- END VALIDATION  -->

                                        <div class="col-12 mt-3">
                                            <div class="form-group has-icon-left">
                                                <h6> عدد المنسحبين</h6>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder=" عدد المنسحبين" id="withdrawn_ambassadors_No" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                <!-- START VALIDATION  -->
                                                <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="withdrawn_ambassadors_No_required">
                                                    هذا الحقل مطلوب في حال وجود منسحبين
                                                </div>
                                                <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="withdrawn_ambassadors_number">
                                                    يجب أن تكون قيمة الحقل عددية
                                                </div>
                                                <!-- END VALIDATION  -->

                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h6>سكرين للتواصل مع القائد الذي لم يدخل أعداد المنسحبين </h6>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control radius" id="withdrawn_ambassadors_message" disabled>
                                            </div>
                                            <!-- START VALIDATION  -->
                                            <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="withdrawn_ambassadors_message_required">
                                                هذا الحقل مطلوب في حال لم يدخل القائد روابط المنسحبين
                                            </div>
                                            <!-- END VALIDATION  -->

                                        </div>
                                    </div>
                                </div>
                                <!-- END WITHDRAWN -->
                                <!-- START LEADER READING -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5> قراءة القائد </h5>
                                        <div>
                                            <input class="form-check-input" type="radio" name="leader_reading" id="leader_reading_1" value="read">
                                            <label class="form-check-label" for="leader_reading_1">
                                                قرأ
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="leader_reading" id="leader_reading_2" value="not read">
                                            <label class="form-check-label" for="leader_reading_2">
                                                لم يقرأ
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="leader_reading" id="leader_reading_3" value="late">
                                            <label class="form-check-label" for="leader_reading_3">
                                                قرأ ولم يصوت
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="radio" name="leader_reading" id="leader_reading_4" value="didnt vote">
                                            <label class="form-check-label" for="leader_reading_4">
                                                تم التصويت بعد اغلاق الموقع
                                            </label>
                                        </div>
                                        <!-- START VALIDATION  -->
                                        <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="leader_reading_required">
                                            هذا الحقل مطلوب
                                        </div>
                                        <!-- END VALIDATION  -->

                                        <hr />
                                        <div>
                                            <div class="form-group with-title mb-3">
                                                <textarea class="form-control" id="about_leader" rows="3"></textarea>
                                                <label>ملاحظات حول القائد [اختياري]</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END LEADER READING -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END WITHDRAWN AND LEADER READING -->

            <div class="form-group col-12" style="margin-top:10px">
                <button type='submit' id="submit-btn" class="btn btn-primary w-100">حفظ</button>
            </div>

        </form>
    </div>
</section>
<!-- END SUPERVISOR DUTIES FORM -->


<!-- START SUPERVISOR DUTIES IMAGE -->
<div class="col-12" id="leaders_duties_image">
    <div class="card">
        <div class="card-content">
            <img src="https://picsum.photos/300" class="w-100">
        </div>
    </div>

</div>
<!-- END SUPERVISOR DUTIES IMAGE -->

<script src="{{asset('assets/js/validation/followupTeam-formValidation.js')}}"></script>


@endsection