<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <title>Wattana | Dashboard</title>
    <link rel="icon" href="{{ asset('assets/images/logo1.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ckeditor.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.1/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.1.0/ckeditor5.css" />


    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body>
    <div class="hidden md:block">
        <nav class="sidebar close py-[2px] sm:py-[10px] px-[4px] sm:px-[14px]">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="{{ asset('assets/images/logo1.png') }}" alt="">
                    </span>

                    <div class="text header-text">
                        <span class="name">Wattana</span>
                    </div>
                </div>

                <div class="hidden sm:block">
                    <i class="bx bx-chevron-right toggle"></i>
                </div>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <ul class="manu-links">
                        <li
                            class="nav-link {{ Route::is('dashboard') ? 'bg-[#FF3217] rounded-md !text-[#ffffff]' : '' }}">
                            <a href="{{ route('dashboard') }}"
                                class="{{ Route::is(patterns: 'dashboard') ? 'active' : '' }}">
                                <i class='bx bxs-dashboard icon'></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li
                            class="nav-link {{ Request::is('homepage') ? 'bg-[#FF3217] rounded-md !text-[#ffffff]' : '' }}">
                            <a href="{{ url('homepage') }}">
                                <i class="bx bx-home-alt icon"></i>
                                <span class="text nav-text">Home Page</span>
                            </a>
                        </li>
                        <li
                            class="nav-link {{ Request::is('aboutpage') ? 'bg-[#FF3217] rounded-md !text-[#ffffff]' : '' }}">
                            <a href="{{ url('aboutpage') }}">
                                <i class='bx bxs-user-detail icon'></i>
                                <span class="text nav-text">About Page</span>
                            </a>
                        </li>
                        <li
                            class="nav-link {{ Request::is('servicepage') ? 'bg-[#FF3217] rounded-md !text-[#ffffff]' : '' }}">
                            <a href="{{ url('servicepage') }}">
                                <i class='bx bx-cog icon'></i>
                                <span class="text nav-text">Service Page</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Request::is('product_category') ? 'bg-[#FF3217] rounded-md !text-[#ffffff]' : '' }}">
                            <a href="{{ url('product_category') }}">
                                <i class='bx bx-category icon'></i>
                                <span class="text nav-text">Product Category</span>
                            </a>
                        </li>
                        <li
                            class="nav-link {{ Request::is('productpage') ? 'bg-[#FF3217] rounded-md !text-[#ffffff]' : '' }}">
                            <a href="{{ url('productpage') }}">
                                <i class='bx bx-list-ul icon'></i>
                                <span class="text nav-text">Product Page</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Request::is('nav') ? 'bg-[#FF3217] rounded-md !text-[#ffffff]' : '' }}">
                            <a href="{{ url('nav') }}">
                                <i class='bx bx-navigation icon'></i>
                                <span class="text nav-text">Navbar</span>
                            </a>
                        </li>
                        <li
                            class="nav-link {{ Request::is('contactUs') ? 'bg-[#FF3217] rounded-md !text-[#ffffff]' : '' }}">
                            <a href="{{ url('contactUs') }}">
                                <i class='bx bxs-contact icon'></i>
                                <span class="text nav-text">Contact Page</span>
                            </a>
                        </li>
                    </ul>
                </div>


                <div class="bottom-content">
                    <li class="">
                        <a href="{{ route('profile.edit') }}">
                            <i class="bx bx-user-circle icon"></i>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>

                    <li class="">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="bx bx-log-out icon"></i>
                                <span class="text nav-text">Logout</span>
                            </a>
                        </form>
                    </li>
                </div>
            </div>
        </nav>

        <section class="home">
            <div class="text px-[10px] sm:px-[20px] md:px-[40px] py-[8px] text-[20px] sm:text-[25px] md:text-[30px]">
                @yield('header')
            </div>
            <hr>
            <div class="px-[10px] sm:px-[20px] md:px-[40px] py-[8px] text-[#707070]">
                @yield('content')
            </div>
        </section>
    </div>

    <div class="md:hidden w-full h-full bg-gray-700 flex flex-col items-center justify-center space-y-2">
        <img src="{{ asset('assets/images/window.png') }}" alt="" class="w-52 h-auto">
        <h1 class="text-[25px] text-[#fff] font-[600] tracking-wider">Window too small</h1>
    </div>

    @yield('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <!-- CKEditor 4 CDN -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/45.1.0/ckeditor5.umd.js"></script>

    <script>
        // delete message
        function deleteRecord(url) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FF3217",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                            window.location.href = url;
                        }
                    })
                }
            });
        }
    </script>
</body>

</html>
