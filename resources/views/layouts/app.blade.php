<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body class="font-Comfortaa bg-Background">
    {{-- <nav> --}}
    @include('components.navbar')
    {{-- </nav> --}}

    {{-- <main> --}}
    @yield('content')
    {{-- </main> --}}

    {{-- <footer> --}}
    @include('components.footer')
    {{-- </footer> --}}

    <!-- Scripts -->
    @yield('scripts')
    <!-- Scripts -->
    @vite('resources/js/app.js')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slider').slick({
                draggable: true,
                arrows: false,
                dots: false,
                fade: true,
                speed: 500,
                infinite: true,
                cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
                touchThreshold: 100,
                autoplay: true,
                responsive: true
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.slick-custom-prev').on('click', function() {
                $(this).siblings('.slick-slider').slick('slickPrev');
            });

            $('.slick-custom-next').on('click', function() {
                $(this).siblings('.slick-slider').slick('slickNext');
            });

            $('.slick-slider-host').slick({
                draggable: true,
                arrows: false,
                dots: false,
                fade: true,
                speed: 1000,
                infinite: true,
                cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
                touchThreshold: 100,
                autoplay: true,
                responsive: true
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.listing-slider').slick({
                draggable: true,
                arrows: false,
                dots: false,
                fade: true,
                speed: 1000,
                infinite: true,
                cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
                touchThreshold: 100,
                autoplay: true,
                responsive: true
            });
        });
    </script>


</body>

</html>
