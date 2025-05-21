<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold">Edit Contact Page</h2>
        <form action="{{ route('contactUs.update', $contact->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent
            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#FF3217] uppercase">English</h1>
                    <div>
                        <label for="title1_en" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title1.en', $contact->title1['en'] ?? '') }}" type="text"
                            name="title1[en]" id="title1_en"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title1.en')" />
                    </div>
                    <div>
                        <label for="title2_en" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title2.en', $contact->title2['en'] ?? '') }}" type="text"
                            name="title2[en]" id="title2_en"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title2.en')" />
                    </div>
                    <div>
                        <label for="title3_en" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title3.en', $contact->title3['en'] ?? '') }}" type="text"
                            name="title3[en]" id="title3_en"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title3.en')" />
                    </div>
                    <div>
                        <label for="sub_title_en" class="block text-sm font-medium text-gray-700">Sub Title</label>
                        <textarea name="sub_title[en]" id="sub_title_en" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">{{ old('sub_title.en', $contact->sub_title['en'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('sub_title.en')" />
                    </div>
                    <div>
                        <label for="location_en" class="block text-sm font-medium text-gray-700">Location</label>
                        <textarea name="location[en]" id="location_en" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">{{ old('location.en', $contact->location['en'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('location.en')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#FF3217] uppercase">Khmer</h1>
                    <div>
                        <label for="title1_kh" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title1.kh', $contact->title1['kh'] ?? '') }}" type="text"
                            name="title1[kh]" id="title1_kh"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title1.kh')" />
                    </div>
                    <div>
                        <label for="title2_kh" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title2.kh', $contact->title2['kh'] ?? '') }}" type="text"
                            name="title2[kh]" id="title2_kh"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title2.kh')" />
                    </div>
                    <div>
                        <label for="title3_kh" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title3.kh', $contact->title3['kh'] ?? '') }}" type="text"
                            name="title3[kh]" id="title3_kh"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title3.kh')" />
                    </div>

                    <div>
                        <label for="sub_title_kh" class="block text-sm font-medium text-gray-700">Sub Title</label>
                        <textarea name="sub_title[kh]" id="sub_title_kh" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">{{ old('sub_title.kh', $contact->sub_title['kh'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('sub_title.kh')" />
                    </div>
                    <div>
                        <label for="location_kh" class="block text-sm font-medium text-gray-700">Location</label>
                        <textarea name="location[kh]" id="location_kh" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">{{ old('location.kh', $contact->location['kh'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('location.kh')" />
                    </div>
                </div>
            </div>

            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input value="{{ old('email', $contact->email) }}" type="text" name="email" id="email"
                        class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <div>
                    <label for="head_office" class="block text-sm font-medium text-gray-700">Head Office Phone</label>
                    <input value="{{ old('head_office', $contact->head_office) }}" type="text" name="head_office"
                        id="head_office" class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('head_office')" />
                </div>
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input value="{{ old('phone_number', $contact->phone_number) }}" type="text"
                        name="phone_number" id="phone_number"
                        class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                </div>
                <div>
                    <label for="map_location" class="block text-sm font-medium text-gray-700">Map Location</label>
                    <input value="{{ old('map_location', $contact->map_location) }}" type="text"
                        name="map_location" id="map_location"
                        class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('map_location')" />
                </div>
                <div>
                    <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook Link</label>
                    <input value="{{ old('facebook', $contact->facebook) }}" type="text" name="facebook"
                        id="facebook" class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
                </div>
                <div>
                    <label for="telegram" class="block text-sm font-medium text-gray-700">Telegram Link</label>
                    <input value="{{ old('telegram', $contact->telegram) }}" type="text" name="telegram"
                        id="telegram" class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('telegram')" />
                </div>
                <div>
                    <label for="line" class="block text-sm font-medium text-gray-700">Line Link</label>
                    <input value="{{ old('line', $contact->line) }}" type="text" name="line" id="line"
                        class="mt-1 block w-full p-2 border rounded-md text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('line')" />
                </div>
            </div>

            <div>
                <label for="dropzone-file{{ $contact->id }}" id="drop-area"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-[#000] border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6 w-full h-full bg-contain bg-center bg-no-repeat rounded-md text-center"
                        id="img-preview" style="background-image: url({{ asset($contact->image) }})">
                        <svg class="w-8 h-8 mb-4 text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-[12px] sm:text-[14px] text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217]"><span class="font-semibold">Click
                                to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-[#000] focus:ring-[#FF3217] focus:border-[#FF3217]">SVG, PNG, JPG or GIF (MAX. 5MB)</p>
                    </div>
                    <input id="dropzone-file{{ $contact->id }}" type="file" class="hidden" name="image"
                        accept="image/*" onchange="uploadImage(event)" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <div class="flex justify-between">
                <a href="{{ route('contactUs.index') }}"
                    class="border border-[#FF3217] hover:!bg-[#FF3217] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#FF3217]">
                    Back
                </a>

                <button type="submit" class="bg-[#FF3217] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    <script>
        const dropArea = document.getElementById('drop-area');
        const imageFile = document.getElementById('dropzone-file');
        const imagePreview = document.getElementById('img-preview');

        function uploadImage(event) {
            const file = event.target.files[0];
            if (file) {
                const imgLink = URL.createObjectURL(file);
                imagePreview.style.backgroundImage = `url(${imgLink})`;
                imagePreview.style.backgroundSize = "contain";
                imagePreview.style.backgroundPosition = "center";
                imagePreview.innerHTML = "";
            }
        }

        // Drag-and-drop functionality
        dropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea.classList.add('border-blue-500');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('border-blue-500');
        });

        dropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            dropArea.classList.remove('border-blue-500');
            const file = event.dataTransfer.files[0];
            if (file) {
                const imgLink = URL.createObjectURL(file);
                imagePreview.style.backgroundImage = `url(${imgLink})`;
                imagePreview.style.backgroundSize = "contain";
                imagePreview.style.backgroundPosition = "center";
                imagePreview.innerHTML = ""; // Clear the default content inside preview
                imageFile.files = event.dataTransfer.files; // Attach the dropped file to input
            }
        });
    </script>
</x-app-layout>
