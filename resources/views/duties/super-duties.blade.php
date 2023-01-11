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
                    <form action="{{route('supervisorDuty.store')}}" method="POST" enctype="multipart/form-data" >
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
                                                <input class="form-check-input" type="radio" name="supervisor_reading" id="supervisor_reading_3" value="didnt vote">
                                                <label class="form-check-label" for="supervisor_reading_3">
                                                    قرأ ولم يصوت
                                                </label>
                                            </div>
                                            <div>
                                                <input class="form-check-input" type="radio" name="supervisor_reading" id="supervisor_reading_4" value="late">
                                                <label class="form-check-label" for="supervisor_reading_4">
                                                    تم التصويت بعد اغلاق الموقع
                                                </label>
                                            </div>
                                        </div>
                                        <hr />
                                        <div>
                                            <div class="form-group with-title mb-3">
                                                <input type="text" class="form-control" id="no_of_pages" name="no_of_pages">
                                                <label>عدد صفحات قراءة المراقب [اختياري]</label>
                                            </div>
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

        <!-- START SUPERVISOR DUTIES IMAGE -->
        <div class="col-12" id="super_duties_image">
            <div class="card">
                <div class="card-content">
                    <img src="https://picsum.photos/300" class="w-100">
                </div>
            </div>

        </div>
        <!-- END SUPERVISOR DUTIES IMAGE -->

    </div>
    </div>
</section>
<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
<script>
    $("#select_form").change(function() {
        $("#supervisor_id").val($("#select_form").find(":selected").val());
        $("#super_duties_form").show();
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