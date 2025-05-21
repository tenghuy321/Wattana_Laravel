<section class="absolute left-1/2 -translate-x-1/2 hidden lg:flex items-center gap-4 xl:gap-10 w-full max-w-7xl mt-[4rem] px-4 z-[999]">
    {{-- Logo --}}
    <div>
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-32 h-30">
    </div>

    {{-- Navigation Menu --}}
    <div class="w-full bg-white rounded-full px-10 xl:px-12 py-4 xl:py-5 shadow-md">
        <ul class="flex items-center justify-between gap-4 xl:gap-10 text-[#1E1E1E]">
            <li>
                <a href="{{ route('home') }}"
                   class="px-2 py-[22px] xl:py-[27px] nav_link text-[16px] xl:text-[18px] {{ Request::routeIs('home') ? 'active' : '' }}">
                    {{ __('messages.home') }}
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}"
                   class="px-2 py-[22px] xl:py-[27px] nav_link text-[16px] xl:text-[18px] {{ Request::routeIs('about*') ? 'active' : '' }}">
                    {{ __('messages.about_us') }}
                </a>
            </li>
            <li>
                <a href="{{ route('our_products') }}"
                   class="px-2 py-[22px] xl:py-[27px] nav_link text-[16px] xl:text-[18px] {{ Request::routeIs('our_products') ? 'active' : '' }}">
                    {{ __('messages.products') }}
                </a>
            </li>
            <li>
                <a href="{{ route('service') }}"
                   class="px-2 py-[22px] xl:py-[27px] nav_link text-[16px] xl:text-[18px] {{ Request::routeIs('service*') ? 'active' : '' }}">
                    {{ __('messages.services') }}
                </a>
            </li>
            <li>
                <a href="{{ route('customization') }}"
                   class="px-2 py-[22px] xl:py-[27px] nav_link text-[16px] xl:text-[18px] {{ Request::routeIs('customization') ? 'active' : '' }}">
                    {{ __('messages.customization') }}
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}"
                   class="px-2 py-[22px] xl:py-[27px] nav_link text-[16px] xl:text-[18px] {{ Request::routeIs('contact') ? 'active' : '' }}">
                    {{ __('messages.contact_us') }}
                </a>
            </li>
        </ul>
    </div>
</section>
