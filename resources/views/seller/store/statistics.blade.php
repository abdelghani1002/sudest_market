@vite('resources/css/statistics.css')
<x-seller-layout>
    <div class="p-4 md:ml-64 h-auto pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Total units saled -->
            <div class="flex justify-center items-center border border-dashed border-green-400 rounded-lg h-32 md:h-64">
                <span class="flex md:flex-col gap-3 justify-center items-center">
                    <span class="flex justify-center">
                        <svg class="w-20 h-20 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24"fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.583 8.445h.01M10.86 19.71l-6.573-6.63a.993.993 0 0 1 0-1.4l7.329-7.394A.98.98 0 0 1 12.31 4l5.734.007A1.968 1.968 0 0 1 20 5.983v5.5a.992.992 0 0 1-.316.727l-7.44 7.5a.974.974 0 0 1-1.384.001Z" />
                        </svg>

                    </span>
                    <div class="text-green-700 dark:text-gray-300 md:text-center">
                        <span class="font-bold text-3xl">{{ $sales['total'] }}</span>
                        <span class="">units</span>
                        <div class="text-xs text-gray-500"><i class="text-green-500 font-semibold">+34</i> this month
                        </div>
                    </div>
                </span>
            </div>
            <!-- Sellers Count -->
            <div class="flex justify-center items-center border border-dashed border-green-400 rounded-lg h-32 md:h-64">
                <span class="flex md:flex-col gap-3 justify-center items-center">
                    <span class="flex justify-center">
                        <svg class="w-20 h-20 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                        </svg>
                    </span>
                    <div class="text-green-700 dark:text-gray-300 md:text-center">
                        <span class="font-bold text-3xl">{{ $sales['total_amount'] }}</span>
                        <span class="">MAD</span>
                        <div class="text-xs text-gray-500"><i
                                class="text-green-500 font-semibold">+{{ $sales['this_month_amount'] }}</i> this month
                        </div>
                    </div>
                </span>

            </div>
            <!-- Customers Count -->
            <div class="flex justify-center items-center border border-dashed border-green-400 rounded-lg h-32 md:h-64">
                <span class="flex md:flex-col gap-3 justify-center items-center">
                    <span class="flex justify-center">
                        <svg class="w-20 h-20 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <div class="text-green-700 dark:text-gray-300 md:text-center">
                        <span class="font-bold text-3xl">{{ $customers['total'] }}</span>
                        <span class="">customers</span>
                        <div class="text-xs text-gray-500"><i
                                class="text-green-500 font-semibold">+{{ $customers['this_month'] }}</i> this month
                        </div>
                    </div>
                </span>

            </div>
            <!-- Products Count -->
            <div class="flex justify-center items-center border border-dashed border-green-400 rounded-lg h-32 md:h-64">
                <span class="flex md:flex-col gap-3 justify-center items-center">
                    <span class="flex justify-center">
                        <svg class="w-20 h-20 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>

                    </span>
                    <div class="text-green-700 dark:text-gray-300 md:text-center">
                        <span class="font-bold text-3xl">{{ $products['total'] }}</span>
                        <span class="">products</span>
                        <div class="text-xs text-gray-500"><i
                                class="text-green-500 font-semibold">+{{ $products['this_month'] }}</i> this month
                        </div>
                    </div>
                </span>

            </div>
        </div>
        <!-- Categories chart -->
        <div class="border border-dashed rounded-lg border-green-400 mb-4">
            <canvas id="categoryChart"></canvas>
        </div>
        <!-- Recent activity -->
        <div class="flex flex-col border border-dashed rounded-lg border-green-400 h-96 mb-4 p-2">
            <div class="flex justify-between text-gray-700 dark:text-gray-300 mb-2">
                <p class="font-semibold text-lg ">Best Selling</p>
                <div>
                    <button id="lastseenButton" data-dropdown-toggle="lastSeenMenu"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        Last 24h
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="lastSeenMenu"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-fit dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="lastseenButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                    24h</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                    week</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                    month</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Sales
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Amount
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Last sale
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($products['best_selling']->isEmpty())
                            @foreach ($products['best_selling'] as $product)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="overflow-x-scroll scrollbar-hide flex items-center px-2 md:px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 md:w-14 md:h-14 rounded"
                                            src="{{ asset($product->primary_photo_src) }}" alt="Product image">
                                        <div class="ps-3">
                                            <div class="max-w-30 font-semibold">{{ $product->name }}</div>
                                        </div>
                                    </th>
                                    <td class="px-2 md:px-6 py-4">
                                        {{ $product->status }}
                                    </td>
                                    <td class="px-2 md:px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="me-2 font-bold">{{ $product->quantity }}</div>
                                        </div>
                                    </td>
                                    <td class="px-2 md:px-6 py-4">
                                        <span href="#" type="button"
                                            class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                            {{ $product->total_sales }}
                                        </span>
                                    </td>
                                    <td class="px-2 md:px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="me-2">MAD <span
                                                    class="font-extrabold">{{ $product->revenue }}</span></div>
                                        </div>
                                    </td>
                                    <td class="px-2 md:px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="me-2">
                                                @if ($product->last_sale)
                                                    {{ Carbon\Carbon::parse($product->last_sale)->diffForHumans() }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center py-4">No Product</td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script>
        // Get chart data from PHP
        var chartData = @json($chartData);

        // Prepare data for Chart.js
        var labels = Object.keys(chartData);
        var data = Object.values(chartData);

        // Create chart
        var ctx = document.getElementById('categoryChart').getContext('2d');
        var categoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Products',
                    data: data,
                    backgroundColor: 'rgb(14, 159, 110)',
                    borderColor: 'rgb(14, 159, 110)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-seller-layout>
