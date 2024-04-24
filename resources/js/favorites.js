if (document.querySelector('.add-to-favorites')) {
    Array.from(addToFavorites).forEach(form => {
        form.addEventListener('click', function (e) {
            e.preventDefault();

            form.querySelector('.add-btn').classList.add('hidden');
            form.querySelector('.loading').classList.remove('hidden');

            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        form.querySelector('.loading').classList.add('hidden');
                        form.querySelector('.add-btn').classList.remove('hidden');
                        form.classList.add('hidden');
                        form.parentElement.querySelector('.remove-from-favorites').classList.remove('hidden');
                    }
                })
                .catch(error => console.error(error));
        });
    });
}

if (document.querySelector('.remove-from-favorites')) {
    Array.from(removeFromFavorites).forEach(form => {
        form.addEventListener('click', function (e) {
            e.preventDefault();

            form.querySelector('.remove-btn').classList.add('hidden');
            form.querySelector('.loading').classList.remove('hidden');

            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(form.action, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        form.querySelector('.loading').classList.add('hidden');
                        form.querySelector('.remove-btn').classList.remove('hidden');
                        form.classList.add('hidden');
                        form.parentElement.querySelector('.add-to-favorites').classList.remove('hidden');
                    }
                })
                .catch(error => console.error(error));
        });
    });
}
