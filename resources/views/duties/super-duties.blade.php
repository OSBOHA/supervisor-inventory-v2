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
<!-- END SELECT SUPERVISOR -->


<section id="multiple-column-form">
    <div class="row match-height">

        <!-- START SUPERVISOR DUTIES FORM -->
        <div class="col-12" id="super_duties_form" style="display: none;">
            <div class="card">
                <div class="card-header" style="background:#dce7f1;">
                    <h4 class="card-title"> مهام المراقبين</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="#" id="form" method="post">
                            @csrf
                            <div class="row">
                                <input class="form-check-input" type="hidden" name="supervisor_id" id="supervisor_id" value="0">
                                <!-- START SUPERVISOR DUTIES -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>المهام في مجموعة التوجيه</h5>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="supervisor_duties[]" id="checkbox1" value="thursday_task">
                                            <label class="form-check-label" for="checkbox1">
                                                تأكيد اتمام القادة مهمة الخميس
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="supervisor_duties[]" id="checkbox2" value="final_mark_confirm">
                                            <label class="form-check-label" for="checkbox2">
                                                تأكيد ادخال القادة للعلامات
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="supervisor_duties[]" id="checkbox3" value="final_mark_screenshot">
                                            <label class="form-check-label" for="checkbox3">
                                                وضع سكرين للعلامات
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SUPERVISOR DUTIES -->

                                <!-- START SUPERVISOR READING -->

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>قراءة المراقب</h5>
                                        <div class="" id="supervisor_reading">
                                            <div>
                                                <input class="form-check-input" type="radio" name="supervisor_reading" id="supervisor_reading_1" value="read">
                                                <label class="form-check-label" for="supervisor_reading_1">
                                                    قرأ
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="radio" name="supervisor_reading" id="supervisor_reading_2" value="not read">
                                                <label class="form-check-label" for="supervisor_reading_2">
                                                    لم يقرأ
                                                </label>
                                            </div>

                                            <div>
                                                <input class="form-check-input" type="radio" name="supervisor_reading" id="supervisor_reading_3" value="late">
                                                <label class="form-check-label" for="supervisor_reading_3">
                                                    قرأ ولم يصوت
                                                </label>
                                            </div>
                                            <div>
                                                <input class="form-check-input" type="radio" name="supervisor_reading" id="supervisor_reading_4" value="didnt vote">
                                                <label class="form-check-label" for="supervisor_reading_4">
                                                    تم التصويت بعد اغلاق الموقع
                                                </label>
                                            </div>
                                            <!-- START VALIDATION  -->
                                            <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="supervisor_reading_required">
                                                هذا الحقل مطلوب
                                            </div>
                                            <!-- END VALIDATION  -->

                                        </div>
                                        <hr />
                                        <div>
                                            <div class="form-group with-title mb-3">
                                                <input type="text" class="form-control" id="no_of_pages" name="no_of_pages">
                                                <label>عدد صفحات قراءة المراقب [اختياري]</label>
                                                <div class="alert alert-danger mt-2 p-2 opacity-50 validation-alert" role="alert" id="no_of_pages_number">
                                                    يجب أن تكون قيمة الحقل عددية
                                                </div>
                                                <!-- END VALIDATION  -->

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <!-- END SUPERVISOR READING -->
                                <div class="form-group col-12" style="margin-top:10px">
                                    <button type='submit' id="submit-btn" class="btn btn-primary w-100">حفظ</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SUPERVISOR DUTIES FORM -->

    </div>
    </div>
</section>
        <!-- START SUPERVISOR DUTIES IMAGE -->
        <div class="col-12" id="super_duties_image">
    <div class="card">
        <div class="card-content">
            <img src="https://picsum.photos/300" class="w-100">
        </div>
    </div>

</div>
<!-- END SUPERVISOR DUTIES IMAGE -->


<script src="{{asset('assets/js/validation/superviserDuties-formValidation.js')}}"></script>

@endsection