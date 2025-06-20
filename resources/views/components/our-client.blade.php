@props(['service_client', 'clients'])
<style>
    @keyframes scroll {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-scroll {
        animation: scroll 20s linear infinite;
    }
</style>

<section class="w-full h-full py-6 md:py-20 max-w-7xl mx-auto px-2 overflow-hidden">
    <h1 data-aos="fade-up" data-aos-duration="1400"
        class="text-[20px] md:text-[25px] text-[#FF3217] text-center font-semibold py-6 md:py-10">
        {{ $service_client->title[app()->getLocale()] }}
    </h1>

    <div class="relative w-full">
        <div class="flex gap-6 items-center animate-scroll whitespace-nowrap">
            @foreach ($clients as $item)
                <div class="min-w-[200px] md:min-w-[250px] bg-white rounded shadow p-4">
                    <img src="{{ asset($item->image) }}" alt="Client {{ $item->order }}"
                        class="w-full h-auto object-cover">
                </div>
            @endforeach
            {{-- Duplicate to create infinite loop effect --}}
            @foreach ($clients as $item)
                <div class="min-w-[200px] md:min-w-[250px] bg-white rounded shadow p-4">
                    <img src="{{ asset($item->image) }}" alt="Client {{ $item->order }}"
                        class="w-full h-auto object-contain">
                </div>
            @endforeach
        </div>
    </div>
</section>
