@extends('service')

@section('service-content')
    <div class='w-full max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 px-4 pb-[2rem] overflow-hidden'>
        @foreach ($registration as $item)
            <img data-aos="fade-right" data-aos-duration="1600" src="{{ asset($item->image) }}" alt=""
                class='w-full h-full object-cover' />
        @endforeach
    </div>
@endsection
