@props(['product_categories', 'productTitle', 'productImages', 'service_product_unique', 'product_unique', 'id_products'])

<section id="{{ Str::slug($id_products->title['en']) }}" class="w-full h-full bg-white">
    <div class="w-full min-h-screen text-[20px] md:text-[25px] bg-center bg-cover overflow-hidden py-6 md:py-10">

        <div class="flex flex-col space-y-2 justify-center w-full max-w-7xl mx-auto px-4 sm:px-10">
            <h1 data-aos="fade-right" data-aos-duration="1200" class="text-[#FF3217] font-[600]">
                {{ $productTitle->title[app()->getLocale()] }}
            </h1>
            <div data-aos="fade-left" data-aos-duration="1200"
                class="prose max-w-none text-black prose-p:text-[12px] lg:prose-p:text-[14px] prose-p:my-1 prose-h1:text-[#ff3217] prose-h2:text-[#ff3217] prose-h3:text-[#ff3217]
                prose-headings:text-black prose-p:text-black prose-strong:text-black prose-a:text-black prose-li:text-black prose-blockquote:text-black prose-p:leading-[1.4] prose-h2:mt-2 prose-h1:mt-2 prose-h3:mt-2 prose-h1:leading-[1.4] prose-h2:leading-[1.4] prose-h3:leading-[1.4]
                marker:text-black">
                {!! $productTitle->content[app()->getLocale()] !!}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 lg:gap-10 px-4 xl:px-10 pt-10">
            <div class="md:col-span-3 w-full h-full">
                <ul
                    class="md:space-x-0 md:space-y-2 text-[16px]
                        md:h-[60vh] md:overflow-y-auto
                        flex items-center md:flex-col gap-2 md:gap-0
                        overflow-x-auto whitespace-nowrap px-0 md:px-2">

                    <li class="filter-btn flex items-center justify-between w-full px-4 py-2 rounded hover:bg-[#FF3217] hover:text-[#fff] transition-all duration-500
                        {{ request('product_category') === null || request('product_category') === 'all' ? 'bg-[#FF3217] text-[#fff] font-[500]' : 'bg-gray-100 text-black' }}"
                        data-category="all" onclick="filterProducts('all')">{{ __('messages.all') }}</li>

                    @foreach ($product_categories as $c)
                        <li class="filter-btn flex items-center justify-between w-full px-4 py-2 rounded hover:bg-[#FF3217] hover:text-[#fff] transition-all duration-500
                                {{ request('product_category') === $c->slug ? 'bg-[#FF3217] text-[#fff] font-[500]' : 'bg-gray-100 text-black' }}"
                            data-category="{{ $c->slug }}" onclick="filterProducts('{{ $c->slug }}')">
                            {{ $c->name[app()->getLocale()] }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="md:col-span-9 h-full">
                <div
                    class="text-[#580B0C] text-[16px] xl:text-[20px] text-center flex flex-col items-center justify-start h-[60vh] overflow-y-auto">
                    <div class="columns-2 md:columns-3 gap-4" id="product-gallery">
                        @php $allImages = []; @endphp
                        @forelse ($productImages as $product)
                            @php
                                $images = json_decode($product->image, true);
                                if (!empty($images)) {
                                    foreach ($images as $index => $img) {
                                        $allImages[] = [
                                            'id' => 'popup-' . $product->id . '-' . $index,
                                            'src' => asset($img),
                                            'product_id' => $product->id,
                                            'index' => $index,
                                        ];
                                    }
                                }
                            @endphp
                            @if (!empty($images))
                                @foreach ($images as $index => $img)
                                    <div class="break-inside-avoid overflow-hidden rounded-[5px] mb-4">
                                        <img src="{{ asset($img) }}" alt=""
                                            onclick="openPopup('popup-{{ $product->id }}-{{ $index }}', {{ $loop->parent->index * count($images) + $loop->index }})"
                                            class="w-full h-full object-cover cursor-pointer transition-transform duration-300 hover:scale-105">
                                    </div>
                                @endforeach
                            @endif
                        @empty
                            <p>No products found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="w-full h-full text-[12px] text-[#000] my-4 xl:my-4">
    <h1 data-aos="fade-up" data-aos-duration="1200"
        class="text-center text-[20px] md:text-[25px] font-[600] text-[#FF3217] py-6 md:py-10">
        {{ $service_product_unique->title[app()->getLocale()] }}
    </h1>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 max-w-7xl mx-auto px-4 justify-items-center">
        @foreach ($product_unique as $index => $item)
            <div class="w-full text-center p-4 bg-white rounded shadow" data-aos="fade-up" data-aos-duration="1200">
                <h1 class="text-[18px] text-[#FF3217] font-bold">0{{ $index + 1 }}</h1>
                <p class="text-sm mt-2">{{ $item->title[app()->getLocale()] }}</p>
            </div>
        @endforeach
    </div>

</div>

<!-- Lightbox Modal -->
<div id="lightbox-modal"
    class="fixed inset-0 bg-black/0 flex items-center justify-center px-2 z-[999] opacity-0 pointer-events-none transition-all duration-300">
    <div class="absolute inset-0 bg-black/80" onclick="closeLightbox()"></div>
    <div
        class="px-2 py-20 md:py-10 w-full max-w-7xl mx-auto h-full md:h-[90%] relative transform scale-90 transition-all duration-300">
        <button
            class="absolute top-2 right-2 md:right-4 bg-[#FF3217] text-[12px] text-[#fff] p-2 w-8 h-8 rounded-full shadow-md hover:bg-[#FF3217] z-50 transition-transform duration-200 hover:scale-110"
            onclick="closeLightbox()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                stroke="currentColor" class="size-4">
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        <button
            class="hidden md:flex absolute left-4 top-1/2 transform -translate-y-1/2 text-[12px] text-[#fff] p-2 w-12 h-12 z-50 transition-transform duration-200 hover:scale-110"
            onclick="navigateLightbox(-1)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                stroke="currentColor" class="size-10">
                <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>

        <button
            class="hidden md:flex absolute right-4 top-1/2 transform -translate-y-1/2 text-[12px] text-[#fff] p-2 w-12 h-12 z-50 transition-transform duration-200 hover:scale-110"
            onclick="navigateLightbox(1)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                stroke="currentColor" class="size-10">
                <path strokeLinecap="round" strokeLinejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        <img id="lightbox-image"
            class="w-full h-full object-contain object-center rounded-sm transform transition-transform duration-300"
            src="" />
    </div>
</div>

<style>
    /* Animation for lightbox */
    .lightbox-open {
        opacity: 1;
        pointer-events: auto;
    }

    .lightbox-open>div {
        transform: scale(1);
    }

    .lightbox-image-enter {
        animation: zoomIn 0.3s ease-out forwards;
    }

    .lightbox-image-exit {
        animation: zoomOut 0.3s ease-out forwards;
    }

    @keyframes zoomIn {
        from {
            transform: scale(0.9);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes zoomOut {
        from {
            transform: scale(1);
            opacity: 1;
        }

        to {
            transform: scale(0.9);
            opacity: 0;
        }
    }
</style>

<script>
    // Store all images data
    const allImages = @json($allImages);
    let currentImageIndex = 0;

    function filterProducts(product_category) {
        const url = new URL(window.location.href);
        url.searchParams.set('product_category', product_category);
        window.location.href = url.toString();
    }

    function openPopup(id, index) {
        currentImageIndex = index;
        const image = allImages.find(img => img.id === id);
        if (image) {
            const lightbox = document.getElementById('lightbox-modal');
            const lightboxImage = document.getElementById('lightbox-image');

            // Reset animation classes
            lightboxImage.classList.remove('lightbox-image-enter', 'lightbox-image-exit');

            // Set the image source
            lightboxImage.src = image.src;

            // Show lightbox with animation
            lightbox.classList.remove('pointer-events-none');
            lightbox.classList.add('lightbox-open');
            document.body.style.overflow = 'hidden';

            // Add enter animation after a small delay to allow DOM update
            setTimeout(() => {
                lightboxImage.classList.add('lightbox-image-enter');
            }, 10);
        }
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox-modal');
        const lightboxImage = document.getElementById('lightbox-image');

        // Add exit animation
        lightboxImage.classList.remove('lightbox-image-enter');
        lightboxImage.classList.add('lightbox-image-exit');

        // Hide lightbox after animation completes
        setTimeout(() => {
            lightbox.classList.remove('lightbox-open');
            lightbox.classList.add('pointer-events-none');
            document.body.style.overflow = 'auto';

            // Remove exit animation class
            lightboxImage.classList.remove('lightbox-image-exit');
        }, 300);
    }

    function navigateLightbox(direction) {
        currentImageIndex += direction;

        // Wrap around if at beginning or end
        if (currentImageIndex < 0) {
            currentImageIndex = allImages.length - 1;
        } else if (currentImageIndex >= allImages.length) {
            currentImageIndex = 0;
        }

        const image = allImages[currentImageIndex];
        const lightboxImage = document.getElementById('lightbox-image');

        // Add exit animation
        lightboxImage.classList.remove('lightbox-image-enter');
        lightboxImage.classList.add('lightbox-image-exit');

        // Change image after animation completes
        setTimeout(() => {
            lightboxImage.src = image.src;
            lightboxImage.classList.remove('lightbox-image-exit');
            lightboxImage.classList.add('lightbox-image-enter');
        }, 300);
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        const lightbox = document.getElementById('lightbox-modal');
        if (lightbox && lightbox.classList.contains('lightbox-open')) {
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                navigateLightbox(-1);
            } else if (e.key === 'ArrowRight') {
                navigateLightbox(1);
            }
        }
    });
</script>
