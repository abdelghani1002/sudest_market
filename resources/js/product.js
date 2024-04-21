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
