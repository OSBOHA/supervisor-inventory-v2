@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .validation-alert {
        display: none;
    }

    /*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/

    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        width: 5px;
        background: #f5f5f5;
    }

    ::-webkit-scrollbar-thumb {
        width: 1em;
        background-color: #ddd;
        outline: 1px solid slategrey;
        border-radius: 1rem;
    }

    .text-small {
        font-size: 0.9rem;
    }

    .messages-box,
    .chat-box {
        height: 510px;
        overflow-y: scroll;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    input::placeholder {
        font-size: 0.9rem;
        color: #999;
    }
.bg-b{
   background-color:  #f2f7ff
}




</style>
@section('pageHeading')
عرض
@endsection

@section('content')

<!-- Start SUPERVISOR DUTIES LIST -->

<section id="multiple-column-form">
    <div class="row match-height" id="supervisor_duties_form">

        <!-- START TEAM iNFO -->
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background:#dce7f1;">
                    <h4 class="card-title"> معدل الفريق وعدد القادة</h4>
                </div>

                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-12"><canvas class="w-100" id="finalMark-leaders"></canvas></div>
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
                    <!--
                        <div class="row">
                            <div class="col-12 text-center">
                                <label>
                                    <span style="background-color: rgb(75, 192, 192); color:rgb(75, 192, 192); ">-------</span>
                                    نشر
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                    <span style="background-color: rgb(255, 99, 132); color:rgb(255, 99, 132); ">-------</span>
                                    لم ينشر
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                    <span style="background-color: rgb(255, 159, 64); color:rgb(255, 159, 64); ">-------</span>
                                    تم بالنيابة
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                    <span style="background-color: rgb(255, 205, 86); color:rgb(255, 205, 86); ">-------</span>
                                    نقص في المعايير
                                </label>
                            </div>
                        </div>
                    -->
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="col-12"><canvas class="w-100" id="weekly-posts-1"></canvas></div>
                                <div class="col-12 text-center mt-2">
                                    <h6>منشور المتابعة</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12"><canvas class="w-100" id="weekly-posts-2"></canvas></div>
                                <div class="col-12 text-center mt-2">
                                <h6>منشور مشاكل التقيم</h6>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- END WEEKLY POSTS -->

        <!-- START MONTHLY POSTS -->
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background:#dce7f1;">
                    <h4 class="card-title"> المنشورات الشهرية</h4>
                </div>

                <div class="card-content">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="col-12"><canvas class="w-100" id="weekly-posts-1"></canvas></div>
                                <div class="col-12 text-center mt-2">
                                    <h6>منشور العائدون</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-12"><canvas class="w-100" id="weekly-posts-2"></canvas></div>
                                <div class="col-12 text-center mt-2">
                                <h6>منشور عضو جديد</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-12"><canvas class="w-100" id="weekly-posts-2"></canvas></div>
                                <div class="col-12 text-center mt-2">
                                <h6>منشو المنسحبون</h6>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- END MONTHLY POSTS -->

        <!-- START NOTES -->
        <div class="col-12">
            <div class="container py-5 px-4">

            </div>
            <div class="card">
                <div class="card-header" style="background:#dce7f1;">
                    <h4 class="card-title"> ملاحظات حول الجرد </h4>
                </div>

                <div class="card-content">
                    <div class="card-body">

                    <div class="row rounded-lg overflow-hidden shadow">
                    <!-- Chat Box-->
                    <div class="col-12 px-0">
                        <div class="px-4 py-5 chat-box bg-white">

                            <!-- Sender Message-->
                            <div class="media w-auto mb-3" dir='ltr'>
                                <img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                <div class="media-body ml-3">
                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                        <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                                    </div>
                                    <p class="small text-muted">12:00 PM | Aug 13</p>
                                </div>
                            </div>

                            <!-- Reciever Message-->
                            <div class="media w-auto ml-auto mb-3">
                                <div class="media-body">
                                    <div class="bg-b rounded py-2 px-3 mb-2">
                                        <p class="text-small mb-0 text-muted">Apollo University, Delhi, India Test</p>
                                    </div>
                                    <p class="small text-muted">12:00 PM | Aug 13</p>
                                </div>
                            </div>
                            <!-- Sender Message-->
                            <div class="media w-auto mb-3" dir='ltr'>
                                <img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                <div class="media-body ml-3">
                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                        <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                                    </div>
                                    <p class="small text-muted">12:00 PM | Aug 13</p>
                                </div>
                            </div>

                            <!-- Reciever Message-->
                            <div class="media w-auto ml-auto mb-3">
                                <div class="media-body">
                                    <div class="bg-b rounded py-2 px-3 mb-2">
                                        <p class="text-small mb-0 text-muted">Apollo University, Delhi, India Test</p>
                                    </div>
                                    <p class="small text-muted">12:00 PM | Aug 13</p>
                                </div>
                            </div>

                        </div>

                        <!-- Typing area -->
                        <form action="#" class="bg-light">
                            <div class="input-group">
                                <input type="text" placeholder="اكتب ملاحظة" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                <div class="input-group-append">
                                    <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- END SUPERVISOR DUTIES LIST -->

<script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/pages/ui-chartjs.js')}}"></script>
<script type="text/javascript">
    var cData = JSON.parse(`<?php echo $data; ?>`);

</script>
<script src="{{asset('assets/js/displayCharts/supervising-team.js')}}">
    
</script>


@endsection