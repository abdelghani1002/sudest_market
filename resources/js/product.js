
// Add to favorites
let addToFavorites = document.querySelector('.add-to-favorites');
if (addToFavorites) {
    addToFavorites.addEventListener('click', function (e) {
        e.preventDefault();

        addToFavorites.querySelector('.add-btn').classList.add('hidden');
        addToFavorites.querySelector('.loading').classList.remove('hidden');

        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(addToFavorites.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    addToFavorites.querySelector('.loading').classList.add('hidden');
                    addToFavorites.querySelector('.add-btn').classList.remove('hidden');
                    addToFavorites.classList.add('hidden');
                    addToFavorites.parentElement.querySelector('.remove-from-favorites').classList.remove('hidden');
                }
            })
            .catch(error => console.error(error));
    });
}

// Remove from favorites
let removeFromFavorites = document.querySelector('.remove-from-favorites');
if (removeFromFavorites) {
    removeFromFavorites.addEventListener('click', function (e) {
        e.preventDefault();

        removeFromFavorites.querySelector('.remove-btn').classList.add('hidden');
        removeFromFavorites.querySelector('.loading').classList.remove('hidden');

        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(removeFromFavorites.action, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    removeFromFavorites.querySelector('.loading').classList.add('hidden');
                    removeFromFavorites.querySelector('.remove-btn').classList.remove('hidden');
                    removeFromFavorites.classList.add('hidden');
                    removeFromFavorites.parentElement.querySelector('.add-to-favorites').classList.remove('hidden');
                }
            })
            .catch(error => console.error(error));
    });
}

// Quantity
increment.addEventListener('click', function () {
    let product_qyt = document.querySelector("#product_quantity").innerHTML;
    let qty = parseInt(quantity.value);
    if (qty < product_qyt && qty < 10) {
        quantity.value = qty + 1;
    } else if (product_qyt >= 10) {
        quantity.value = 10;
    }
    units.value = quantity.value;
});
decrement.addEventListener('click', function () {
    let qty = parseInt(quantity.value);
    if (qty > 1) {
        quantity.value = qty - 1;
    } else {
        quantity.value = 1;
    }
    units.value = quantity.value;
});

