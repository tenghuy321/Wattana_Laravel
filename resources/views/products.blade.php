@extends('layouts.master')

@section('content')
    <x-loading />
    <div class="w-full h-full bg-white">
        <div class="w-full min-h-screen text-[20px] md:text-[25px] bg-center bg-cover overflow-hidden pt-20 sm:pt-32 lg:pt-44 pb-10"
            style="background-image: url('{{ asset('assets/images/product_bg.png') }}');">

            <div class="flex flex-col space-y-2 justify-center w-full max-w-7xl mx-auto px-4 sm:px-10">
                <h1 data-aos="fade-right" data-aos-duration="1200" class="text-[#FF3217] font-[600]">
                    {{ $productTitle->title[app()->getLocale()] }}
                </h1>
                {{-- <p data-aos="fade-left" data-aos-duration="1200" class="text-[12px] sm:text-[14px] text-black">
                    {{ $productTitle->content[app()->getLocale()] }}
                </p> --}}
                <div data-aos="fade-left" data-aos-duration="1200"
                    class="prose max-w-none text-black prose-p:text-[12px] lg:prose-p:text-[14px] prose-p:my-1 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                    prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black prose-p:leading-[1.4] prose-h2:mt-2 prose-h1:mt-2 prose-h3:mt-2 prose-h1:leading-[1.4] prose-h2:leading-[1.4] prose-h3:leading-[1.4]
                    marker:text-black">
                    {!! $productTitle->content[app()->getLocale()] !!}
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 lg:gap-10 px-4 xl:px-10 pt-10">
                <div class="md:col-span-4 w-full h-full">
                    <ul
                        class="md:space-x-0 md:space-y-2 text-[16px]
                            md:h-[60vh] md:overflow-y-auto
                            flex items-center md:flex-col gap-2 md:gap-0
                            overflow-x-auto whitespace-nowrap px-0 md:px-2">
                        @foreach ($product_category as $c)
                            <li class="flex-shrink-0 md:w-full">
                                <button type="button"
                                    class="filter-btn flex items-center justify-between w-full px-4 py-2 rounded
                                    {{ $selectedCategorySlug === $c->slug ? 'bg-[#00cde8] text-[#000] invert font-[500]' : 'bg-gray-100 text-black' }}"
                                    onclick="filterProducts('{{ $c->slug }}')">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset($c->icon) }}" alt="" class="w-5 h-5">
                                        <p class="capitalize text-[14px] md:text-[16px]">{{ $c->name[app()->getLocale()] }}
                                        </p>
                                    </div>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                @php $popupIndex = 0; @endphp

                <div class="md:col-span-8 h-full">
                    <div
                        class="text-[#580B0C] text-[16px] xl:text-[20px] text-center flex flex-col items-center justify-start">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 h-[60vh] overflow-y-auto w-full">
                            @forelse ($productImages as $product)
                                @php $images = json_decode($product->image, true); @endphp
                                @if (!empty($images))
                                    @foreach ($images as $img)
                                        {{-- Image --}}
                                        <img src="{{ asset($img) }}" alt=""
                                            onclick="openPopup('popup{{ $popupIndex }}')"
                                            class="w-full md:w-[340px] lg:w-[300px] xl:w-[340px] h-[400px] sm:h-[230px] lg:h-[250px] xl:h-[300px] object-cover object-left">

                                        {{-- Popup --}}
                                        <div id="popup{{ $popupIndex }}"
                                            class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden px-2 z-[999]">
                                            <div
                                                class="relative bg-white rounded-lg shadow-lg px-2 py-10 text-end w-full max-w-5xl mx-auto h-[80%]">
                                                <button
                                                    class="absolute top-2 right-4 bg-[#FF3217] text-[12px] text-[#fff] p-2 w-8 h-8 rounded-full shadow-md hover:bg-[#FF3217]"
                                                    onclick="closePopup('popup{{ $popupIndex }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                                                        class="size-4">
                                                        <path strokeLinecap="round" strokeLinejoin="round"
                                                            d="M6 18 18 6M6 6l12 12" />
                                                    </svg>

                                                </button>
                                                <img src="{{ asset($img) }}"
                                                    class="w-full h-full object-contain object-center rounded-sm" />
                                            </div>
                                        </div>

                                        @php $popupIndex++; @endphp
                                    @endforeach
                                @else
                                    <p>No images</p>
                                @endif
                            @empty
                                <p>No products found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function filterProducts(product_category) {
            const url = new URL(window.location.href);
            url.searchParams.set('product_category', product_category);
            window.location.href = url.toString();
        }

        function openPopup(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closePopup(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endsection
