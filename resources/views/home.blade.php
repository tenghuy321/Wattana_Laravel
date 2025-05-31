@extends('layouts.master')

@section('css')
    <style>
        .active-room {
            color: #FF3217 !important;
        }

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

            {{-- <div class="absolute bottom-4 left-4 z-30">
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
            </div> --}}
        </div>

    </section>

    <x-products :product_categories="$product_categories" :productTitle="$productTitle" :productImages="$productImages" :service_product_unique="$service_product_unique" :product_unique="$product_unique" />

    {{-- <div class='relative w-full min-h-screen bg-center bg-cover flex flex-col items-center justify-center overflow-hidden mt-32 md:m-5'>
        <h1 class='text-[20px] md:text-[25px] text-[#FF3217] font-[600] tracking-wider'>{{ __('messages.customization') }}</h1>
        <div
            class='grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 items-center justify-center mt-10 max-w-7xl mx-auto lg:px-4'>
            <div data-aos="fade-right" data-aos-duration="1200"
                class="flex flex-col space-y-4 justify-center items-center lg:items-start order-2 lg:order-none mt-10 sm:mt-10 mb-0 sm:mb-20 lg:mb-0 lg:mt-0 px-4">
                <img id="preview1" src="{{ asset('assets/images/default1.jpg') }}" alt="Room Preview"
                    class="w-full md:w-[80%] lg:w-[200px] h-[150px] lg:h-[120px] ml-0 lg:ml-6 object-cover rounded-md hover:scale-110 transition-all duration-500" />
                <img id="preview2" src="{{ asset('assets/images/default2.jpg') }}" alt="Room Preview"
                    class="w-full md:w-[80%] lg:w-[200px] h-[150px] lg:h-[120px] object-cover rounded-md hover:scale-110 transition-all duration-500" />
                <img id="preview3" src="{{ asset('assets/images/default3.jpg') }}" alt="Room Preview"
                    class="w-full md:w-[80%] lg:w-[200px] h-[150px] lg:h-[120px] ml-0 lg:ml-6 object-cover rounded-md hover:scale-110 transition-all duration-500" />
            </div>
            <div data-aos="fade-up" data-aos-duration="1200"
                class="relative w-full max-w-5xl mx-auto mt-5 lg:mt-10 col-span-1 sm:col-span-2 lg:col-span-1 order-1 lg:order-none px-2">
                <img src="{{ asset('assets/images/customization.png') }}" alt="3D Floor Plan" class="w-full h-auto" />

                <!-- Living Room -->
                <div class="absolute left-[2%] top-[40%] sm:left-[6%] sm:top-[45%] md:left-[6%] md:top-[45%] lg:-left-[5%] lg:top-[40%] cursor-pointer"
                    onclick="showRoomImages('living-room')">
                    <div class="relative flex space-x-2 items-center">
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Living Room Space') }}</span>
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                    </div>
                </div>

                <!-- Glass -->
                <div class="absolute left-[20%] top-[70%] sm:left-[25%] sm:top-[70%] md:left-[30%] md:top-[70%] lg:left-[17%] lg:top-[68%] cursor-pointer"
                    onclick="showRoomImages('glass')">
                    <div class="relative flex space-x-2 items-center">
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Door glass') }}</span>
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                    </div>
                </div>

                <!-- Kitchen -->
                <div class="absolute left-[6%] top-[10%] sm:left-[5%] sm:top-[18%] md:left-[5%] md:top-[20%] lg:left-[-5%] lg:top-[14%] cursor-pointer"
                    onclick="showRoomImages('kitchen')">
                    <div class="relative flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 items-center">
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Kitchen Space') }}</span>
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                    </div>
                </div>

                <!-- wardrobe -->
                <div class="absolute left-[38%] top-[1%] sm:left-[42%] sm:top-[6%] md:left-[42%] md:top-[6%] lg:left-[40%] lg:top-[-5%] cursor-pointer"
                    onclick="showRoomImages('wardrobe')">
                    <div class="relative flex flex-col space-y-2 items-center">
                        <span
                            class="bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Wardrobe') }}</span>
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                    </div>
                </div>

                <!-- mirror -->
                <div class="absolute left-[25%] top-[16%] sm:left-[35%] sm:top-[15%] md:left-[35%] md:top-[15%] lg:left-[32%] lg:top-[10%] cursor-pointer"
                    onclick="showRoomImages('mirror')">
                    <div class="relative flex flex-row sm:flex-col space-x-2 sm:space-x-0 sm:space-y-2 items-center">
                        <span
                            class="bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Mirror') }}</span>
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                    </div>
                </div>

                <!-- Living Room Cabnet -->
                <div class="absolute left-[20%] top-[50%] sm:left-[30%] sm:top-[48%] md:left-[30%] md:top-[50%] lg:left-[15%] lg:top-[48%] cursor-pointer"
                    onclick="showRoomImages('living-room-cabnet')">
                    <div class="relative flex space-x-2 items-center">
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Living Room Cabnet') }}</span>
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                    </div>
                </div>

                <!-- Bathroom Space -->
                <div class="absolute left-[50%] top-[10%] sm:left-[50%] sm:top-[13%] md:left-[50%] md:top-[15%] lg:left-[50%] lg:top-[8%] xl:left-[50%] xl:top-[10%] cursor-pointer"
                    onclick="showRoomImages('bathroom-space')">
                    <div class="relative flex space-x-2 items-center">
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Bathroom Space') }}</span>
                    </div>
                </div>

                <!-- Study Space -->
                <div class="absolute left-[63%] top-[18%] sm:left-[65%] sm:top-[20%] md:left-[65%] md:top-[20%] lg:left-[65%] lg:top-[18%] cursor-pointer"
                    onclick="showRoomImages('stady-space')">
                    <div class="relative flex space-x-2 items-center">
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Study Space') }}</span>
                    </div>
                </div>

                <!-- Book Cabinet -->
                <div class="absolute left-[75%] top-[25%] sm:left-[80%] sm:top-[25%] md:left-[80%] md:top-[25%] lg:left-[80%] lg:top-[26%] xl:left-[80%] xl:top-[25%] cursor-pointer"
                    onclick="showRoomImages('book-cabinet')">
                    <div class="relative flex space-x-2 items-center">
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Book Cabinet') }}</span>
                    </div>
                </div>

                <!-- Glass Fix -->
                <div class="absolute left-[82%] top-[35%] sm:left-[88%] sm:top-[35%] md:left-[88%] md:top-[35%] lg:left-[88%] lg:top-[35%] cursor-pointer"
                    onclick="showRoomImages('glass-fix')">
                    <div class="relative flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2 items-center">
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Glass Fix') }}</span>
                    </div>
                </div>

                <!-- Balcony -->
                <div class="absolute left-[20%] top-[80%] sm:left-[30%] sm:top-[80%] md:left-[30%] md:top-[80%] lg:left-[20%] lg:top-[78%] cursor-pointer"
                    onclick="showRoomImages('balcony')">
                    <div class="relative flex space-x-2 items-center">
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Balcony Space') }}</span>
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                    </div>
                </div>

                <!-- Railing  -->
                <div class="absolute left-[50%] top-[78%] sm:left-[50%] sm:top-[82%] md:left-[50%] md:top-[82%] lg:left-[50%] lg:top-[78%] cursor-pointer"
                    onclick="showRoomImages('railing')">
                    <div class="relative flex flex-col space-y-2 items-center">
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                        <span
                            class="bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Railing') }}</span>
                    </div>
                </div>

                <!-- Glass Windows -->
                <div class="absolute left-[62%] top-[45%] sm:left-[60%] sm:top-[50%] md:left-[65%] md:top-[45%] lg:left-[50%] lg:top-[50%] xl:left-[55%] xl:top-[48%] cursor-pointer"
                    onclick="showRoomImages('glass-window')">
                    <div class="relative flex flex-col space-y-2 items-center">
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                        <span
                            class="sm:ml-10 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Glass Windows') }}</span>
                    </div>
                </div>

                <!-- Bedroom Space -->
                <div class="absolute left-[55%] top-[35%] sm:left-[60%] sm:top-[35%] md:left-[60%] md:top-[35%] lg:left-[55%] lg:top-[35%] cursor-pointer"
                    onclick="showRoomImages('bedroom')">
                    <div class="relative flex space-x-2 items-center">
                        <div class="w-1 h-1 rotate-45 bg-[#FF3217]"></div>
                        <span
                            class="ml-2 bg-white text-[8px] xl:text-[10px] px-2 py-1 rounded shadow whitespace-nowrap">{{ __('messages.Bedroom Space') }}</span>
                    </div>
                </div>
            </div>

            <div data-aos="fade-left" data-aos-duration="1200"
                class="flex flex-col space-y-4 justify-center items-center lg:items-end order-3 lg:order-none mt-4 sm:mt-10 mb-20 lg:mb-0 lg:mt-0 px-4">
                <img id="preview4" src="{{ asset('assets/images/default4.jpg') }}" alt="Room Preview"
                    class="w-full md:w-[80%] lg:w-[200px] h-[150px] lg:h-[120px] mr-0 lg:mr-6 object-cover rounded-md hover:scale-110 transition-all duration-500" />
                <img id="preview5" src="{{ asset('assets/images/default5.jpg') }}" alt="Room Preview"
                    class="w-full md:w-[80%] lg:w-[200px] h-[150px] lg:h-[120px] object-cover rounded-md hover:scale-110 transition-all duration-500" />
                <img id="preview6" src="{{ asset('assets/images/default6.jpg') }}" alt="Room Preview"
                    class="w-full md:w-[80%] lg:w-[200px] h-[150px] lg:h-[120px] mr-0 lg:mr-6 object-cover rounded-md hover:scale-110 transition-all duration-500" />
            </div>
        </div>
    </div> --}}

    <x-our-service :sub_service="$sub_service" :service_title="$service_title" />

    <div class="flex items-center justify-center px-4" data-aos="fade-up" data-aos-duration="1400">
        <img src="{{ asset('assets/images/customization.png') }}" alt="3D Floor Plan" class="w-[80%] md:w-1/2 h-auto" />
    </div>
    <x-our-client :service_client="$service_client" :clients="$clients" />
    <x-contact :contact="$contact" />
