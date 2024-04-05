@vite('resources/css/categories.css')
<x-seller-layout>
    <div class="p-4 md:ml-64 h-screen overflow-y-scroll scrollbar-hidden pt-20">
        {{ dump($products) }}
    </div>
</x-seller-layout>
