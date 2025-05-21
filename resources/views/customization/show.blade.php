@extends('layouts.master')
@section('css')
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <div class="min-h-screen w-full px-2 py-10 flex flex-col items-center justify-center lg:pt-32">
        <div class="relative flex items-center justify-start w-full max-w-7xl text-black text-[14px] py-4">
            <a href={{ route('customization') }}
                class="border border-[#FF3217] hover:bg-[#FF3217] hover:text-white px-2 sm:px-4 py-2 rounded-full flex items-center space-x-2">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 14l-4 -4l4 -4"></path>
                    <path d="M5 10h11a4 4 0 1 1 0 8h-1"></path>
                </svg>
                <span class="hidden sm:block">Back</span>
            </a>

            <h2 class="absolute left-1/2 transform -translate-x-1/2 text-2xl font-semibold text-center">
                {{ $name }}
            </h2>
        </div>


        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image) }}" alt="Room Image"
                            class="rounded shadow w-[80%] lg:w-1/2 h-auto sm:h-[400px]" />
                    </div>
                @endforeach
            </div>
            <div
                class="custom-swiper-button-prev absolute left-0 lg:left-[15%] top-1/2 -translate-y-1/2 z-10 w-8 h-8 lg:w-10 lg:h-10">
                <svg class="w-full h-full" viewBox="0 0 28 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.2">
                        <path
                            d="M0.73418 24.8164L21.2225 45.3044C21.6964 45.7787 22.329 46.0399 23.0035 46.0399C23.678 46.0399 24.3106 45.7787 24.7844 45.3044L26.2933 43.796C27.2751 42.813 27.2751 41.2155 26.2933 40.2341L9.08868 23.0295L26.3123 5.80582C26.7862 5.33158 27.0479 4.69938 27.0479 4.02525C27.0479 3.35038 26.7862 2.71818 26.3123 2.24356L24.8035 0.735481C24.3293 0.261234 23.6971 -2.69958e-05 23.0226 -2.70548e-05C22.3481 -2.71137e-05 21.7155 0.261234 21.2416 0.735481L0.734181 21.2422C0.259188 21.7179 -0.0017031 22.3531 -0.000205889 23.0284C-0.00170322 23.7062 0.259188 24.3411 0.73418 24.8164Z"
                            fill="#515151" />
                    </g>
                </svg>

            </div>
            <div
                class="custom-swiper-button-next absolute right-0 lg:right-[15%] top-1/2 -translate-y-1/2 z-10 w-8 h-8 lg:w-10 lg:h-10">
                <svg class="w-full h-full" viewBox="0 0 28 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.2">
                        <path
                            d="M26.3137 21.2235L5.82532 0.73551C5.35144 0.261265 4.71887 0 4.04437 0C3.36987 0 2.7373 0.261265 2.26343 0.73551L0.7546 2.24396C-0.227203 3.22689 -0.227203 4.82442 0.7546 5.80585L17.9592 23.0104L0.73551 40.2341C0.26164 40.7083 0 41.3405 0 42.0147C0 42.6895 0.26164 43.3217 0.73551 43.7964L2.24434 45.3044C2.71858 45.7787 3.35078 46.0399 4.02528 46.0399C4.69978 46.0399 5.33236 45.7787 5.80623 45.3044L26.3137 24.7977C26.7887 24.322 27.0496 23.6868 27.0481 23.0116C27.0496 22.3337 26.7887 21.6989 26.3137 21.2235Z"
                            fill="#515151" />
                    </g>
                </svg>

            </div>
        </div>
    </div>
@endsection
