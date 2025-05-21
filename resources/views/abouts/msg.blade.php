@extends('about')

@section('about-content')
    <div
        class='w-full h-full min-h-[25vh] max-w-4xl mx-auto flex flex-col sm:flex-row items-center justify-center gap-4 md:gap-10 overflow-hidden pb-20 px-2'>
        <img data-aos="fade-right" data-aos-duration="1600" src="{{ asset($msg->image) }}" alt="ceo"
            class='w-40 h-40 object-cover object-center mt-10 sm:mt-0' />
        <div data-aos="fade-left" data-aos-duration="1600" class='pb-20 sm:pb-0 text-center sm:text-start'>
            <h1 class='text-[16px] md:text-[20px] font-[500] text-[#FF3217]'>{{ $msg->title[app()->getLocale()] }}</h1>
            <div class="prose text-black prose-p:text-[12px] md:prose-p:text-[12px] prose-p:leading-[1.6] prose-p:my-2 prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2
                prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black
                marker:text-black prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]">
                {!! $msg->content[app()->getLocale()] !!}
            </div>
        </div>
    </div>
@endsection
