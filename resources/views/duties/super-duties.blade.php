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

        <!-- START SUPERVISOR DUTIES -->
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background:#dce7f1;">
                    <h4 class="card-title"> مهام المراقبين</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form">
                            <div class="row">
                                <!-- START SUPERVISOR DUTIES -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <h5>المهام في مجموعة التوجيه</h5>

                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                تأكيد اتمام القادة مهمة الخميس
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                تأكيد ادخال القادة للعلامات
                                            </label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
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

                                        <hr />
                                        <div>
                                            <div class="form-group with-title mb-3">
                                                <input type="text" class="form-control" id="exampleFormControlTextarea1">
                                                <label>عدد صفحات قراءة المراقب [اختياري]</label>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <!-- END SUPERVISOR READING -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SUPERVISOR DUTIES -->

    </div>




    </div>
</section>

@endsection