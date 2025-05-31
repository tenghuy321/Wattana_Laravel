<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo1.png') }}">


    <title>Wattana</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />



    <style>
        .nav_link {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .nav_link.active {
            position: relative;
            width: 100%;
            height: 100%;
            font-weight: 600;
        }

        .nav_link.active::before {
            content: '';
            position: absolute;
            width: 120%;
            height: 2px;
            bottom: 0px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #FF3217;
        }

        .nav_link::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #FF3217;
            transition: all 0.5s;
        }

        .nav_link:hover::before {
            width: 120%;
        }

        section[id] {
            scroll-margin-top: 5rem;
        }

        .prose h1 {
            font-size: 25px;
            font-weight: bold;
        }

        .prose ul {
            list-style-type: disc;
            padding-left: 1.25rem;
            font-size: 14px;
        }

        .prose ul li::marker {
            color: #1e1e1e;
        }

        .prose ol {
            list-style-type: decimal;
            padding-left: 1.25rem;
            font-size: 14px;
        }

        .prose h2 {
            font-size: 20px;
            font-weight: bold;
        }

        .prose p {
            font-size: 14px;
        }

        .prose a {
            color: #966927;
            text-decoration: underline;
            cursor: pointer;
            font-size: 16px;
        }

        .prose a:hover {
            color: #966927;
            text-decoration: none;
            font-size: 16px;
        }

        @media (max-width: 639px) {
            .prose p {
                font-size: 14px;
            }
        }
    </style>

    @yield('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="font-family: 'Kantumruy Pro', sans-serif;">

    {{-- <x-header :contact="$contact" :navItem="$navItem" /> --}}
    <x-navbar :nav="$nav" />
    {{-- <x-navbar /> --}}

    @yield('content')

    {{-- <x-footer /> --}}

    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        var swiper = new Swiper('.mySwiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: ".custom-swiper-button-next",
                prevEl: ".custom-swiper-button-prev",
            },
        });

        var homeswiper = new Swiper('.homeSwiper', {
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: ".custom-next",
                prevEl: ".custom-prev",
            },
            effect: 'fade',
            slidesPerView: 1,
            spaceBetween: 0,
        });
    </script>
    <script>
        AOS.init({
            offset: 10,
        });
    </script>
</body>

</html>
