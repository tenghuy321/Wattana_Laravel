@props(['nav', 'navItem'])

<section
    class="absolute left-1/2 -translate-x-1/2 hidden lg:flex items-center gap-4 xl:gap-10 w-full max-w-7xl mt-[4rem] px-4 z-[999]">
    {{-- Logo --}}
    <div>
        <img src="{{ asset($nav->image) }}" alt="Logo" class="w-32 h-30">
    </div>

    {{-- Navigation Menu --}}
    <div class="w-full bg-white rounded-full px-10 xl:px-12 py-4 xl:py-5 shadow-md">
        <ul class="flex items-center justify-between gap-4 xl:gap-10 text-[#1E1E1E]">
            @foreach ($navItem as $item)
                <li>
                    <a href="{{ route($item->link) }}"
                        class="px-2 py-[22px] xl:py-[27px] nav_link text-[16px] xl:text-[18px] {{ Request::routeIs($item->link . '*') ? 'active' : '' }}">
                        {{ $item->title[app()->getLocale()] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
