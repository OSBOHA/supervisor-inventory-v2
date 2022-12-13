<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory site</title>

    <link rel="stylesheet" href={{asset('create/css/main/app.css')}}>
    <link rel="stylesheet" href={{asset('create/css/main/app-dark.css')}}>
    <link rel="shortcut icon" href={{asset('create/images/logo/favicon.svg type=image/x-icon')}}>
    <link rel="shortcut icon" href={{asset('create/images/logo/favicon.png type=image/png')}}>
    <link rel="stylesheet" href={{asset('create/css/shared/iconly.css')}}>
    <style>
        li a {
    display: inline;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

    .logout {
        position: absolute;
        top: 30px;
        right: 30px;
        font-size: 25px;
        display: inline;
        color: white;
        padding:0;
        text-decoration: none;">
      }
     .osboha {
        position: absolute;
        top: 30px;
        right: 800px;
        font-size: 25px;
        display: inline;
        color: white;
        padding:0;
        text-decoration: none;">
      }
      .page-heading{
        position: absolute;
        top: 90px;
        right: 400px;
      }
      .btn.btn-light-primary {
    background-color: #ebf3ff;
    color: #002152
}
.addleader{
        position: absolute;
        top: 120px;
        right: 10px;
}
.leadername{
        position: absolute;
        top: 210px;
        right: 30px;
}
.save{
    position: absolute;
        top: 250px;
        right: 20px;

}
      .teamrate{
        position: absolute;
        top: 360px;
        right: 200px;
      }
      .teamrateinpute{
        position: absolute;
        top: 390;
        right: 175px;
      }
      .teamnum{
        position: absolute;
        top: 360;
        right: 50px;
      }
      .teamnuminput{
       position: absolute;
        top: 390px;
        right: 20px;
      }
      .zeronum{
        position: absolute;
        top: 360px;
        right: 320px;
      }
      .zeronuminpute{
        position: absolute;
        top: 390px;
        right: 325px;
      }
      .followuppost {
        position: absolute;
        top: 450px;
        right: 30px;
        border-radius: 25px;
        border: 1px solid #090909;
        padding: 20px;
      }
      .knowyourproject {
        position: absolute;
        top: 455px;
        right: 300px;

      }
      .linkwithdraw {
        position: absolute;
        top: 450px;
        right: 570px;
      }
        .thutask{
        position: absolute;
        top: 970px;
        right: 290px;

      }
      .fritask {
        position: absolute;
        top: 1280px;
        right: 290px;

      }
      .finalgrades{
       position: absolute;
        top: 1590px;
        right: 290px;
      }
      .checkfinal{
        position: absolute;
        top: 1160px;
        right: 570px;
      }

      .leaderinventory{
      position: absolute;
        top: 1450px;
        right: 30px;
      }
      .notes
      {
      position: absolute;
        top: 1870px;
        right: 20px;
      }
      .footer
      {
      position: absolute;
        top: 2200px;
        right: 360px;
      }
</style>
</head>



<body>
    <ul  style=
    "list-style-type: none;
      padding: 30px;
      background-color:#435ebe;">

   <a href="#OSBOHA 180" class="osboha"  style= " font-size:25px">OSBOHA 180</a></li>
   <li>
   <a href="#Logout" class="logout" ><b>Logout</b></a></li>
      </ul>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="index.html"><img src={{asset('create/images/logo/logo.svg alt=Logo')}}></a>
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path><g transform="translate(-210 -1)"><path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path><circle cx="220.5" cy="11.5" r="4"></circle><path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path></g></g></svg>
                <div class="form-check form-switch fs-6">
                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" >
                    <label class="form-check-label" ></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path></svg>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>

    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li
                class="sidebar-item active ">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li
class="sidebar-item  ">
<a href="form-layout.html" class='sidebar-link'>
    <i class="bi bi-file-earmark-medical-fill"></i>
    <span>بياناتك الشخصية</span>
</a>
</li>
            <li
            class="sidebar-item  ">
            <a href="form-layout.html" class='sidebar-link'>
                <i class="bi bi-file-earmark-medical-fill"></i>
                <span>الجرد الاسبوعي</span>
            </a>
            </li>
        <li
        class="sidebar-item  ">
        <a href="form-layout.html" class='sidebar-link'>
            <i class="bi bi-file-earmark-medical-fill"></i>
            <span>عرض نتيجة الجرد</span>
        </a>
        </li>
    <li
    class="sidebar-item  ">
    <a href="form-layout.html" class='sidebar-link'>
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>صندوق اعتراضاتك</span>
    </a>
    </li>
<li
class="sidebar-item  ">
<a href="form-layout.html" class='sidebar-link'>
    <i class="bi bi-file-earmark-medical-fill"></i>
    <span>ترتيبك الرقابي</span>
</a>
</li>
        </ul>
    </div>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

<div class="page-heading" class="col-12 col-md-6 order-md-1 order-first" style="direction: rtl">
    <h3>الجرد الإسبوعي</h3>
</div>
<div class="addleader">
<div id="basic-horizontal-layouts">
    <div class="row" style="direction: rtl">
        <div class="px-4">
            <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3' style=width:120px> اضافة قائد</button>
        </div>
    </div>
</div>
</div><br>
        <div class="leadername">
                <div class="card-body">
                    <div class="btn-group mb-1">
                        <div class="dropdown">
                            <button type="button"
                                            class="btn btn-primary btn-lg dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">اسم القائد</span>
                                        </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Option 1</a>
                                <a class="dropdown-item" href="#">Option 2</a>
                                <a class="dropdown-item" href="#">Option 3</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="save">
 <div class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>يتم حفظ البيانات تلقائيًا، قم بتحديث الصفحة للتأكد من الحفظ...
 </div>
</div>


    <input type="hidden" name="leader_id" id="leader_id_set">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4" >
                <div class="teamnum">عدد الفريق</div>
                <input class="teamnuminput"  name="current_team_members" type="number" style="border-radius: 25px; width:125px; height:30; border:1px solid" min="1" max="30" style="direction: rtl"  required>

                <div class="teamrate">معدل الفريق</div>
                <input class="teamrateinpute"  name="team_final_mark" type="number" style=" border-radius: 25px; width:125px; height:30; border:1px solid" min="0" max="100.00" step="0.01" style="direction: rtl" required>
                <div class="zeronum">عدد الحاصلين على صفر</div>
                <input class="zeronuminpute"  name="zero_numbers" type="number" style=" border-radius: 25px; width:125px; height:30; border:1px solid" min="1" max="30" style="direction: rtl" required>

            </div>
        </div>
            <div class="col-sm-4">
                <p id="team_member_msg" style="color: red"></p>
            </div>
            <div class="col-sm-4">
                <p id="team_mark_msg" style="color: red"></p>
            </div>
        </div>
    </div>
    <div class="followuppost"
        style="border-radius: 25px;
        border: 1px solid #616361;
        padding: 20px;
        width: 250px;
        height: 550px;
        right:30px
        position:absolute" >
            <div class="card">
                <div class="card-header" style="border-radius: 25px;
                background-color:#435ebe;
                padding: 10px;">
                    <h4 class= "card-title" style="text-align: center; color:#dcdfe3">منشور المتابعة الإسبوعي</h4>
                    <p id="follow_up_msg" style="color: red"></p>
                    <p id="follow_up_missing_standard_msg" style="color: red"></p>
                </div>
                <section class="section" style="direction: rtl">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="follow_up" type="radio" name="follow_up_post" value="تم النشر" onclick="follow_up_disable()">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                             نشر
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="follow_up" type="radio" name="follow_up_post" value="تم النشر" onclick="follow_up_disable()">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            لم يتم النشر
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="follow_up" type="radio" name="follow_up_post" value="تم النشر" onclick="follow_up_disable()">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            تم بالنيابة
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="follow_up" type="radio" name="follow_up_post" value="تم النشر" onclick="follow_up_disable()">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            غير مستوف المعايير
                                        </label>
                                    </div>

                                        <div>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_1" name="follow_up_standard_1" value="وقت النشر" disabled> نشره الأحد في وقت مناسب<br>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_2" name="follow_up_standard_2" value="تاغ" disabled> تاغ للسفراء<br>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_3" name="follow_up_standard_3" value="رقم الأسبوع والشهر" disabled> ذكر رقم الإسبوع والشهر<br>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_4" name="follow_up_standard_4" value="عبارة تشجيعية" disabled> عبارة تشجيعية<br>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_5" name="follow_up_standard_5" value="الصورة" disabled> صورة مناسبة<br>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_6" name="follow_up_standard_6" value="سؤال عن الإنجاز" disabled> سؤال واضح عن الإنجاز<br>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_7" name="follow_up_standard_7" value="وضع الأطروحة في مجموعة السفراء" disabled> التذكير بوضع الأطروحة في السفراء<br>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_8" name="follow_up_standard_8" value="تعليق لكل سفير" disabled> تعليق منفصل لكل سفير<br>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_9" name="follow_up_standard_9" value="تعليق الأخبار" disabled> تعليق الاخبار<br>
                                            <input type="checkbox" class="follow_up_standard" id="follow_up_standard_10" name="follow_up_standard_10" value="أسبوع مخفف" disabled> أسبوع مخفف<br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="knowyourproject" >
            <div class="col-md-6 col-12" dir="rtl"
            style="border: 1px solid #616361;
            padding: 20px;
            width: 250px;
            height: 470px;
            right:30px
            position:absolute" >
                <div class="card">
                    <div class="card-header" style="border-radius: 25px;
                    background-color:#435ebe;
                    color:aliceblue;
                    padding: 10px;">
                    <h4 class="card-title" style="color:#dcdfe3">اعرف مشروعك</h4>
                    <p id="know_your_project_msg" style="color: red"></p>
                    <p id="know_your_project_missing_standard_msg" style="color: red"></p>
                </div>
                <section class="section" style="direction: rtl">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="know_your_project_standard" id="know_your_project_standard_1" type="radio" name="know_your_project_standard_1" value="تم النشر">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                             نشر
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="know_your_project_standard" id="know_your_project_standard_2" type="radio" name="know_your_project_standard_2" value="تم النشر" onclick="follow_up_disable()">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            لم يتم النشر
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="know_your_project_standard" id="know_your_project_standard_3" type="radio" name="know_your_project_standard_3" value="تم النشر" onclick="follow_up_disable()">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            تم بالنيابة
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="know_your_project_standard" id="know_your_project_standard_4" type="radio" name="know_your_project_standard_4" value="تم النشر" onclick="follow_up_disable()">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            غير مستوف المعايير
                                        </label>
                                    </div>

                                        <div>
                                        <div>
                                            <input type="checkbox" class="know_your_project_standard" id="know_your_project_standard_1" name="know_your_project_standard_1" value="وقت النشر" disabled> نشره في وقت مناسب (الخميس)<br>
                                            <input type="checkbox" class="know_your_project_standard" id="know_your_project_standard_2" name="know_your_project_standard_2" value="التاغ"disabled> تاغ للسفراء<br>
                                            <input type="checkbox" class="know_your_project_standard" id="know_your_project_standard_3" name="know_your_project_standard_3" value="نقل المنشور" disabled>نقل منشور اعرف مشروعك من الإدارة بشكل أنيق<br>
                                            <input type="checkbox" class="know_your_project_standard" id="know_your_project_standard_4" name="know_your_project_standard_4" value="منشن يوم  الجمعة" disabled> إعادة المنشن يوم الجمعة<br>
                                        </div><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="thutask" >
            <div class="col-md-6 col-12" dir="rtl"
            style="border-radius: 25px;
            border: 1px solid  #616361;
            padding: 20px;
            width: 270px;
            height: 270px;
            right:30px
            position:absolute" >
                <div class="card">
                    <div class="card-header" style="border-radius: 25px;
                    background-color:#435ebe;
                    color:aliceblue;
                    padding: 5px;">
                        <h4 class="card-title" style= "color:#dcdfe3">مهمة الخميس</h4>
                        <p id="thursday_assignment_msg" style="color: red"></p>
                        <p id="thursday_assignment_missing_standard_msg" style="color: red"></p>
                    </div><br>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="radio" class="thursday_assignment" name="thursday_assignment_post" value="تم " onclick="thursday_assignment_disable()"> تم
                                        </div>
                                        <div class="col-md-8">
                                            <input type="radio" class="thursday_assignment" name="thursday_assignment_post" value="لم يتم " onclick="thursday_assignment_disable()"> لم يتم
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fritask" >
            <div class="col-md-6 col-12" dir="rtl"
            style="border-radius: 25px;
            border: 1px solid #616361;
            padding: 20px;
            width: 270px;
            height: 270px;
            right:30px" >
                <div class="card">
                    <div class="card-header" style="border-radius: 25px;
                    background-color:#435ebe;
                    color:aliceblue;
                    padding: 5px;">
                     <h4 class="card-title" style= "color:#dcdfe3">مهمة الجمعة</h4>
                     <p id="friday_assignment_msg" style="color: red"></p>
                     <p id="friday_assignment_missing_standard_msg" style="color: red"></p>
                 </div><br>
                 <div class="card-content">
                     <div class="card-body">
                         <div class="form form-horizontal">
                             <div class="form-body">
                                 <div class="row">
                                     <div class="col-md-8">
                                         <input type="radio" class="friday_assignment" name="friday_assignment_post" value="تم " onclick="friday_assignment_disable()"> تم
                                     </div>
                                     <div class="col-md-8">
                                         <input type="radio" class="friday_assignment" name="friday_assignment_post" value="لم يتم " onclick="friday_assignment_disable()"> لم يتم
                                     </div>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="finalgrades" >
            <div class="col-md-6 col-12" dir="rtl"
            style="border-radius: 25px;
            border: 1px solid #616361;
            padding: 20px;
            width: 270px;
            height: 270px;
            right:30px" >
                <div class="card">
                    <div class="card-header" style="border-radius: 25px;
                    background-color:#435ebe;
                    color:aliceblue;
                    padding: 5px;">
                    <h4 class="card-title" style= "color:#dcdfe3">العلامات النهائية</h4>
                    <p id="final_mark_msg" style="color: red"></p>
                </div><br>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="radio" class="final_mark" name="final_mark" value="تم النشر"> نشر<br>
                                        <input type="radio" class="final_mark" name="final_mark" value="لم يتم النشر"> لم ينشر <br>
                                        <input type="radio" class="final_mark" name="final_mark" value="تم بالنيابة"> تم بالنيابة <br>
                                    </div><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="linkwithdraw" >
            <div class="col-md-6 col-12" dir="rtl"
            style="border-radius: 25px;
            border: 1px solid #616361;
            padding: 20px;
            width: 250px;
            height: 700px;
            right:30px
            position:absolute" >
                <div class="card">
                    <div class="card-header" style="border-radius: 25px;
                    background-color:#435ebe;
                    color:aliceblue;
                    padding: 10px;">
                    <h4 class="card-title" style= "color:#dcdfe3">إدخال روابط المنسحبين</h4>
                    <p id="withdrawn_ambassadors_msg" style="color: red"></p>
                    <p id="withdrawn_number_required_msg" style="color: red"></p>
                    <p id="withdrawn_number_msg" style="color: red"></p>
                </div>
                </div><br>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="radio" class="withdrawn_ambassadors_done withdrawn_ambassadors" name="withdrawn_ambassadors" value="تم الإدخال" onclick="withdrawn_number_enable()"> تم الإدخال  <br> <br>
                                        <input type="radio" class="withdrawn_ambassadors_not_done withdrawn_ambassadors" name="withdrawn_ambassadors" value="لم يتم الإدخال" onclick="withdrawn_number_enable()">  لم يتم الإدخال  <br> <br>
                                        <input type="radio" class="withdrawn_ambassadors" name="withdrawn_ambassadors" value="لا يوجد منسحبين" onclick="withdrawn_number_disable()">  لا يوجد لديه منسحبين <br> <br>
                                    </div>
                                    <div class="col-md-8 form-group"> <br>
                                        <div>
                                            <label>عدد المنسحبين</label><br>
                                            <input type="number" id="withdrawn_number" style=" border:1px solid rgb(202, 197, 197); border-radius: 25px; width: 170px; height:35px;" name="num_defective" min="1" max="30" class="form-control radius">
                                        </div>
                                    </div>
                                </div>


<div class="row match-height" >
    <div class="col-md-6 col-12" dir="rtl"
    style="border-radius: 25px;
    border: 1px solid #616361;
    padding: 20px;
    width: 200px;
    height: 290px;
    right:30px;" >
        <div class="card">
            <div class="card-header" style="border-radius: 25px;
            background-color:#435ebe;
            color:aliceblue;
            padding: 5px;">
                    <h4 class="card-title" style= "color:#dcdfe3">عدد حالات التجميد</h4>
                    <p id="frozen_ambassadors_msg" style="color: red"></p>
                    <p id="frozen_number_required_msg" style="color: red"></p>
                    <p id="frozen_number_msg" style="color: red"></p>
                </div><br>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="radio" class="frozen_ambassadors" name="frozen_ambassadors" value=" يوجد " onclick="frozen_number_enable()"> يوجد<br>
                                        <input type="radio" class="frozen_ambassadors" name="frozen_ambassadors" value=" يوجد " onclick="frozen_number_disable()" disable>لا يوجد <br>
                                    </div><br>
                                    <div class="col-md-8 form-group">
                                        <div>
                                            <label>ادخل العدد</label>
                                            <input type="number" id="frozen_number" style=" border:1px solid rgb(202, 197, 197); border-radius: 25px; width: 100px; height:35px;" name="num_defective" min="1" max="30" class="form-control radius">
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
</div>
</div>
</div>
</div>
</div>
</div>
<div class="checkfinal" >
    <div class="col-md-6 col-12" dir="rtl"
    style="border-radius: 25px;
    border: 1px solid  #616361;
    padding: 20px;
    width: 250px;
    height: 700px;
    right:30px" >
        <div class="card">
            <div class="card-header" style="border-radius: 25px;
            background-color:#435ebe;
            color:aliceblue;
            padding: 5px;">
            <h4 class="card-title" style= "color:#dcdfe3">تدقيق العلامات النهائية</h4>
            <p id="audit_final_mark_msg" style="color: red"></p>
            <p id="audit_final_mark_upload_pic_msg" style="color: red"></p>
        </div><br>
        <div class="card-content">
            <div class="card-body">
                <div class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="radio" class="audit_final_mark_done audit_final_mark" name="audit_final_mark" value="تم التدقيق" onclick="image_upload_enable()"> تم
                            </div>
                            <div class="col-md-8">
                                <input type="radio" class="audit_final_mark" name="audit_final_mark" value="لم يتم التدقيق" onclick="image_upload_disable()">  لم يتم
                            </div>
                            <div class="col-md-8">
                                <input type="radio" class="audit_final_mark" name="audit_final_mark" value="لم يكن التدقيق لهذا القائد" onclick="image_upload_disable()">  لم يكن التدقيق لهذا القائد هذا الإسبوع
                            </div>
                            <div class="col-md-8 form-group"> <br>
                                <div>
                                    <label>سكرين للتواصل مع القائد</label><br>
                                    <input type="file" id="leader_message_1" name="leader_message_1" class="form-control radius"><br><br>
                                    <input type="file" id="leader_message_2" name="leader_message_2" class="form-control radius" ><br><br>
                                    <input type="file" id="leader_message_3" name="leader_message_3" class="form-control radius" ><br><br>

                                    <label>سكرين لرد القائد على رسالتك</label> <br>
                                    <input type="file" id="leader_reply_message" name="leader_reply_message" class="form-control radius">
                                    @error('file')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror

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
<div class="leaderinventory" >
    <div class="col-md-6 col-12" dir="rtl"
    style="border-radius: 25px;
    border: 1px solid #616361;
    padding: 20px;
    width: 250px;
    height: 410px;
    right:30px" >
        <div class="card">
            <div class="card-header" style="border-radius: 25px;
            background-color:#435ebe;
            color:aliceblue;
            padding: 5px;">
            <h4 class="card-body" style= "color:#dcdfe3"> جرد قراءة القائد</h4>
            <p id="leader_reading_msg" style="color: red"></p>
        </div><br>
        <div class="card-content">
            <div class="card-body">
                <div class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="radio" class="leader_reading" name="leader_reading" value="قرأ"> قرأ<br>
                                <input type="radio" class="leader_reading" name="leader_reading" value="لم يقرأ"> لم يقرأ<br>
                                <input type="radio" class="leader_reading" name="leader_reading" value="لم يكمل الورد"> لم يكمل الورد<br>
                                <input type="radio" class="leader_reading" name="leader_reading" value="لم يصوت في مجموعة الرقابة"> قرأ ولم يصوت في مجموعة الرقابة<br>
                                <input type="radio" class="leader_reading" name="leader_reading" value="تأخر بالتصويت"> تم التصويت بعد إغلاق الموقع<br>
                            </div>
                             </div>
                          </div>
                      </div>
                 </div>
             </div>
        </div>
    </div>
 </div>
 <div class="notes" >
    <div class="col-md-6 col-12" dir="rtl"
    style="border-radius: 25px;
    border: 1px solid  #616361;
    padding: 20px;
    width: 870px;
    height: 250px;
    right:30px
    position:absolute" >
        <div class="card">
            <div class="card-header" style="border-radius: 25px;
            background-color:#435ebe;
            color:aliceblue;
            padding: 5px;">

<h4 class="card-title" style="color:#dcdfe3">الملاحظات للقائد</h4>
                </div><br>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form form-horizontal">
                            <div class="form-body">
                                <textarea class="form-control" style="width:400; height:100; padding:5px" placeholder="اكتب هنا"
                                id="floatingTextarea"></textarea>
                                    <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<footer>
    <div class="footer clearfix mb-0 text-muted">

        <div class="float-end" style="text-align: center">
            <p>Developed by <a href="https://Osboha 180">Osboha 180</a> Programmers</p>

        </div>
    </div>

</footer>

</body>

</html>
