@extends('about')

@section('about-content')
    <div data-aos="fade-up" data-aos-duration="1200"
        class="text-center w-full min-h-[25vh] md:max-w-[600px] mx-auto mt-10 lg:mt-0 xl:mt-10 prose-p:text-[12px] md:prose-p:text-[14px] px-4 prose max-w-none text-black prose-p:leading-[1.3] prose-p:my-2 prose-h1:mt-2 prose-h2:mt-2 prose-h3:mt-2
                    prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                    marker:text-black">
        {!! $mission->content[app()->getLocale()] !!}

    </div>
@endsection
