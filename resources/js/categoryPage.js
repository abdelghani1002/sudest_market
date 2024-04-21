categories_header.addEventListener('scroll', () => {
    if (categories_header.scrollLeft > 0) prev.classList.remove('hidden');
    else prev.classList.add('hidden');

    if (categories_header.scrollLeft + categories_header.clientWidth < categories_header.scrollWidth - 20)
        next.classList.remove('hidden');
    else next.classList.add('hidden');
});
