<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css?v=01') }}">
    <link rel="stylesheet" href="{{ asset('/css/all.fa.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/basic.css') }}">

</head>
@livewireStyles
<title>{{ $title }}</title>
</head>

<body dir="rtl">
    <div class="main-contianer-90">
        <div class="menu-side-section">
            <div class="menu-logo">
                <i class="fas fa-photo-video"></i>
                <p class="logo-desc">الفرقان</p>
            </div>
            <div class="user-info">
                <div class="user-img"></div>
                <p class="user-name">{{Auth::user()->name}}</p>
                <p class="user-desc">{{Auth::user()->usergroup->name}}</p>
            </div>
            <div class="menu-items">
                @foreach(Auth::user()->usergroup->roles()->where('ismenu',1)->get() as $role)
                <a href="/{{$role->url}}" class="menu-item {{ $menu == $role->name ? 'active' : '' }}">{{$role->name}}</a>
                @endforeach
            </div>

        </div>
        <div class="main-body">
            <div class="menu-section">
                <input type="text" class="menu-search" placeholder="  إبحث هنا ...">
                <div class="menu-icon">
                    <a title="تسجيل خروج" class="icon" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-arrow-right"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                    <a href="/User/myProfile" class="icon">
                        <i class="fas fa-user"></i>
                    </a>
                    <a href="/" class="icon">
                        <i class="fas fa-home"></i>
                    </a>
                </div>
            </div>
            <div class="content-section">
                <div class="container p-4">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('/js/javascript.js') }}"></script>


    @livewireScripts

</body>

</html>
