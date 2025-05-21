@extends('service')

@section('service-content')
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full max-w-4xl mx-auto pb-[4rem] overflow-hidden px-2">
        @foreach ($sub_service as $service)
            <div data-aos="fade-right" data-aos-duration="1600"
                class="w-full h-full bg-[#C10E00] rounded-lg text-[#fff] text-[20px] font-[300] flex flex-col items-center justify-center space-y-4 py-6">
                <img src="{{ asset($service->icon) }}" alt="" class="w-10 h-10 object-cover">

                <span>{{ $service->title[app()->getLocale()] }}</span>
                <div class="px-2 prose max-w-none text-center text-white prose-p:text-[12px] prose-p:my-0 prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                    prose-headings:text-white prose-p:text-white prose-strong:text-white prose-a:text-white prose-li:text-white prose-blockquote:text-white
                    marker:text-white">
                    {!! $service->content[app()->getLocale()] !!}
                </div>
            </div>
        @endforeach
    </div>
@endsection
