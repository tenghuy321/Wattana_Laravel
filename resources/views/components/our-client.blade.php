
@props(['service_client', 'clients', 'id_client'])
<section id="{{ Str::slug($id_client->title['en']) }}" class="w-full h-full py-6 md:py-20">
    <h1 data-aos="fade-up" data-aos-duration="1400" class="text-[20px] md:text-[25px] text-[#FF3217] text-center font-semibold py-6 md:py-10">{{ $service_client->title[app()->getLocale()] }}</h1>

    <div data-aos="fade-up" data-aos-duration="1600" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 items-center gap-6 px-4 max-w-7xl mx-auto">
        @foreach ($clients as $item)
            <img src="{{ asset($item->image) }}" alt="Client {{$item->order}}" class="w-full h-auto object-contain p-4 bg-white rounded shadow">
        @endforeach
    </div>
</section>