@endsection
@section('js')
    <script>
        const roomImages = {
            'living-room': {
                previews: [
                    '{{ asset('assets/images/living1.jpg') }}',
                    '{{ asset('assets/images/living1.jpg') }}',
                    '{{ asset('assets/images/living1.jpg') }}',
                    '{{ asset('assets/images/living1.jpg') }}',
                    '{{ asset('assets/images/living1.jpg') }}',
                    '{{ asset('assets/images/living1.jpg') }}'
                ]
            },
            'glass': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'kitchen': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'wardrobe': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'mirror': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'living-room-cabnet': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'bathroom-space': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },

            'stady-space': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'book-cabinet': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'glass-fix': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },

            'balcony': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'railing': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'glass-window': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            },
            'bedroom': {
                previews: [
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}',
                    '{{ asset('assets/images/testing.jpg') }}'
                ]
            }
            // Continue for all other rooms
        };

        function showRoomImages(roomType) {
            // Remove active class from all room elements
            document.querySelectorAll('[onclick^="showRoomImages"]').forEach(el => {
                el.classList.remove('active-room');
            });

            // Add active class to the clicked room
            const clickedElement = document.querySelector(`[onclick="showRoomImages('${roomType}')"]`);
            if (clickedElement) {
                clickedElement.classList.add('active-room');
            }

            // Update preview images
            const images = roomImages[roomType].previews;
            document.getElementById('preview1').src = images[0];
            document.getElementById('preview2').src = images[1];
            document.getElementById('preview3').src = images[2];
            document.getElementById('preview4').src = images[3];
            document.getElementById('preview5').src = images[4];
            document.getElementById('preview6').src = images[5];
        }

        // Set Living Room as default active on load
        document.addEventListener('DOMContentLoaded', function() {
            showRoomImages('living-room');
        });
    </script>
@endsection
