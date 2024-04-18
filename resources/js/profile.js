let show_products_btns = Array.from(document.querySelectorAll('.show_products'));
let products_divs = document.querySelectorAll('.products')
show_products_btns.forEach(btn => {
    btn.addEventListener("click", () => {
        let products = btn.nextElementSibling;
        if (products.classList.contains("hidden")) {
            products_divs.forEach(div => {
                div.classList.add('hidden');
            })
            products.classList.remove("hidden");
        } else
            products.classList.toggle("hidden");
    })
})
