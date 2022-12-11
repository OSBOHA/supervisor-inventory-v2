
@extends('auth/includes/register-header')

 @section('content')



<body>
   <div id="auth">
       <div class="row h-25">
           <div class="col-lg-6 col-12">
               <div id="auth-left">
                   {{-- <div class="auth-logo mb-0 text-center">
                       <h2>Osboha180</h2>
                   </div> --}}


                   <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="auth-title text-center">{{ __('موقع المراقبين') }}</h1>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control"  id="first-name-icon"@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="أدخل الاسم" required autocomplete="name" autofocus>
                                                        @error('name')
                                                          <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                          </span>
                                                        @enderror

                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="email" class="form-control"  id="first-name-icon" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="أدخل الايميل" required autocomplete="email" autofocus>
                                                        @error('email')
                                                          <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                          </span>
                                                        @enderror


                                                        <div class="form-control-icon">
                                                            <i class="bi bi-envelope"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="password" class="form-control" @error('password') is-invalid @enderror" name="password" placeholder="أدخل كلمة السر" required autocomplete="current-password">

                                                        @error('password')

                                                          <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                           </span>

                                                       @enderror




                                                        <div class="form-control-icon">
                                                            <i class="bi bi-lock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>تود التسجيل كـ</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select name="user_type" class="form-select form-control form-control-xl me-2" id="basicSelect">
                                                            <option value="supervisor"> مراقب </option>
                                                            <option value="advisor"> موجـه </option>
                                                            <option value="advisor">  مستشار </option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group col-md-8 offset-md-4">
                                                <div class="form-check">
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox2" class="form-check-input" checked="">
                                                        <label for="checkbox2">Remember Me</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">{{ __('دخول') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600"> لديك حساب مسبقا؟ <a href="{{ route('login')}}"
                            class="font-bold">سجل الدخول من هنا</a></p>
                    <p>

                </div>


            </div>

            <div class="text-center mt-5 text-lg fs-4 ">
                <p style="font-size: 15px">© All Rights Reserved | Developed by
                    <a style="color:#ff6666;font-weight: 600;"  data-toggle="modal" data-target="#programers">
                            Osboha 180
                    </a> Programmers.
                </p>
            </div>

        </div>

        <div class="col-lg-6 d-none d-lg-block">
            <div class="hero-bg-image " >

                {{-- <div >
                    <img src="{{asset('assets/images/inventory-site.png')}}" alt="">
                </div> --}}


                <div class="    ">
                    <img src="{{asset('assets/images/logo/osboha_logo.png')}}" style="margin: 900px 50% 120px" alt="logo">
                </div>


             </div>


           </div>






    </div>

</body>













@endsection
