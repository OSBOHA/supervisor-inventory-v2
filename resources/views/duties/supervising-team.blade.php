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
                        <div class="input-group mb-3 ">
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>المراقبون في فريقي</option>
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
<!-- END SELECT SUPERVISOR -->


<section id="multiple-column-form">
    <div class="row match-height">
        <!-- START TEAM iNFO -->
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background:#dce7f1;">
                    <h4 class="card-title"> معدل الفريق وعدد القادة</h4>
                </div>

                <div class="card-content">
                    <div class="card-body">
                        <form class="form">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <h6> عدد القادة</h6>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder=" عدد القادة" id="password-id-icon">
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


        <!-- START WEEKLY POSTS -->
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background:#dce7f1;">
                    <h4 class="card-title"> المنشورات الأسبوعية</h4>
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
                                                تاغ للقادة
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
                                                تعليق منفصل لكل قائد
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- END FOLLOW UP POST -->

                                <!-- START EVALUATION PROBLEMS POST -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>منشور مشاكل التقييم</h5>
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
                                                نشره عند فتح الموقع
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                تاغ للقادة
                                            </label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                تعليق مهمة الخميس
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                تعليق مهمة السبت
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                متابعة استفسارات القادة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- END EVALUATION PROBLEMS POST -->

                        </form>
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
                                <div>
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        تم المتابعة
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        تم المتابعة بعد 3 أيام
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        لم تتم المتابعة
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- END RETURNED MEMBERS POST -->
                        <!-- START NEW MEMBERS POST -->
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <h5>منشور عضو جديد</h5>
                                <div>
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        تم المتابعة
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        نقص في المتابعة
                                    </label>
                                </div>
                                <hr>
                                <div>
                                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        متابعة التواصل مع السفراء الجدد
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        منشن للقادة في الأسبوع الثالث
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- END NEW MEMBERS POST -->

                        <!-- START WITHDRAWN POST -->
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <h5>منشور المنسحبون</h5>
                                <div>
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        تم المتابعة
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        تم المتابعة وتنبيه غير المتفاعلين
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        لم تتم المتابعة
                                    </label>
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


    </div>
</section>

@endsection