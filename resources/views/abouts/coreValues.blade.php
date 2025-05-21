@extends('about')

@section('about-content')
    <div class="w-full min-h-[25vh] max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 py-10 text-black text-[12px] md:text-[14px] px-4">
        @foreach ($core_values as $core)
            <div x-data="{ expanded: false }" class="core-value-card text-[#000] rounded-lg" data-aos="fade-up"
                data-aos-duration="1200">
                <h1 class="font-[600] text-[20px] text-[#FF3217]">{{ $core->order }}</h1>

                <p class="h-[2rem] lg:h-[3rem] xl:h-[2rem] font-[400] text-[14px] text-[#FF3217]">
                    {{ $core->title[app()->getLocale()] }}
                </p>

                <div class="prose max-w-none text-black prose-p:text-[11px] prose-p:leading-[1.3] prose-p:my-2 prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                    prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black
                    marker:text-black " :class="expanded ? 'line-clamp-none' : 'line-clamp-2'">
                    {!! $core->content[app()->getLocale()] !!}
                </div>

                <!-- Read More button -->
                <button @click="expanded = !expanded"
                    class="toggle-button block px-3 py-1 border border-red-500 mt-4 md:mt-2 rounded-full text-[11px] text-[#FF3217]"
                    x-text="expanded ? '{{ __('messages.Read Less') }}' : '{{ __('messages.Read More') }}'"></button>
            </div>
        @endforeach
    </div>
@endsection
