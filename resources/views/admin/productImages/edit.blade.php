<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold">Edit Product Image</h2>
        <form action="{{ route('product_image.update', $productImage->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent

            <!-- Dropzone for Image -->
            <div>
                <label for="dropzone-file{{ $productImage->id }}" id="drop-area"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">

                    <input id="dropzone-file{{ $productImage->id }}" type="file" class="hidden" name="images[]"
                        accept="image/*" multiple onchange="uploadImages(event)" />
                    <p class="mt-2 text-sm text-gray-500">Click or drag images here to upload</p>
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <!-- Preview Container -->
            <div id="img-preview"
                class="flex flex-wrap gap-2 justify-center items-center w-full h-full bg-gray-50 rounded-md overflow-y-auto p-4">
                @php
                    $images = json_decode($productImage->image, true);
                @endphp

                @if (!empty($images))
                    @foreach ($images as $img)
                        <div class="relative group">
                            <img src="{{ asset($img) }}" alt="Uploaded Image"
                                class="w-20 h-20 object-cover rounded border" />
                            <button type="button"
                                class="absolute -top-2 -right-2 bg-[#FF3217] text-white flex items-center justify-center rounded-full w-6 h-6"
                                onclick="removeExistingImage('{{ $img }}', this)">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    strokeWidth={2} stroke="currentColor" class="w-4 h-4">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>


                            </button>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-400 text-sm">No images available</p>
                @endif
            </div>

            <input type="hidden" name="removed_images" id="removed_images" />

            <div>
                <label for="product_category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select disabled
                    class="w-full rounded-md mt-1 focus:ring-[#FF3217] focus:border-[#FF3217] text-sm text-[#000]"
                    name="product_category_id" id="product_category_id">
                    <option value="">Select One</option>
                    @foreach ($cats as $c)
                        <option value="{{ $c->id }}"
                            {{ $c->id == $productImage->product_category_id ? 'selected' : '' }}>
                            {{ $c->name['en'] ?? '' }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('product_category_id')" />
            </div>

            <div class="flex justify-between">
                <a href="{{ route('product_image.index') }}"
                    class="border border-[#FF3217] hover:!bg-[#FF3217] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#FF3217]">
                    Back
                </a>

                <button type="submit"
                    class="bg-[#FF3217] text-white px-4 py-1 md:px-6 rounded-[5px] hover:!text-[#415464]">Submit</button>
            </div>
        </form>
    </div>

    <script>
        let selectedImages = []; // newly added files
        let removedImages = []; // existing images marked for removal
        const previewContainer = document.getElementById("img-preview");
        const removedImagesInput = document.getElementById('removed_images');
        const fileInput = document.getElementById("dropzone-file{{ $productImage->id }}");

        function uploadImages(event) {
            const files = Array.from(event.target.files);
            selectedImages.push(...files);
            renderPreview();
        }

        function renderPreview() {
            // Clear all previews (existing + new)
            previewContainer.innerHTML = '';

            // Render existing images (excluding removed ones)
            @php
                $images = json_decode($productImage->image, true) ?? [];
            @endphp
            let existingImages = @json($images);

            existingImages.forEach(img => {
                if (!removedImages.includes(img)) {
                    const wrapper = document.createElement('div');
                    wrapper.classList.add('relative', 'group');

                    const imageEl = document.createElement('img');
                    imageEl.src = "{{ asset('') }}" + img;
                    imageEl.className = "w-20 h-20 object-cover rounded border";

                    const btn = document.createElement('button');
                    btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        strokeWidth={2} stroke="currentColor" class="w-4 h-4">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>`;
                    btn.type = 'button';
                    btn.className = "absolute -top-2 -right-2 bg-[#FF3217] text-white flex items-center justify-center rounded-full w-6 h-6";
                    btn.onclick = () => removeExistingImage(img, btn);

                    wrapper.appendChild(imageEl);
                    wrapper.appendChild(btn);
                    previewContainer.appendChild(wrapper);
                }
            });

            // Render selected new images
            selectedImages.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const wrapper = document.createElement('div');
                    wrapper.classList.add('relative', 'group');

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = "w-20 h-20 object-cover rounded border";

                    const btn = document.createElement('button');
                    btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        strokeWidth={2} stroke="currentColor" class="w-4 h-4">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>`;
                    btn.type = 'button';
                    btn.className = "absolute -top-2 -right-2 bg-[#FF3217] text-white flex items-center justify-center rounded-full w-6 h-6";
                    btn.onclick = () => {
                        selectedImages.splice(index, 1);
                        renderPreview();
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(btn);
                    previewContainer.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
            });

            removedImagesInput.value = JSON.stringify(removedImages);
        }

        function removeExistingImage(imagePath, btn) {
            removedImages.push(imagePath);
            removedImagesInput.value = JSON.stringify(removedImages);

            // Remove from DOM
            const wrapper = btn.closest('div');
            wrapper.remove();
        }
    </script>
</x-app-layout>
