<form class="flex flex-col items-center md:flex-row gap-3">
    <div class="flex w-full dark:bg-slate-800">
        <input id="search_input" type="text" placeholder="Search ..."
            class="w-full dark:text-gray-300 dark:bg-slate-800 px-3 h-10 rounded-l border-2 border-green-300 focus:outline-none focus:border-green-300">
        <button type="submit" class="bg-green-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
    </div>
    <select id="category" name="pricingType"
        class=" dark:bg-slate-800 w-40 h-10 border-2 border-green-500 focus:outline-none focus:border-green-500 text-green-200 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
        <option value="0" selected>All</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</form>
