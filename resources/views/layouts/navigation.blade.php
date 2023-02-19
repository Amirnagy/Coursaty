<header class="header">

    <section class="flex">

        <a href="home.html" class="logo">Coursaty</a>

        <form action="search.html" method="post" class="search-form">
            <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
            <button type="submit" class="fas fa-search"></button>
        </form>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
        </div>

        @auth
        <div class="profile">
            <img src={{ asset("avatar/".Auth::user()->profile_photo_path)}} class="image" alt="">
            <h3 class="name">{{ Auth::user()->name }}</h3>

                @if (Auth::user()->roles == 1 )
                <p class="role">Instractor</p>
                @else
                <p class="role">Students</p>
                @endif

            {{-- <a href="profile.html" class="btn">view profile</a> --}}
            <div class="flex-btn">
                {{-- <a href="login.html" class="option-btn">login</a> --}}
                <form method="POST" action="{{ route('logout') }}" style="width:100%">
                    @csrf
                <a href={{route('logout')}} class="option-btn" onclick="event.preventDefault();
                    this.closest('form').submit();">Logout
                </a>
                </form>


                {{-- <a href="register.html" class="option-btn">register</a> --}}
            </div>
        </div>
        @endauth

    </section>

</header>

<div class="side-bar">

    <div id="close-btn">
        <i class="fas fa-times"></i>
    </div>

@auth

<div class="profile">
    <img class="image" src = {{ asset("avatar/".Auth::user()->profile_photo_path)}}  alt="">
    <h3 class="name">{{ Auth::user()->name }}</h3>
    @if (Auth::user()->roles == 1 )
                <p class="role">Instractor</p>
                @else
                <p class="role">Students</p>
                @endif
    <a href={{url('profile')}} class="btn">view profile</a>
</div>
@endauth

    <nav class="navbar">
        <a href={{ url('home') }}><i class="fas fa-home"></i><span>Home</span></a>
        <a href={{ url('about') }}><i class="fas fa-question"></i><span>About</span></a>
        <a href={{ url('courses') }}><i class="fas fa-graduation-cap"></i><span>Courses</span></a>
        <a href={{ url('viewinstractor') }}><i class="fas fa-chalkboard-user"></i><span>Instractor</span></a>
        <a href={{ url('countactUS') }}><i class="fas fa-headset"></i><span>Contact us</span></a>
    </nav>

</div>
