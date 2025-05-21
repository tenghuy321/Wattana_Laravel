@extends('service')

@section('service-content')
    <div class="flex flex-wrap items-start justify-center w-full max-w-4xl mx-auto pb-[4rem] md:pb-0 overflow-hidden">
        {{-- <div data-aos="fade-up" data-aos-duration="1200" class="flex flex-col text-[12px] w-full md:w-1/3 text-center p-5">
            <h1 class="text-[22px] text-[#FF3217]">01</h1>
            <p class="h-[2rem]">{{__("messages.why_us_con_1")}}</p>
        </div>
        <div data-aos="fade-up" data-aos-duration="1300" class="flex flex-col text-[12px] w-full md:w-1/3 text-center p-5">
            <h1 class="text-[22px] text-[#FF3217]">02</h1>
            <p class="h-[2rem]">{{__("messages.why_us_con_2")}}</p>
        </div>
        <div data-aos="fade-up" data-aos-duration="1600"
            class="flex flex-col text-[12px] w-full md:w-1/3 text-center p-5">
            <h1 class="text-[22px] text-[#FF3217]">03</h1>
            <p class="h-[2rem]">{{__("messages.why_us_con_3")}}</p>
        </div>
        <div data-aos="fade-up" data-aos-duration="1800"
            class="flex flex-col text-[12px] w-full md:w-1/3 text-center p-5">
            <h1 class="text-[22px] text-[#FF3217]">04</h1>
            <p class="h-[2rem]">{{__("messages.why_us_con_4")}}</p>
        </div>
        <div data-aos="fade-up" data-aos-duration="2000"
            class="flex flex-col text-[12px] w-full md:w-1/3 text-center p-5">
            <h1 class="text-[22px] text-[#FF3217]">05</h1>
            <p class="h-[2rem]">{{__("messages.why_us_con_5")}}</p>
        </div> --}}

        @foreach ($why_us as $item)
            <div data-aos="fade-up" data-aos-duration="1200" class="flex flex-col text-[12px] w-full md:w-1/3 text-center p-5">
                <h1 class="text-[22px] text-[#FF3217]">0{{ $item->order }}</h1>
                <div class="prose max-w-none text-black prose-p:text-[12px] prose-p:leading-[1.2] prose-p:my-2 prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                    prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black
                    marker:text-black">
                    {!! $item->title[app()->getLocale()] !!}
                </div>
            </div>
        @endforeach
    </div>
@endsection
