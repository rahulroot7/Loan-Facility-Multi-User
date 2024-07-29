<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{route('dashboard')}}">
            <img src="{{asset('assets/images/brand/loan_logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{asset('assets/images/brand/loan_logo.png')}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{asset('assets/images/brand/loan_logo.png')}}" class="header-brand-img light-logo" alt="logo">
            <img src="{{asset('assets/images/brand/loan_logo.png')}}" class="header-brand-img light-logo1" alt="logo">
        </a><!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li>
            <h3> </h3>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="{{asset('dashboard')}}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
        </li>

        <!-- Manage Users -->
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="#">
                <i class="side-menu__icon fa fa-tasks"></i>
                <span class="side-menu__label">Manage User</span><i class="angle fa fa-angle-right"></i></a>

            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="{{route('users.create')}}"><i class="fa fa-users" aria-hidden="true"></i> <span class="sub-side-menu__label" style="padding-left: 10px;"> Create</span></a>
                </li>
            </ul>
            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="{{route('users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> <span class="sub-side-menu__label" style="padding-left: 10px;"> List</span></a>
                </li>
            </ul>
        </li>
        <!-- End Manage Users -->

        <!-- Manage Applicant -->

    </ul>
</aside>