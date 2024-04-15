<div class="min-h-[500px] bg-primary-100 dark:bg-gray-800 dark:text-gray-300 px-4 sm:px-10">
    <div class="w-full py-16 mx-auto max-w-7xl">
        <div class="grid items-center justify-center gap-10 lg:grid-cols-2">
            <div class="text-center md:text-left">
                <h1 class="md:text-5xl text-4xl font-extrabold mb-6 md:!leading-[55px]">Discover the Beauty
                    of Moroccan Craftsmen
                </h1>
                <p class="text-base leading-relaxed">Indulge in the essence of Moroccan opulence at Sud-Est Market, your
                    premier destination for curated treasures that reflect the soul of Morocco. Immerse yourself in a
                    world where tradition intertwines seamlessly with modern luxury. Our collection spans from
                    handcrafted marvels to contemporary delights,
                </p>
                <div class="flex mt-8 w-full justify-center md:justify-normal">
                    @auth
                        <a href="{{ Route('search') }}"
                            class='bg-green-600 hover:bg-[#111] text-white flex items-center transition-all font-semibold rounded-md px-5 py-4'>Get
                            started
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2"
                                viewBox="0 0 492.004 492.004">
                                <path
                                    d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"
                                    data-original="#000000" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ Route('register') }}"
                            class='bg-green-600 hover:bg-[#111] text-white flex items-center transition-all font-semibold rounded-md px-5 py-4'>Get
                            started
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2 animate-pulse"
                                viewBox="0 0 492.004 492.004">
                                <path
                                    d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"
                                    data-original="#000000" />
                            </svg>
                        </a>
                    @endauth
                </div>
            </div>
            <div class="h-full max-lg:mt-12">
                <img src="{{ asset('hero_photo.png') }}" alt="hero photo" class="object-cover w-full h-full" />
            </div>
        </div>
    </div>
</div>
