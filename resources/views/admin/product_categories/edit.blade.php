<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold">Edit Product Category</h2>
        <form action="{{ route('product_category.update', $product_category->id) }}" method="POST"
            enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent

            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#FF3217] uppercase">English</h1>
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-gray-700">Categroy Name</label>
                        <input value="{{ old('name.en', $product_category->name['en'] ?? '') }}" type="text"
                            name="name[en]" id="name_en"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('name.en')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#FF3217] uppercase">Khmer</h1>
                    <div>
                        <label for="name_kh" class="block text-sm font-medium text-gray-700">Categroy Name</label>
                        <input value="{{ old('name.kh', $product_category->name['kh'] ?? '') }}" type="text"
                            name="name[kh]" id="name_kh"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('name.kh')" />
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('product_category.index') }}"
                    class="border border-[#FF3217] hover:!bg-[#FF3217] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#FF3217]">
                    Back
                </a>

                <button type="submit" class="bg-[#FF3217] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    <script>

        document.getElementById('name_en').addEventListener('input', function() {
            let slug = this.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9]+/g, '-') // replace non-alphanumerics with hyphen
                .replace(/^-+|-+$/g, ''); // trim leading/trailing hyphens
            document.getElementById('slug').value = slug;
        });
    </script>
</x-app-layout>
