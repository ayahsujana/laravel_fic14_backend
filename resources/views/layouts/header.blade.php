<header class="header">
    <div class="title-control">
        <button class="btn side-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <a href="{{route('admin.dashboard')}}" class="side-logo primary-color">
            <h3>{{ App_Name() }}</h3>
        </a>

        <h1 class="page-title">@yield('page_title')</h1>
    </div>
    <div class="head-control">
        <!-- Setting -->
        <a href="{{ route('setting') }}" class="btn" title="Setting">
            <i class="fa-solid fa-gear fa-2xl primary-color"></i>
        </a>

        <!-- Profile -->
        <div class="dropdown dropright" title="Profile">
            <a href="#" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-user fa-2xl primary-color" class="avatar-img"></i>
            </a>

            <div class="dropdown-menu p-2 mt-2" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item primary-color" href="{{ route('profile.index') }}">
                    <span><i class="fa-solid fa-user fa-xl mr-2"></i></span>
                    Profile
                </a>
                <a class="dropdown-item primary-color" href="{{ route('admin.logout') }}">
                    <span><i class="fa-solid fa-arrow-right-from-bracket fa-xl mr-2"></i></span>
                    {{__('Label.Logout')}}
                </a>
            </div>
        </div>
    </div>
</header>
