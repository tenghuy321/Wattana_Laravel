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

        .swiper .swiper-pagination-bullet {
            background-color: #1e1e1e;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            margin: 0 5px;
        }

        .swiper .swiper-pagination .swiper-pagination-bullet-active {
            width: 16px;
            height: 6px;
            border-radius: 10px;
            background-color: #FF3217;
        }
    </style>
@endsection

@section('content')
    <x-loading />
    <x-scroll-top-button />
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

    <section id="{{ Str::slug($id_home->title['en']) }}" class="w-full h-[60vh] md:h-[85vh] relative mt-[4rem] md:mt-[5rem]">
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="swiper homeSwiper h-full">
                <div class="swiper-wrapper h-full">
                    @foreach ($heroBanner as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset($item->image) }}" alt="" class="w-full h-full object-cover"
                                loading="eager">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="absolute bottom-4 left-4 z-30">
                <button
                    class="bg-white bg-opacity-50 hover:bg-opacity-75 text-[14px] md:text-[16px] tracking-[2px] text-black px-3 py-2 rounded-full custom-prev">
                    Prev
                </button>
            </div>
            <div class="absolute bottom-4 right-4 z-30">
                <button
                    class="bg-white bg-opacity-50 hover:bg-opacity-75 text-[14px] md:text-[16px] tracking-[2px] text-black px-3 py-2 rounded-full custom-next">
                    Next
                </button>
            </div>
        </div>

        <div class="relative z-20 h-full w-full flex items-center md:items-start justify-center pt-0 md:pt-[4rem]">
            <div class="text-center px-4">
                <h1 class="text-[50px] sm:text-[70px] lg:text-[100px] font-[700] leading-none text-[#FF3217] uppercase"
                    data-aos="zoom-in-up" data-aos-duration="1200">
                    {{ $homes->title[app()->getLocale()] }}
                </h1>
                <p class="text-[20px] sm:text-[30px] lg:text-[40px] text-[#000] uppercase mt-2 font-[600] leading-none"
                    data-aos="zoom-in-up" data-aos-duration="1500">
                    {{ $homes->sub_title[app()->getLocale()] }}
                </p>
            </div>
        </div>
    </section>


    <section id='{{ Str::slug($id_about->title['en']) }}'
        class="w-full h-full text-[20px] md:text-[25px] bg-center bg-cover py-10 md:py-20">
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
    </section>

    <x-products :id_products="$id_products" :product_categories="$product_categories" :productTitle="$productTitle" :productImages="$productImages" :service_product_unique="$service_product_unique"
        :product_unique="$product_unique" />
    <x-our-service :sub_service="$sub_service" :service_title="$service_title" :id_services="$id_services" />
    <x-why-us :why_us="$why_us" :service_why_us="$service_why_us" :id_why="$id_why" />
    <x-our-client :service_client="$service_client" :clients="$clients" :id_client="$id_client" />
    <x-contact :contact="$contact" :id_contact="$id_contact" />
@endsection
