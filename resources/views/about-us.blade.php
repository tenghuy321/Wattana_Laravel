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
    <section>
        <div
            class="relative z-20 h-full w-full flex items-center md:items-start justify-center mt-[4rem] md:mt-[5rem] py-10">
            <img src="{{ asset($nav->image) }}" alt="" class="p-0 w-64 h-auto">
        </div>

        <div class="w-full h-[40vh] sm:h-[50vh] md:h-[85vh] relative z-10">
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
        </div>

    </section>

    <section class="w-full h-full text-[20px] md:text-[25px] bg-center bg-cover py-10 md:py-20">
        <div class="w-full h-full max-w-7xl mx-auto px-4">

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


    <section class="w-full h-full my-10">
        <div class="grid grid-cols-1 md:grid-cols-2 w-full max-w-7xl mx-auto px-4 gap-10">
            <div class="w-full text-[13px] md:text-[14px] text-[#1e1e1e] p-10 shadow-md">
                <div class="flex items-center justify-between py-4">
                    <h1 class="text-[20px] md:text-[25px] font-[600] text-[#FF3217]">
                        {{ $vision->title[app()->getLocale()] }}</h1>
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="28" cy="28" r="28" fill="#FF3217" />
                        <mask id="mask0_2193_2" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="11" y="11"
                            width="34" height="34">
                            <path d="M11 11.0001H44.3334V44.3335H11V11.0001Z" fill="white" />
                        </mask>
                        <g mask="url(#mask0_2193_2)">
                            <path d="M27.667 27.6017L19.8545 43.3569H16.9248" stroke="white" stroke-miterlimit="10" />
                            <path d="M27.667 27.6017V43.3569" stroke="white" stroke-miterlimit="10" />
                            <path d="M38.4092 43.3569H35.4795L27.667 27.6017" stroke="white" stroke-miterlimit="10" />
                            <path d="M24.7373 43.3569H30.5967" stroke="white" stroke-miterlimit="10" />
                            <path
                                d="M29.6201 25.6484C29.6201 26.7271 28.7456 27.6016 27.667 27.6016C26.5883 27.6016 25.7139 26.7271 25.7139 25.6484C25.7139 24.5697 26.5883 23.6953 27.667 23.6953C28.7456 23.6953 29.6201 24.5697 29.6201 25.6484Z"
                                stroke="white" stroke-miterlimit="10" />
                            <path d="M42.6329 21.6291L29.5469 25.1216" stroke="white" stroke-miterlimit="10" />
                            <path d="M25.7738 26.133L21.7642 27.1899L19.7422 19.6436L40.6117 14.083" stroke="white"
                                stroke-miterlimit="10" />
                            <path d="M11.9434 20.7219L14.4709 30.1548" stroke="white" stroke-miterlimit="10" />
                            <path d="M13.2061 25.4385L16.9792 24.4275" stroke="white" stroke-miterlimit="10" />
                            <path d="M21.2578 25.303L17.4846 26.314L16.4736 22.5408L20.2468 21.5298" stroke="white"
                                stroke-miterlimit="10" />
                            <path d="M39.8535 11.253L43.3921 24.459" stroke="white" stroke-miterlimit="10" />
                            <path d="M36.8389 15.0938L38.8609 22.6401" stroke="white" stroke-miterlimit="10" />
                        </g>
                    </svg>
                </div>
                <div
                    class="prose max-w-none text-black prose-p:text-[12px] lg:prose-p:text-[14px] prose-p:my-1 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                    prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black prose-p:leading-[1.4] prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2 prose-h1:leading-[1.4] prose-h2:leading-[1.4] prose-h3:leading-[1.4]
                    marker:text-black">
                    {!! $vision->content[app()->getLocale()] !!}
                </div>
            </div>
            <div class="w-full text-[13px] md:text-[14px] text-[#1e1e1e] p-10 shadow-md">
                <div class="flex items-center justify-between py-4">
                    <h1 class="text-[20px] md:text-[25px] font-[600] text-[#FF3217]">
                        {{ $mission->title[app()->getLocale()] }}</h1>
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="28" cy="28" r="28" fill="#FF3217" />
                        <mask id="mask0_2193_2" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="11" y="11"
                            width="34" height="34">
                            <path d="M11 11.0001H44.3334V44.3335H11V11.0001Z" fill="white" />
                        </mask>
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="28" cy="28" r="28" fill="#FF3217" />
                            <path
                                d="M28.5506 12.1013C26.0785 12.1013 23.6416 12.6969 21.4575 13.8288L18.9038 11.275C18.678 11.049 18.3526 10.9535 18.0404 11.0215C17.7283 11.0895 17.4721 11.3116 17.3605 11.611L16.0709 15.071L12.6109 16.3605C12.3115 16.4721 12.0894 16.7283 12.0215 17.0404C11.9536 17.3526 12.049 17.678 12.275 17.9039L14.8287 20.4577C13.6968 22.6416 13.1013 25.0786 13.1013 27.5506C13.1013 36.0694 20.0318 43 28.5506 43C37.0694 43 44 36.0694 44 27.5506C44 19.0318 37.0694 12.1013 28.5506 12.1013ZM28.5506 32.6352C31.3543 32.6352 33.6352 30.3543 33.6352 27.5506C33.6352 24.7469 31.3543 22.466 28.5506 22.466C27.4872 22.466 26.4995 22.7947 25.6825 23.355L23.3221 20.9946C24.7571 19.8479 26.5751 19.1611 28.5506 19.1611C33.1766 19.1611 36.9401 22.9246 36.9401 27.5506C36.9401 32.1766 33.1766 35.9402 28.5506 35.9402C23.9246 35.9402 20.161 32.1766 20.161 27.5506C20.161 25.5751 20.8478 23.7572 21.9945 22.3222L24.3549 24.6825C23.7946 25.4995 23.466 26.4873 23.466 27.5506C23.466 30.3543 25.7469 32.6352 28.5506 32.6352ZM29.2144 26.8868L27.0465 24.719C27.4954 24.4797 28.0074 24.3434 28.5506 24.3434C30.319 24.3434 31.7578 25.7822 31.7578 27.5506C31.7578 29.319 30.319 30.7577 28.5506 30.7577C26.7821 30.7577 25.3434 29.319 25.3434 27.5506C25.3434 27.0073 25.4796 26.4955 25.719 26.0466L27.8868 28.2144C28.0701 28.3977 28.3104 28.4893 28.5506 28.4893C28.7908 28.4893 29.0311 28.3976 29.2143 28.2144C29.581 27.8478 29.581 27.2534 29.2144 26.8868ZM18.6095 13.6357L21.7683 16.7946L21.3622 19.0347L17.891 15.5635L18.6095 13.6357ZM14.6357 17.6095L16.5635 16.8911L20.0348 20.3622L17.7946 20.7684L14.6357 17.6095ZM28.5506 41.1226C21.067 41.1226 14.9787 35.0342 14.9787 27.5506C14.9787 25.5806 15.4094 23.6364 16.2316 21.8605L16.8146 22.4434C16.9922 22.6211 17.2316 22.7184 17.4783 22.7184C17.5339 22.7184 17.59 22.7135 17.6458 22.7034L19.7144 22.3284C18.8061 23.8595 18.2837 25.645 18.2837 27.5506C18.2837 33.2119 22.8894 37.8176 28.5506 37.8176C34.2119 37.8176 38.8176 33.2119 38.8176 27.5506C38.8176 21.8894 34.2119 17.2836 28.5506 17.2836C26.645 17.2836 24.8595 17.8061 23.3284 18.7144L23.7034 16.6458C23.7583 16.3429 23.6612 16.0323 23.4435 15.8146L22.8605 15.2316C24.6364 14.4094 26.5806 13.9787 28.5507 13.9787C36.0343 13.9787 42.1226 20.0671 42.1226 27.5506C42.1226 35.0342 36.0342 41.1226 28.5506 41.1226Z"
                                fill="#FDFEFF" />
                        </svg>

                    </svg>
                </div>
                <div
                    class="prose max-w-none text-black prose-p:text-[12px] lg:prose-p:text-[14px] prose-p:my-1 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                    prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black prose-p:leading-[1.4] prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2 prose-h1:leading-[1.4] prose-h2:leading-[1.4] prose-h3:leading-[1.4]
                    marker:text-black">
                    {!! $mission->content[app()->getLocale()] !!}
                </div>
            </div>
        </div>
    </section>

    <x-why-us :why_us="$why_us" :service_why_us="$service_why_us" />
    <div class="w-full max-w-7xl mx-auto px-4 py-4 md:py-10">
        <h1 class="text-[20px] md:text-[25px] font-[600] text-[#FF3217] py-4">{{ $regi_title->title[app()->getLocale()] }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
            @foreach ($regi as $item)
                <img src="{{ $item->image }}" alt="" class="w-full h-full object-cover">
            @endforeach
        </div>
    </div>
    <x-contact :contact="$contact" />
@endsection
