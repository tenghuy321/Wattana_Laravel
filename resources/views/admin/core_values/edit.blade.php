<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold">Edit CoreValue</h2>
        <form action="{{ route('core_value.update', $core_value->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent

            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#FF3217] uppercase">English</h1>
                    <div>
                        <label for="title_en" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.en', $core_value->title['en'] ?? '') }}" type="text"
                            name="title[en]" id="title_en"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.en')" />
                    </div>
                    <div>
                        <label for="content_en" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[en]" id="content_en" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content.en', $core_value->content['en'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.en')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#FF3217] uppercase">Khmer</h1>
                    <div>
                        <label for="title_kh" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.kh', $core_value->title['kh'] ?? '') }}" type="text"
                            name="title[kh]" id="title_kh"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.kh')" />
                    </div>
                    <div>
                        <label for="content_kh" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[kh]" id="content_kh" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content.kh', $core_value->content['kh'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.kh')" />
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('core_value.index') }}"
                    class="border border-[#FF3217] hover:!bg-[#FF3217] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#FF3217]">
                    Back
                </a>

                <button type="submit" class="bg-[#FF3217] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#content_en'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#content_kh'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
