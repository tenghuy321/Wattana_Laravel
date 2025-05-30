@extends('admin.layouts.app')
@section('header')
    Service Page (Services)
@endsection
@section('content')
    <div class="">
        <div class="my-2 px-2 md:px-4 flex items-center justify-between">
            <a href="{{ route('sub_servicepage.create') }}"
                class="hover:!bg-[#FF3217] hover:!text-[#ffffff] text-[#FF3217] px-4 py-2 my-3 rounded-[5px] border-2 border-[#FF3217] text-[12px] sm:text-[14px]">
                <span class="">Add new</span>
            </a>
            <a href="{{ route('servicepage.index') }}"
                class="hover:!bg-[#FF3217] hover:!text-[#ffffff] text-[#FF3217] px-4 py-2 my-3 rounded-[5px] border-2 border-[#FF3217] text-[12px] sm:text-[14px]">
                <span class="">Back</span>
            </a>
        </div>

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto px-0 sm:px-2 md:px-4">
            <div class="border border-[#FF3217] max-h-[80vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-black sticky top-0 z-10">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs w-8 border-r border-[#FF3217]">#</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#FF3217]">Icon</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#FF3217]">Title</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#FF3217]">Content</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($sub_servicepages as $index => $sub_service)
                            <tr class="border-t border-[#FF3217]">
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#FF3217]">{{ $index + 1 }}
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#FF3217] bg-gray-300">
                                    <img src="{{ asset($sub_service->icon) }}" alt="" class="w-10 h-10">
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#FF3217]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $sub_service->title['en'] ?? '' }}</p>
                                        <p>{{ $sub_service->title['kh'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#FF3217]">
                                    <div class="flex flex-col">
                                        <div class="line-clamp-1 prose">
                                            {!! $sub_service->content['en'] ?? '' !!}
                                        </div>
                                        <div class="line-clamp-1 prose">
                                            {!! $sub_service->content['kh'] ?? '' !!}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-xs flex max-w-[200px]">
                                    <div class="flex items-center">
                                        <a href="{{ route('sub_servicepage.delete', $sub_service->id) }}" title="Delete"
                                            onclick="event.preventDefault(); deleteRecord('{{ route('sub_servicepage.delete', $sub_service->id) }}')">
                                            <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('sub_servicepage.edit', $sub_service->id) }}" title="Edit">
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
