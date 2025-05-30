@extends('admin.layouts.app')
@section('header')
    Client
@endsection
@section('content')
    <div class="" x-data="reorderTable()" x-init="initSortable()">
        <div class="my-2 px-2 md:px-4 flex items-center justify-between">
            <a href="{{ route('client.create') }}"
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
            <div class="border border-[#FF3217] max-h-[70vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-black sticky top-0 z-10">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#FF3217] w-8">Order</th>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#FF3217] w-[200px]">Image</th>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#FF3217] w-[200px]">Action</th>
                        </tr>
                    </thead>
                    <tbody x-ref="tableBody" class="text-gray-700">
                        @foreach ($clients as $index => $client)
                            <tr class="border-t border-[#FF3217] cursor-move" draggable="true" x-bind:data-id="{{ $client->id }}"
                                @dragstart="dragStart($event, {{ $client->id }})" @dragover.prevent
                                @drop="drop($event, {{ $client->id }})">
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#FF3217]">
                                    <div class="flex items-center h-full w-full">{{ $client->order }}</div>
                                </td>
                                <td class="text-left py-3 px-4 text-[10px] md:text-[12px] border-r border-[#FF3217]">
                                    <div class="flex items-center h-full w-full">
                                        <img src="{{ asset($client->image) }}" alt="" class="w-20 h-12 object-contain object-center">
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-xs border-r border-[#FF3217]">
                                    <div class="flex items-center h-full space-x-2 w-full">
                                        <a href="{{ route('client.delete', $client->id) }}" title="Delete"
                                            onclick="event.preventDefault(); deleteRecord('{{ route('client.delete', $client->id) }}')">
                                            <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('client.edit', $client->id) }}" title="Edit">
                                            <svg class="w-6 h-6 text-green-500 hover:text-green-700 transition"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
@section('js')
    <script>
        function reorderTable() {
            return {
                initSortable() {
                    this.$nextTick(() => {
                        let tableBody = this.$refs.tableBody;
                        new Sortable(tableBody, {
                            animation: 150,
                            ghostClass: "bg-gray-100",
                            onEnd: async (event) => {
                                let newOrder = [...tableBody.children].map((row, index) => ({
                                    id: row.getAttribute("data-id"),
                                    order: index + 1
                                }));

                                let response = await fetch("{{ route('client.reorder') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        newOrder
                                    })
                                });

                                if (response.ok) {
                                    location.reload();
                                } else {
                                    console.error("Failed to reorder.");
                                }
                            }
                        });
                    });
                }
            };
        }
    </script>
@endsection
