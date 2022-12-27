@extends('layouts.app')

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
                        <div class="input-group mb-3 ">
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>القادة في فريقي</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SELECT LEADER -->


<section id="multiple-column-form">
    <div class="row match-height">
        <!-- START TEAM iNFO -->
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background:#dce7f1;">
                    <h4 class="card-title"> معدل الفريق وعدد أعضاءه</h4>
                </div>

                <div class="card-content">
                    <div class="card-body">
                        <form class="form">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <h6> عدد السفراء</h6>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder=" عدد السفراء" id="password-id-icon">
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
                                            <input type="password" class="form-control" placeholder=" معدل الفريق" id="password-id-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-bar-chart-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

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
                        <form class="form">
                            <div class="row">
                                <!-- START FOLLOW UP POST -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>منشور المتابعة</h5>

                                        <div>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                نشر
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                لم ينشر
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                تم بالنيابة
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                غير مستوفي المعايير
                                            </label>
                                        </div>


                                        <hr />

                                        <h6> المعايير التي لم يتم </h6>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                نشره الأحد في وقت مناسب
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                تاغ للسفراء
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                ذكر رقم الإسبوع والشهر
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                عبارة تشجيعية
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                صورة مناسبة
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                سؤال واضح عن الإنجاز
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                تعليق منفصل لكل سفير
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                أسبوع مخفف
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <!-- END FOLLOW UP POST -->

                                <!-- START ABOUT OSBOHA POST -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>اعرف مشروعك</h5>
                                        <div>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                نشر
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                لم ينشر
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                تم بالنيابة
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                غير مستوفي المعايير
                                            </label>
                                        </div>


                                        <hr />

                                        <h6> المعايير التي لم يتم </h6>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                نشره الخميس في وقت مناسب
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                تاغ للسفراء
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                نقله بشكل أنيق
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                اعادة المنشن يوم الجمعة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- END ABOUT OSBOHA POST -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TEAM POSTS -->

    </div>

    <!-- START ZERO -->
    <div class="col-sm-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header" style="background:#dce7f1;">
                <h4 class="card-title">عدد الحاصلين على صفر</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    يوجد
                                </label>
                            </div>

                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    لا يوجد
                                </label>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group has-icon-left">
                                    <h6> عدد الحاصلين على صفر</h6>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder=" عدد الحاصلين على صفر" id="password-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ZERO -->


    <!-- START FREZE -->
    <div class="col-sm-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header" style="background:#dce7f1;">
                <h4 class="card-title"> عدد حالات التجميد</h4>
                <p id="withdrawn_ambassadors_msg" style="color: red"></p>
                <p id="withdrawn_number_required_msg" style="color: red"></p>
                <p id="withdrawn_number_msg" style="color: red"></p>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    يوجد
                                </label>
                            </div>

                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    لا يوجد
                                </label>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group has-icon-left">
                                    <h6> عدد المجمدين</h6>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder=" عدد المجمدين" id="password-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END FREEZE -->


    <!-- START THURSDAY -->
    <div class="col-sm-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header" style="background:#dce7f1;">
                <h4 class="card-title"> مهمة الخميس</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    تمت
                                </label>
                            </div>

                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    لم تتم
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END THURSDAY -->


    <!-- START FRIDAY -->
    <div class="col-sm-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header" style="background:#dce7f1;">
                <h4 class="card-title"> مهمة الجمعة</h4>
                <p id="withdrawn_ambassadors_msg" style="color: red"></p>
                <p id="withdrawn_number_required_msg" style="color: red"></p>
                <p id="withdrawn_number_msg" style="color: red"></p>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    تمت
                                </label>
                            </div>

                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    لم تتم
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END FRIDAY -->

    <!-- START NEWS -->
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="background:#dce7f1;">
                <h4 class="card-title"> إيصال الأخبار</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <h5>النقاش المنهجي</h5>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            تم
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            لم يتم
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            غير مستوف المعايير
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            لا يوجد لهذا الأسبوع
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <h5>دورة القيادة</h5>
                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            تم
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            لم يتم
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            غير مستوف المعايير
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            لا يوجد لهذا الأسبوع
                                        </label>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>

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
                    <form class="form">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <h5>نشر العلامات النهائية</h5>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            تم
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            لم يتم
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            تم بالنيابة
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <h5>تدقيق العلامات النهائية</h5>
                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            تم
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            لم يتم
                                        </label>
                                    </div>

                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            لم يكن التدقيق لهذا القائد هذا الأسبوع
                                        </label>
                                    </div>
                                    <hr>
                                    <div>
                                        <h6>سكرين للتواصل مع القائد</h6>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control radius" id="inputGroupFile01">
                                        </div>

                                        <div class="custom-file mt-1">
                                            <input type="file" class="custom-file-input form-control radius" id="inputGroupFile01">
                                        </div>

                                        <div class="custom-file mt-1">
                                            <input type="file" class="custom-file-input form-control radius" id="inputGroupFile01">
                                        </div>

                                        <div class="mt-3">
                                            <h6>سكرين لرد القائد على رسالتك</h6>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control radius" id="inputGroupFile01">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END FINAL MARKS -->




    <!-- START WITHDRAWN -->
    <div class="col-sm-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header" style="background:#dce7f1;">
                <h4 class="card-title">إدخال روابط المنسحبين</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    تم الادخال
                                </label>
                            </div>

                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    لم يتم الادخال
                                </label>
                            </div>

                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    لا يوجد منسحبين
                                </label>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group has-icon-left">
                                    <h6> عدد المنسحبين</h6>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder=" عدد المنسحبين" id="password-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                        <h6>سكرين للتواصل مع القائد الذي لم يدخل أعداد المنسحبين </h6>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control radius" id="inputGroupFile01">
                                        </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WITHDRAWN -->
    <!-- START LEADER READING -->
    <div class="col-sm-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header" style="background:#dce7f1;">
                <h4 class="card-title">قراءة القائد</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form">
                        <div class="form-group">
                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    قرأ
                                </label>
                            </div>

                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    لم يقرأ
                                </label>
                            </div>

                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    قرأ ولم يصوت
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    تم التصويت بعد اغلاق الموقع
                                </label>
                            </div>
                        
                        <hr/>
                        <div>
                        <div class="form-group with-title mb-3">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <label>ملاحظات حول القائد [اختياري]</label>
                        </div>
                            </div>
                        
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END LEADER READING -->


    </div>
</section>

@endsection