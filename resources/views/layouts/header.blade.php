
<header class="mb-5">
    <div class="header-top">
        <div class="container header-container">
            <div class="logo col-lg-12 text-center">
                <a href="#">
                    <img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo">
            </a>
            </div>
            <div class="header-top-right">

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                        <i class="avatar avatar-md2"><img src="{{asset('assets/images/faces/av1.png')}}" alt="Avatar"></i>
                        <span>{{@Auth::user()->name}}</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a href="component-badge.html" class='submenu-link'>الملف الشخصي</a>
                                </li>

                                <li class="submenu-item  ">
                                    <a href="component-breadcrumb.html" class='submenu-link'>احصائيات</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{ route('logout') }}"class='submenu-link'
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        تسجيل الخروج
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item  ">
                    <a href="index.html" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>الرئيسية</span>
                    </a>
                </li>
                @if(auth()->user()->hasRole('supervisor'))
                <li class="menu-item  ">
                    <a href="{{route('followupTeam.bring_leaders')}}" class='menu-link'>
                    <i class="bi bi-pencil-square"></i>
                        <span>ورقة الأسبوع </span>
                    </a>
                </li>
                <li class="menu-item  ">
                    <a  href="" class='menu-link'>
                    <i class="bi bi-newspaper"></i>
                        <span> عرض ورقة الأسبوع</span>
                    </a>
                </li>
                <li class="menu-item  ">
                    <a href="{{route('supervisorTask')}}" class='menu-link'>
                        <i class="bi bi-newspaper"></i>
                        <span> </span>
                    </a>
                </li>
                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                    <i class="bi bi-people"></i>
                        <span>القادة في فريقي</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a href="{{route('listBy',['supervisor',auth()->user()->Supervisor->id])}}" class='submenu-link'>
                                        اظهار الكل
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                @endif
                @if(auth()->user()->hasRole('advisor'))
                <li class="menu-item  ">
                    @if(auth()->user()->hasRole('advisor'))
                    <a href="{{route('followupTeam.bring_supervisors')}}" class='menu-link'>
                    @endif
                    {{-- <a href="{{route('followupTeam.create')}}" class='menu-link'> --}}
                    <i class="bi bi-pencil-square"></i>
                        <span>مهام المرافب الأسبوعية </span>
                    </a>
                </li>
                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                    <i class="bi bi-people"></i>
                        <span> جرد المراقبين </span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a  href="{{route('followupTeam.bring_supervisors')}}" class='submenu-link'>جرد عمل المراقب كقائد</a>
                                </li>

                                <li class="submenu-item  ">
                                    <a  href="{{route('supervisingTeam')}}" class='submenu-link'>جرد عمل المراقب</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item  has-sub">
                    <a href="#" class='menu-link'>
                    <i class="bi bi-person"></i>
                        <span>المراقبون في فريقي</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a href="component-badge.html" class='submenu-link'>
                                        اظهار الكل
                                         
                                        </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </li>
                @endif
            </ul>

        </div>
    </nav>

</header>