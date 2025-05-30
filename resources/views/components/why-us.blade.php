@props(['why_us', 'service_why_us', 'id_why'])

<section id='{{ Str::slug($id_why->title['en']) }}' class="bg-[#e8e9ed] py-10">
    <h1 data-aos="fade-up" data-aos-duration="1400" class="text-[20px] md:text-[25px] text-[#FF3217] text-center font-[600] py-6 md:py-10">{{ $service_why_us->title[app()->getLocale()] }}</h1>

    <div data-aos="fade-up" data-aos-duration="1200"
        class="flex flex-wrap items-stretch justify-center w-full max-w-4xl mx-auto py-4 px-4 overflow-hidden gap-4 md:gap-6">
        @foreach ($why_us as $item)
            <div
                class="flex flex-col justify-between text-[12px] w-full md:w-[30%] text-center p-6 rounded-lg bg-white shadow h-full transform hover:-translate-y-2 transition-all duration-300">
                <h1 class="text-[22px] text-[#FF3217]">0{{ $item->order }}</h1>
                <div
                    class="h-[50px] prose max-w-none text-black prose-p:text-[12px] prose-p:leading-[1.2] prose-p:my-2 prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black
                marker:text-black">
                    {!! $item->title[app()->getLocale()] !!}
                </div>
            </div>
        @endforeach
    </div>


</section>
