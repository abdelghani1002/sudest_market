@vite('resources/css/statistics.css')
<x-admin-layout>
    <div class="p-4 md:ml-64 h-auto pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Users Count -->
            <div class="flex justify-center items-center border border-dashed border-green-400 rounded-lg h-32 md:h-64">
                <span class="flex md:flex-col gap-3 justify-center items-center">
                    <span class="flex justify-center">
                        <svg class="w-20 h-20 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <div class="text-green-700 dark:text-gray-300 md:text-center">
                        <span class="font-bold text-3xl">4690</span>
                        <span class="">users</span>
                        <div class="text-xs text-gray-500"><i class="text-green-500 font-semibold">+120</i> this month
                        </div>
                    </div>
                </span>

            </div>
            <!-- Sellers Count -->
            <div class="flex justify-center items-center border border-dashed border-green-400 rounded-lg h-32 md:h-64">
                <span class="flex md:flex-col gap-3 justify-center items-center">
                    <span class="flex justify-center">
                        <svg class="w-20 h-20 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.535 7.677c.313-.98.687-2.023.926-2.677H17.46c.253.63.646 1.64.977 2.61.166.487.312.953.416 1.347.11.42.148.675.148.779 0 .18-.032.355-.09.515-.06.161-.144.3-.243.412-.1.111-.21.192-.324.245a.809.809 0 0 1-.686 0 1.004 1.004 0 0 1-.324-.245c-.1-.112-.183-.25-.242-.412a1.473 1.473 0 0 1-.091-.515 1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.401 1.401 0 0 1 13 9.736a1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.4 1.4 0 0 1 9 9.74v-.008a1 1 0 0 0-2 .003v.008a1.504 1.504 0 0 1-.18.712 1.22 1.22 0 0 1-.146.209l-.007.007a1.01 1.01 0 0 1-.325.248.82.82 0 0 1-.316.08.973.973 0 0 1-.563-.256 1.224 1.224 0 0 1-.102-.103A1.518 1.518 0 0 1 5 9.724v-.006a2.543 2.543 0 0 1 .029-.207c.024-.132.06-.296.11-.49.098-.385.237-.85.395-1.344ZM4 12.112a3.521 3.521 0 0 1-1-2.376c0-.349.098-.8.202-1.208.112-.441.264-.95.428-1.46.327-1.024.715-2.104.958-2.767A1.985 1.985 0 0 1 6.456 3h11.01c.803 0 1.539.481 1.844 1.243.258.641.67 1.697 1.019 2.72a22.3 22.3 0 0 1 .457 1.487c.114.433.214.903.214 1.286 0 .412-.072.821-.214 1.207A3.288 3.288 0 0 1 20 12.16V19a2 2 0 0 1-2 2h-6a1 1 0 0 1-1-1v-4H8v4a1 1 0 0 1-1 1H6a2 2 0 0 1-2-2v-6.888ZM13 15a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <div class="text-green-700 dark:text-gray-300 md:text-center">
                        <span class="font-bold text-3xl">380</span>
                        <span class="">stores</span>
                        <div class="text-xs text-gray-500"><i class="text-green-500 font-semibold">+120</i> this month
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
                        <span class="font-bold text-3xl">2390</span>
                        <span class="">customers</span>
                        <div class="text-xs text-gray-500"><i class="text-green-500 font-semibold">+120</i> this month
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
                        <span class="font-bold text-3xl">3892</span>
                        <span class="">products</span>
                        <div class="text-xs text-gray-500"><i class="text-green-500 font-semibold">+120</i> this month
                        </div>
                    </div>
                </span>

            </div>

        </div>
        <!-- Categories chart -->
        <div class="border border-dashed rounded-lg border-green-400 h-96 mb-4">

        </div>
        <!--  -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="border border-dashed rounded-lg border-green-400 h-48 md:h-72"></div>
            <div class="border border-dashed rounded-lg border-green-400 h-48 md:h-72"></div>
        </div>
        <!-- Recent activity -->
        <div class="flex flex-col border border-dashed rounded-lg border-green-400 h-96 mb-4 p-2">
            <div class="flex justify-between text-gray-700 dark:text-gray-300 mb-2">
                <p class="font-semibold text-lg ">Recent Activity</p>
                <!-- last seen -->
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
                                Customer
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Order N°
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Retained
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-3">
                                Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="overflow-x-scroll scrollbar-hidden flex items-center px-2 md:px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-7 h-7 md:w-10 md:h-10 rounded-full"
                                    src="{{ asset('default_user_photo.png') }}"
                                    alt="Jese image">
                                <div class="ps-3">
                                    <div class="max-w-30 font-semibold">Salaheddine DAHA</div>
                                </div>
                            </th>
                            <td class="px-2 md:px-6 py-4">
                                Active
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> #23978</div>
                                </div>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <!-- Modal toggle -->
                                <span href="#" type="button"
                                    class="font-medium text-green-600 dark:text-green-500 hover:underline">3 min
                                    ago</span>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> $ 29.50</div>
                                </div>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="overflow-x-scroll scrollbar-hidden flex items-center px-2 md:px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-7 h-7 md:w-10 md:h-10 rounded-full"
                                    src="{{ asset('default_user_photo.png') }}"
                                    alt="Jese image">
                                <div class="ps-3">
                                    <div class="max-w-30 font-semibold">Salaheddine DAHA</div>
                                </div>
                            </th>
                            <td class="px-2 md:px-6 py-4">
                                Active
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> #23978</div>
                                </div>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <!-- Modal toggle -->
                                <span href="#" type="button"
                                    class="font-medium text-green-600 dark:text-green-500 hover:underline">3 min
                                    ago</span>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> $ 29.50</div>
                                </div>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="overflow-x-scroll scrollbar-hidden flex items-center px-2 md:px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-7 h-7 md:w-10 md:h-10 rounded-full"
                                    src="{{ asset('default_user_photo.png') }}"
                                    alt="Jese image">
                                <div class="ps-3">
                                    <div class="max-w-30 font-semibold">Salaheddine DAHA</div>
                                </div>
                            </th>
                            <td class="px-2 md:px-6 py-4">
                                Active
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> #23978</div>
                                </div>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <!-- Modal toggle -->
                                <span href="#" type="button"
                                    class="font-medium text-green-600 dark:text-green-500 hover:underline">3 min
                                    ago</span>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> $ 29.50</div>
                                </div>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="overflow-x-scroll scrollbar-hidden flex items-center px-2 md:px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-7 h-7 md:w-10 md:h-10 rounded-full"
                                    src="{{ asset('default_user_photo.png') }}"
                                    alt="Jese image">
                                <div class="ps-3">
                                    <div class="max-w-30 font-semibold">Salaheddine DAHA</div>
                                </div>
                            </th>
                            <td class="px-2 md:px-6 py-4">
                                Active
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> #23978</div>
                                </div>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <!-- Modal toggle -->
                                <span href="#" type="button"
                                    class="font-medium text-green-600 dark:text-green-500 hover:underline">3 min
                                    ago</span>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> $ 29.50</div>
                                </div>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="overflow-x-scroll scrollbar-hidden flex items-center px-2 md:px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-7 h-7 md:w-10 md:h-10 rounded-full"
                                    src="{{ asset('default_user_photo.png') }}"
                                    alt="Jese image">
                                <div class="ps-3">
                                    <div class="max-w-30 font-semibold">Salaheddine DAHA</div>
                                </div>
                            </th>
                            <td class="px-2 md:px-6 py-4">
                                Active
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> #23978</div>
                                </div>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <!-- Modal toggle -->
                                <span href="#" type="button"
                                    class="font-medium text-green-600 dark:text-green-500 hover:underline">3 min
                                    ago</span>
                            </td>
                            <td class="px-2 md:px-6 py-4">
                                <div class="flex items-center">
                                    <div class="me-2"> $ 29.50</div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
