<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold">Create Homepage</h2>
        <form action="{{ route('homepage.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @component('admin.components.alert')
            @endcomponent
            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#FF3217] uppercase">English</h1>
                    <div>
                        <label for="title_en" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.en') }}" type="text" name="title[en]" id="title_en"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-green-500 focus:border-green-500 text-green-900 text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.en')" />
                    </div>
                    <div>
                        <label for="sub_title_en" class="block text-sm font-medium text-gray-700">Sub Title</label>
                        <input value="{{ old('sub_title.en') }}" type="text" name="sub_title[en]" id="sub_title_en"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-green-500 focus:border-green-500 text-green-900 text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('sub_title.en')" />
                    </div>
                    <div>
                        <label for="header_en" class="block text-sm font-medium text-gray-700">Header</label>
                        <input value="{{ old('header.en') }}" type="text" name="header[en]" id="header_en"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-green-500 focus:border-green-500 text-green-900 text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('header.en')" />
                    </div>
                    <div>
                        <label for="body_en" class="block text-sm font-medium text-gray-700">Body</label>
                        <textarea name="body[en]" id="body_en" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md text-green-900 text-sm">{{ old('body.en') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('body.en')" />
                    </div>

                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#FF3217] uppercase">Khmer</h1>
                    <div>
                        <label for="title_kh" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.kh') }}" type="text" name="title[kh]" id="title_kh"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-green-500 focus:border-green-500 text-green-900 text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.kh')" />
                    </div>
                    <div>
                        <label for="sub_title_kh" class="block text-sm font-medium text-gray-700">Sub Title</label>
                        <input value="{{ old('sub_title.kh') }}" type="text" name="sub_title[kh]" id="sub_title_kh"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-green-500 focus:border-green-500 text-green-900 text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('sub_title.kh')" />
                    </div>
                    <div>
                        <label for="header_kh" class="block text-sm font-medium text-gray-700">Header</label>
                        <input value="{{ old('header.kh') }}" type="text" name="header[kh]" id="header_kh"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-green-500 focus:border-green-500 text-green-900 text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('header.kh')" />
                    </div>
                    <div>
                        <label for="body_kh" class="block text-sm font-medium text-gray-700">Body</label>
                        <textarea name="body[kh]" id="body_kh" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-green-500 focus:border-green-500 text-green-900 text-sm">{{ old('body.kh') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('body.kh')" />
                    </div>
                </div>
            </div>

            <div class="flex justify-between w-full">
                <a href="{{ route('homepage.index') }}"
                    class="border border-[#FF3217] hover:!bg-[#FF3217] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#FF3217]">
                    Back
                </a>

                <button type="submit" class="bg-[#FF3217] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#body_en'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body_kh'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
