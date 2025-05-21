@extends('layouts.master')

@section('content')
    <div class="w-full h-full bg-white">
        <div class="w-full min-h-[50vh] text-[20px] md:text-[25px] bg-center bg-cover pt-20 pb-10 lg:pt-44 lg:pb-10"
            style="background-image: url('{{ asset('assets/images/abouts/about_bg1.png') }}')">
            <div class="w-full h-full max-w-5xl mx-auto px-4 sm:px-10">

                <h1 class="text-[#FF3217] font-[600]" data-aos="fade-right" data-aos-duration="1200">
                    {{ $aboutTitle->title[app()->getLocale()] }}
                </h1>
                <div data-aos="fade-right" data-aos-duration="1200"
                    class="prose max-w-none text-black prose-p:text-[12px] lg:prose-p:text-[14px] prose-p:my-1 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                    prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black prose-p:leading-[1.4] prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2 prose-h1:leading-[1.4] prose-h2:leading-[1.4] prose-h3:leading-[1.4]
                    marker:text-black">
                    {!! $aboutTitle->content[app()->getLocale()] !!}
                </div>
            </div>
        </div>

        <div
            class="flex items-start md:items-center justify-between sm:justify-around w-full max-w-5xl mx-auto px-4 md:px-10 relative -top-[25px] sm:-top-[32px] lg:-top-[30px]">
            @foreach ($aboutpage as $about)
                <a href="{{ route($about->link) }}"
                    class="w-[100px] md:w-full flex flex-col items-center text-[16px] md:text-[18px] gap-4 {{ request()->routeIs($about->link) ? 'text-[#FF3217] font-[600]' : 'text-[#000]' }}"
                    data-aos="fade-up" data-aos-duration="1200">
                    <div
                        class="rounded-full flex items-center justify-center {{ request()->routeIs($about->link) ? 'w-12 h-12 sm:w-16 sm:h-16 bg-[#FF3217]' : 'w-12 h-12 sm:w-12 sm:h-12 bg-[#000]' }}">
                        <img src="{{ asset($about->icon) }}" alt="" class="w-6 h-6 object-cover">
                    </div>
                    <span class="text-[10px] md:text-[16px] text-center">{{ $about->title[app()->getLocale()] }}</span>
                </a>
            @endforeach
        </div>

        @yield('about-content')

    </div>
@endsection
