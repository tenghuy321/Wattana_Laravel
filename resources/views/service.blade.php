@extends('layouts.master')

@section('content')
    <div class="w-full h-screen bg-white">
        <div class="w-full h-1/2 text-[20px] md:text-[25px] bg-center bg-cover"
            style="background-image: url('{{ asset('assets/images/abouts/about_bg1.png') }}')">
        </div>

        <div
            class="flex items-start md:items-center justify-between sm:justify-around w-full max-w-5xl mx-auto px-4 md:px-10 relative -top-[25px] sm:-top-[32px] lg:-top-[30px]">

            @foreach ($services as $service)
                <a href="{{ route($service->link) }}"
                    class="w-[100px] md:w-full flex flex-col items-center text-[16px] md:text-[18px] gap-4 {{ request()->routeIs($service->link) ? 'text-[#FF3217] font-[600]' : 'text-[#000]' }}"
                    data-aos="fade-up" data-aos-duration="1200">
                    <div
                        class="rounded-full flex items-center justify-center {{ request()->routeIs($service->link) ? 'w-12 h-12 sm:w-16 sm:h-16 bg-[#FF3217]' : 'w-12 h-12 sm:w-12 sm:h-12 bg-[#000]' }}">
                        <img src="{{ asset($service->icon) }}" alt="" class="w-6 h-6 object-contain">
                    </div>
                    <span class="text-[10px] md:text-[16px] text-center">{{ $service->title[app()->getLocale()] }}</span>
                </a>
            @endforeach

            {{-- our-service --}}
            {{-- <a href="{{ route('services.our-service') }}"
                class="w-[100px] md:w-full flex flex-col items-center text-[16px] md:text-[18px] gap-4 {{ request()->routeIs('services.our-service') ? 'text-[#FF3217] font-[600]' : 'text-[#000]' }}"
                data-aos="fade-up" data-aos-duration="1200">
                <div
                    class="rounded-full flex items-center justify-center {{ request()->routeIs('services.our-service') ? 'w-12 h-12 sm:w-16 sm:h-16 bg-[#FF3217]' : 'w-12 h-12 sm:w-12 sm:h-12 bg-[#000]' }}">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.5506 1.10134C14.0785 1.10134 11.6416 1.69692 9.45754 2.82883L6.90385 0.275016C6.67799 0.0490347 6.35257 -0.0464642 6.04042 0.021499C5.72826 0.0894622 5.47205 0.311563 5.36047 0.610952L4.07092 4.071L0.610927 5.36049C0.311538 5.47207 0.0894375 5.72828 0.0214743 6.04044C-0.0464264 6.35259 0.04901 6.67795 0.274991 6.90387L2.82874 9.45768C1.69684 11.6416 1.10125 14.0786 1.10125 16.5506C1.10125 25.0694 8.03175 32 16.5506 32C25.0694 32 32 25.0694 32 16.5506C32 8.03183 25.0694 1.10134 16.5506 1.10134ZM16.5506 21.6352C19.3543 21.6352 21.6352 19.3543 21.6352 16.5506C21.6352 13.7469 19.3543 11.466 16.5506 11.466C15.4872 11.466 14.4995 11.7947 13.6825 12.355L11.3221 9.99463C12.7571 8.84789 14.5751 8.16106 16.5506 8.16106C21.1766 8.16106 24.9401 11.9246 24.9401 16.5506C24.9401 21.1766 21.1766 24.9402 16.5506 24.9402C11.9246 24.9402 8.16104 21.1766 8.16104 16.5506C8.16104 14.5751 8.84781 12.7572 9.99455 11.3222L12.3549 13.6825C11.7946 14.4995 11.466 15.4873 11.466 16.5506C11.466 19.3543 13.7469 21.6352 16.5506 21.6352ZM17.2144 15.8868L15.0465 13.719C15.4954 13.4797 16.0074 13.3434 16.5506 13.3434C18.319 13.3434 19.7578 14.7822 19.7578 16.5506C19.7578 18.319 18.319 19.7577 16.5506 19.7577C14.7821 19.7577 13.3434 18.319 13.3434 16.5506C13.3434 16.0073 13.4796 15.4955 13.719 15.0466L15.8868 17.2144C16.0701 17.3977 16.3104 17.4893 16.5506 17.4893C16.7908 17.4893 17.0311 17.3976 17.2143 17.2144C17.581 16.8478 17.581 16.2534 17.2144 15.8868ZM6.60947 2.6357L9.76832 5.79462L9.36223 8.03471L5.89097 4.56352L6.60947 2.6357ZM2.63568 6.60949L4.5635 5.89105L8.03475 9.36225L5.7946 9.7684L2.63568 6.60949ZM16.5506 30.1226C9.06703 30.1226 2.97869 24.0342 2.97869 16.5506C2.97869 14.5806 3.40937 12.6364 4.23163 10.8605L4.81457 11.4434C4.99218 11.6211 5.23162 11.7184 5.47831 11.7184C5.53395 11.7184 5.58995 11.7135 5.64578 11.7034L7.7144 11.3284C6.8061 12.8595 6.28367 14.645 6.28367 16.5506C6.28367 22.2119 10.8894 26.8176 16.5506 26.8176C22.2119 26.8176 26.8176 22.2119 26.8176 16.5506C26.8176 10.8894 22.2119 6.28363 16.5506 6.28363C14.645 6.28363 12.8595 6.80612 11.3284 7.71442L11.7034 5.6458C11.7583 5.3429 11.6612 5.03225 11.4435 4.81459L10.8605 4.23165C12.6364 3.4094 14.5806 2.97871 16.5507 2.97871C24.0343 2.97871 30.1226 9.06705 30.1226 16.5506C30.1226 24.0342 24.0342 30.1226 16.5506 30.1226Z"
                            fill="white" />
                    </svg>
                </div>
                <span class="text-[10px] md:text-[16px] text-center">{{ __('messages.service') }}</span>
            </a> --}}

            {{-- why-us --}}
            {{-- <a href="{{ route('services.why-us') }}"
                class="w-[100px] md:w-full flex flex-col items-center text-[16px] md:text-[18px] gap-4 {{ request()->routeIs('services.why-us') ? 'text-[#FF3217] font-[600]' : 'text-[#000]' }}"
                data-aos="fade-up" data-aos-duration="1400">
                <div
                    class="rounded-full flex items-center justify-center {{ request()->routeIs('services.why-us') ? 'w-12 h-12 sm:w-14 sm:h-14 bg-[#FF3217]' : 'w-12 h-12 sm:w-12 sm:h-12 bg-[#000]' }}">
                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.4656 19.8557C15.4621 19.8557 15.4586 19.8557 15.4551 19.8557C14.8121 19.8499 14.2948 19.3239 14.3007 18.6803L14.3059 18.0978C14.3059 18.0646 14.3076 18.0308 14.3111 17.9976C14.4725 16.3032 15.5973 15.2646 16.5019 14.4299C16.8083 14.1468 17.0983 13.8794 17.3453 13.6004C17.6465 13.2608 18.0833 12.5654 17.6237 11.726C17.0943 10.7567 15.8011 10.4824 14.7964 10.7125C13.7467 10.9525 13.3599 11.8489 13.2225 12.3615C13.0559 12.983 12.4169 13.3517 11.7954 13.1857C11.1739 13.0191 10.8052 12.3801 10.9712 11.7586C11.4354 10.0246 12.64 8.81591 14.2756 8.44137C16.4768 7.93868 18.6938 8.82814 19.6671 10.6076C20.4773 12.0895 20.2554 13.8282 19.0875 15.1458C18.7631 15.5116 18.4165 15.8319 18.081 16.1412C17.2451 16.913 16.7226 17.4291 16.6341 18.1741L16.6294 18.7001C16.6248 19.3414 16.104 19.8557 15.4656 19.8557Z"
                            fill="white" />
                        <path
                            d="M15.4648 23.3482C15.1619 23.3482 14.859 23.2259 14.6435 23.0104C14.4221 22.7949 14.2998 22.492 14.2998 22.1833C14.2998 21.8804 14.4221 21.5775 14.6435 21.362C15.0745 20.9309 15.855 20.9309 16.2861 21.362C16.5074 21.5775 16.6297 21.8804 16.6297 22.1833C16.6297 22.492 16.5074 22.7891 16.2919 23.0104C16.0706 23.2259 15.7735 23.3482 15.4648 23.3482Z"
                            fill="white" />
                        <path
                            d="M15.8163 30.9772C14.4911 30.9772 13.1776 30.8048 11.9119 30.464C6.45748 28.9967 2.1867 24.4784 1.03163 18.9524C-0.14557 13.3227 2.0271 7.40461 6.56757 3.87533C9.19224 1.83489 12.5025 0.710693 15.8891 0.710693C18.2336 0.710693 20.5618 1.2559 22.6226 2.28632C27.7118 4.83236 30.9999 10.1516 30.9999 15.8384C30.9999 20.4785 28.8103 24.9508 25.143 27.8015C22.509 29.8495 19.1964 30.9772 15.8163 30.9772ZM15.8897 3.04063C13.0186 3.04063 10.2157 3.99008 7.99815 5.71482C4.1555 8.7018 2.31601 13.7106 3.31264 18.4753C4.29005 23.1498 7.9032 26.9726 12.5176 28.2139C13.5859 28.501 14.6961 28.6473 15.8163 28.6473C18.6809 28.6473 21.4856 27.6937 23.7136 25.962C26.8176 23.5493 28.6705 19.7649 28.6705 15.8384C28.6705 11.0265 25.888 6.52506 21.5811 4.37045C19.8418 3.5008 17.8742 3.04063 15.8897 3.04063Z"
                            fill="white" />
                    </svg>
                </div>
                <span class="text-[10px] md:text-[16px] text-center">{{ __('messages.why_us') }}</span>
            </a> --}}

            {{-- registration --}}
            {{-- <a href="{{ route('services.registration') }}"
                class="w-[100px] md:w-full flex flex-col items-center text-[16px] md:text-[18px] gap-4 {{ request()->routeIs('services.registration') ? 'text-[#FF3217] font-[600]' : 'text-[#000]' }}"
                data-aos="fade-up" data-aos-duration="1600">
                <div
                    class="rounded-full flex items-center justify-center {{ request()->routeIs('services.registration') ? 'w-12 h-12 sm:w-14 sm:h-14 bg-[#FF3217]' : 'w-12 h-12 sm:w-12 sm:h-12 bg-[#000]' }}">
                    <svg width="25" height="29" viewBox="0 0 25 29" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.036 12.6294L11.8015 21.6962C11.5925 22.0589 11.4697 22.4648 11.4455 22.8828C11.4104 23.4546 11.3349 24.7072 11.2648 25.8925C11.2027 26.9119 11.7232 27.8787 12.6078 28.3898C13.4924 28.9009 14.59 28.8671 15.4422 28.3048C16.4333 27.6495 17.481 26.9591 17.9584 26.6436C18.3076 26.413 18.5989 26.1042 18.8079 25.7415L24.0424 16.6747C24.7868 15.3842 24.3459 13.7351 23.0554 12.9908L20.7199 11.6423C19.4295 10.898 17.7804 11.3389 17.036 12.6294ZM21.5748 8.06495V4.04528C21.5748 1.81094 19.7639 0 17.5296 0H4.04528C2.97193 0 1.94308 0.4261 1.18527 1.18527C0.4261 1.94308 0 2.97193 0 4.04528V22.9233C0 25.1576 1.81094 26.9686 4.04528 26.9686H8.00966C8.754 26.9686 9.35809 26.3645 9.35809 25.6201C9.35809 24.8758 8.754 24.2717 8.00966 24.2717H4.04528C3.30095 24.2717 2.69686 23.6676 2.69686 22.9233V4.04528C2.69686 3.68795 2.83844 3.3441 3.09194 3.09194C3.3441 2.83844 3.68795 2.69686 4.04528 2.69686H17.5296C18.2739 2.69686 18.878 3.30095 18.878 4.04528V8.06495C18.878 8.80928 19.4821 9.41338 20.2264 9.41338C20.9707 9.41338 21.5748 8.80928 21.5748 8.06495ZM19.3715 13.9778L21.707 15.3262L16.4724 24.3931L13.9562 26.0543L14.1369 23.0446L19.3715 13.9778ZM6.74214 20.2264H9.67495C10.4193 20.2264 11.0234 19.6223 11.0234 18.878C11.0234 18.1337 10.4193 17.5296 9.67495 17.5296H6.74214C5.99781 17.5296 5.39371 18.1337 5.39371 18.878C5.39371 19.6223 5.99781 20.2264 6.74214 20.2264ZM6.74214 14.8327H12.6078C13.3521 14.8327 13.9562 14.2286 13.9562 13.4843C13.9562 12.7399 13.3521 12.1358 12.6078 12.1358H6.74214C5.99781 12.1358 5.39371 12.7399 5.39371 13.4843C5.39371 14.2286 5.99781 14.8327 6.74214 14.8327ZM6.74214 9.43899H14.8327C15.577 9.43899 16.1811 8.8349 16.1811 8.09057C16.1811 7.34623 15.577 6.74214 14.8327 6.74214H6.74214C5.99781 6.74214 5.39371 7.34623 5.39371 8.09057C5.39371 8.8349 5.99781 9.43899 6.74214 9.43899Z"
                            fill="white" />
                    </svg>
                </div>
                <span class="text-[10px] md:text-[16px] text-center">{{ __('messages.registration') }}</span>
            </a> --}}
        </div>

        <div className="w-full max-w-7xl mx-auto px-4">
            @yield('service-content')
        </div>
    </div>
@endsection
