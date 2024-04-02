@vite('resources/css/sellerRequests.css')
<x-admin-layout>
    <div class="px-2 md:ml-64 h-full pt-14 flex flex-row">
        <div class="w-full h-full">
            <div class="flex flex-row items-center w-full py-2 justify-between">
                <h3 class="text-2xl font-bold text-green-500 dark:text-green-500">Seller Requests</h3>
                <!-- Success&Error alert -->
                @if (session('success'))
                    <p data-icon="success" data-title="Success." class="hidden alert text-green-400 text-center">
                        {{ session('success') }}
                    </p>
                @elseif (session('error'))
                    <p data-icon="error" data-title="Error!" class="hidden alert text-red-400 text-center">
                        {{ session('error') }}
                    </p>
                @endif
            </div>

            <div class="flex flex-col justify-between w-full overflow-x-scroll scrollbar-hide">

                <!-- sellerRequests Table -->
                <table id="sellerRequests_table"
                    class="table-auto w-full text-sm whitespace-no-wrap border-spacing-2 px-2 pb-2">
                    <thead class="">
                        <tr class="bg-gray-400">
                            <th class="p-1 border-r border-gray-300">Customer</th>
                            <th class="p-1 border-r border-gray-300">City</th>
                            <th class="p-1 border-r border-gray-300">Email</th>
                            <th class="p-1 w-1/12">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sellerRequests as $request)
                            <tr
                                class="odd:bg-gray-200 even:bg-gray-300 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:text-gray-300">

                                <td class="p-2 border-r border-gray-500">
                                    <div class="flex gap-1">
                                        <img class="request-image text-sm w-6 h-6 object-cover rounded-sm"
                                            src="{{ $request->customer->photo_src }}" alt="customer photo">
                                        <div class="flex items-center">
                                            {{ $request->customer->name }}
                                        </div>
                                    </div>
                                </td>

                                <td class="p-2 border-r border-gray-500">
                                    <div class="flex justify-between items-center">
                                        <span>{{ $request->customer->city }}</span>

                                    </div>
                                </td>

                                <td class="p-2 border-r border-gray-500">
                                    <div class="flex justify-between items-center">
                                        <span>{{ $request->customer->email }}</span>
                                        @if ($request->customer->email_verified_at)
                                        <span class="text-blue-700 bg-cyan-300 p-1 rounded ">verified</span>
                                        @endif

                                    </div>
                                </td>

                                <td class="p-2 border-white">
                                    <div class="flex gap-3 items-center">
                                        @if ($request->status == 'pending')
                                            <span class="text-yellow-500 bg-yellow-300 p-1 rounded">pending</span>
                                            <form class="my-auto" method="POST"
                                                action="{{ route('sellerRequests.update', $request) }}">
                                                @csrf
                                                @method('PUT')
                                                <button name="status" value="accepted"
                                                    class="w-full text-center py-1 px-3 rounded-md bg-green-300 text-green-500 flex justify-center hover:font-bold">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 text-green-500" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span>Accept</span>
                                                </button>
                                            </form>
                                            <form class="my-auto confirm" method="POST"
                                                action="{{ route('sellerRequests.update', $request) }}">
                                                @csrf
                                                @method('PUT')
                                                <button name="status" value="rejected"
                                                    class="w-full text-center py-1 px-3 rounded-md bg-red-300 text-red-500 flex justify-center hover:font-bold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    <span>Reject</span>
                                                </button>
                                            </form>
                                        @elseif($request->status == 'accepted')
                                            <span class="text-green-500 text-center py-1 px-3 rounded-md bg-green-300 flex justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Accepted</span>
                                            </span>
                                        @else
                                            <span class="text-red-500 text-center py-1 px-3 rounded-md bg-red-300 flex justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                <span>Rejected</span>
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-links p-2 w-full">
                {{ $sellerRequests->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
