@extends('admin.layouts.app')
@section('header')
    Navbar
@endsection
@section('content')
    <div class="">
        {{-- <div class="my-3 md:my-4 px-2 md:px-4 text-end">
            <a href="{{ route('nav.create') }}"
                class="hover:!bg-[#FF3217] hover:!text-[#ffffff] text-[#FF3217] px-4 py-2 my-3 rounded-[5px] border-2 border-[#FF3217] text-[12px] sm:text-[14px]">
                <span class="">Add new</span>
            </a>
        </div> --}}

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto px-0 sm:px-2 md:px-4">
            <div class="border border-[#FF3217] max-h-[80vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-black sticky top-0 z-10">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs w-8 border-r border-[#FF3217]">#</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#FF3217]">Image</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#FF3217]">Title</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($nav as $index => $item)
                            <tr class="border-t border-[#FF3217]">
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#FF3217]">{{ $index + 1 }}</td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#FF3217]">
                                    @if (!empty($item->image))
                                        <img src="{{ asset($item->image) }}" alt="" class="w-20 h-10">
                                    @else
                                        {{-- empty --}}
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#FF3217]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $item->title['en'] ?? '' }}</p>
                                        <p>{{ $item->title['kh'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-xs flex max-w-[200px]">
                                    <div class="flex items-center">
                                        <a href="{{ route('nav.edit', $item->id) }}" title="Edit">
                                            <svg class="w-6 h-6 text-green-500 hover:text-green-700 transition"
                                                xmlns="http://www.w3.org/2FF3217/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
