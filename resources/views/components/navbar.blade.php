<style>
    [drawer-backdrop] {
        display: none !important;
    }
</style>

<section
    class="fixed h-[4rem] xl:h-[5rem] inset-0 flex justify-between items-center px-4 xl::px-10 z-[21] bg-white shadow-md">
    <div class="flex-1">
        <img src="{{ asset($nav->image) }}" alt="Logo" class="w-20 xl:w-32 h-auto">
    </div>

    <div class="flex-2 hidden lg:flex items-center justify-center">
        <ul class="flex items-center gap-6 xl:gap-10">
            @foreach ($navItem as $item)
                <li>
                    <a href="#{{ Str::slug($item->title['en']) }}"
                        class="px-2 py-[24px] xl:py-[30px] nav_link text-[14px] xl:text-[18px] text-[#1e1e1e]">
                        {{ $item->title[app()->getLocale()] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="ml-4">
            @php
                $locale = session('locale', app()->getLocale());
            @endphp

            <div>
                @if ($locale === 'en')
                    <a href="{{ route('lang.switch', 'kh') }}">
                        <img src="{{ asset('assets/images/flag/kh-flag.png') }}" alt="Switch to Khmer" class="w-10 h-6">
                    </a>
                @else
                    <a href="{{ route('lang.switch', 'en') }}">
                        <img src="{{ asset('assets/images/flag/usa-flag.png') }}" alt="Switch to English"
                            class="w-10 h-6">
                    </a>
                @endif
            </div>
        </div>

    </div>

    <div class=" flex items-center lg:hidden">

        @php
            $locale = session('locale', app()->getLocale());
        @endphp

        <div class="mr-4">
            @if ($locale === 'en')
                <a href="{{ route('lang.switch', 'kh') }}">
                    <img src="{{ asset('assets/images/flag/kh-flag.png') }}" alt="Switch to Khmer" class="w-10 h-6">
                </a>
            @else
                <a href="{{ route('lang.switch', 'en') }}">
                    <img src="{{ asset('assets/images/flag/usa-flag.png') }}" alt="Switch to English" class="w-10 h-6">
                </a>
            @endif
        </div>

        <button class="text-[#FF3217]" type="button" data-drawer-target="drawer-example"
            data-drawer-show="drawer-example" aria-controls="drawer-example">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="#FF3217"
                stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h6v6h-6z" />
                <path d="M14 4h6v6h-6z" />
                <path d="M4 14h6v6h-6z" />
                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
            </svg>

        </button>
    </div>

    <!-- drawer component -->
    <div id="drawer-example"
        class="fixed top-0 left-0 z-[900] h-screen overflow-y-auto transition-transform -translate-x-full bg-white w-80"
        tabindex="-1" aria-labelledby="drawer-label">
        <div class="p-4">
            <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
                class="text-[#1e1e1e] bg-transparent rounded-lg text-sm w-8 h-8 flex items-center justify-center">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
        </div>

        <hr class="border border-t-1 border-[#FF3217]">

        <ul class="flex flex-col w-full items-start gap-4 xl:gap-10 p-4">
            <li>
                <a href="#home" class="block px-2 py-2 text-[16px] xl:text-[18px] text-[#000] drawer-link">
                    Home
                </a>
            </li>
            <li>
                <a href="#about-us" class="block px-2 py-2 text-[16px] xl:text-[18px] text-[#000] drawer-link">
                    About Us
                </a>
            </li>
            <li>
                <a href="#products" class="block px-2 py-2 text-[16px] xl:text-[18px] text-[#000] drawer-link">
                    Product
                </a>
            </li>
            <li>
                <a href="#services" class="block px-2 py-2 text-[16px] xl:text-[18px] text-[#000] drawer-link">
                    Services
                </a>
            </li>
            <li>
                <a href="#why_us" class="block px-2 py-2 text-[16px] xl:text-[18px] text-[#000] drawer-link">
                    Why Us
                </a>
            </li>
            <li>
                <a href="#our_clients" class="block px-2 py-2 text-[16px] xl:text-[18px] text-[#000] drawer-link">
                    Our Clients
                </a>
            </li>
            <li>
                <a href="#contact" class="block px-2 py-2 text-[16px] xl:text-[18px] text-[#000] drawer-link">
                    Contact
                </a>
            </li>
        </ul>
    </div>

    <script>
        document.querySelectorAll('#drawer-example a.drawer-link').forEach(link => {
            link.addEventListener('click', () => {
                const drawer = document.getElementById('drawer-example');
                drawer.classList.add('-translate-x-full');

                const backdrop = document.querySelector('[drawer-backdrop]');
                if (backdrop) {
                    backdrop.style.display = 'none'; // hide it
                }
            });
        });
    </script>

    </script>

</section>
