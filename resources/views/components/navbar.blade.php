<!-- resources/views/components/navbar.blade.php -->
<nav id="main-navbar" class="top-0 z-50 container flex items-center">
    <div class="py-1 w-20">
        <a href="{{ route('landing') }}"><img src="{{ asset('images/logo-no-background.png') }}" /></a>
    </div>
    <ul class="hidden sm:flex flex-1 justify-end items-center gap-12 text-primary uppercase text-lg">
        <li class="cursor-pointer text-Primary"><a href="{{ route('landing') }}">Home</a></li>
        <li class="cursor-pointer text-Primary"><a href="{{ route('about') }}">About Us</a></li>
        <li class="cursor-pointer text-Primary"><a href="{{ route('listings.index') }}">Listings</a></li>
        @auth
            <li class="cursor-pointer text-Primary"><a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <li class="cursor-pointer text-Primary"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a></li>            
        @else
            <a href="{{ route('login') }}" class="bg-Accent text-Background rounded-md px-7 py-3 uppercase inline-block">Login</a>
            <a href="{{ route('signup') }}" class="bg-Accent text-Background rounded-md px-7 py-3 uppercase inline-block">SignUp</a>
        @endauth
    </ul>
    <div class="flex sm:hidden flex-1 justify-end items-center">
        <i id="burger-icon" class="text-2xl fas fa-bars cursor-pointer"></i>
    </div>
</nav>

<!-- Mobile Menu (Hidden by Default) -->
<div id="mobile-menu" class="hidden sm:hidden fixed top-0 left-0 w-full h-full flex flex-col justify-center items-center bg-Background bg-opacity-80 backdrop-blur-md z-50">
    <i id="close-icon" class="text-3xl absolute top-4 right-4 fas fa-times cursor-pointer"></i>
    <ul class="space-y-2 text-3xl">
        <li class="cursor-pointer text-Accent"><a href="{{ route('landing') }}">Home</a></li>
        <li class="cursor-pointer text-Accent"><a href="{{ route('about') }}">About Us</a></li>
        <li class="cursor-pointer text-Accent"><a href="{{ route('listings.index') }}">Listings</a></li>
        @auth
            <li class="cursor-pointer text-Accent"><a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <li class="cursor-pointer text-Accent"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a></li>
        @else
            <li class="cursor-pointer text-Accent"><a href="{{ route('login') }}">Login</a></li>
            <li class="cursor-pointer text-Accent"><a href="{{ route('signup') }}">SignUp</a></li>
        @endauth
    </ul>
</div>

<script>
    const burgerIcon = document.getElementById('burger-icon');
    const closeIcon = document.getElementById('close-icon');
    const mobileMenu = document.getElementById('mobile-menu');

    burgerIcon.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
    });

    closeIcon.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });
</script>
<script>
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('main-navbar');
        if (window.scrollY > 0) {
            navbar.classList.add('nav-scrolled');
        } else {
            navbar.classList.remove('nav-scrolled');
        }
    });
</script>
