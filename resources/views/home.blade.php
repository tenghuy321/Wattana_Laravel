@extends('layouts.master')

@section('css')
    <style>
        .swiper,
        .swiper-wrapper,
        .swiper-slide {
            width: 100%;
            height: 100%;
        }

        .swiper-button-next,
        .swiper-button-prev {
            z-index: 30 !important;
        }
    </style>
@endsection

@section('content')
    <x-loading />
    {{-- <div class='min-h-screen relative'>
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="swiper homeSwiper">
                <div class="swiper-wrapper h-full">
                    @foreach ($heroBanner as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset($item->image) }}" alt="" class="w-full h-full object-cover"
                                loading="eager">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class='relative z-20 pb-[2rem]'>
            <div
                class='w-full text-[50px] sm:text-[70px] lg:text-[100px] font-[700] flex flex-col items-center justify-center'>
                <div class='flex flex-col items-center pt-32 md:pt-44'>
                    <h1 class='leading-none text-[#FF3217] uppercase' data-aos="zoom-in-up" data-aos-duration="1200">
                        {{ $homes->title[app()->getLocale()] }}</h1>
                    <p class='text-[20px] sm:text-[30px] lg:text-[40px] text-[#000] uppercase' data-aos="zoom-in-up"
                        data-aos-duration="1500">{{ $homes->sub_title[app()->getLocale()] }}</p>

                    <div class='flex flex-col font-[500] max-w-5xl mx-auto px-4 mt-4' data-aos="zoom-in-up"
                        data-aos-duration="1600">
                        <h1 class='text-[12px] sm:text-[14px] lg:text-[16px] font-[600] text-[#FF3217]'>
                            {{ $homes->header[app()->getLocale()] }}</h1>
                        <div
                            class="prose max-w-none text-black prose-p:text-[10px] lg:prose-p:text-[14px] prose-p:my-2 prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                            prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black
                            marker:text-black">
                            {!! $homes->body[app()->getLocale()] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class='min-h-screen relative'>
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="swiper homeSwiper">
                <div class="swiper-wrapper h-full">
                    @foreach ($heroBanner as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset($item->image) }}" alt="" class="w-full h-full object-cover"
                                loading="eager">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class='relative z-20 h-screen w-full flex items-center justify-center'>
            <div class='text-center px-4'>
                <h1 class='text-[50px] sm:text-[70px] lg:text-[100px] font-[700] leading-none text-[#FF3217] uppercase'
                    data-aos="zoom-in-up" data-aos-duration="1200">
                    {{ $homes->title[app()->getLocale()] }}
                </h1>
                <p class='text-[20px] sm:text-[30px] lg:text-[40px] text-[#000] uppercase mt-4 font-[500]' data-aos="zoom-in-up"
                    data-aos-duration="1500">
                    {{ $homes->sub_title[app()->getLocale()] }}
                </p>
            </div>
        </div>
    </div>
@endsection
