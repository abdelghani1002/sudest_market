$(document).ready(function () {
    let loadingElement = `
    <div aria-label="Loading..." role="status" class="flex items-center space-x-2">
        <svg class="h-20 w-20 animate-spin stroke-gray-500" viewBox="0 0 256 256">
            <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="24"></line>
            <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
            </line>
            <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="24"></line>
            <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
            </line>
            <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="24"></line>
            <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
            <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
            </line>
        </svg>
        <span class="text-4xl font-medium text-gray-500">Loading...</span>
    </div>
    `;

    document.getElementById('search_input').addEventListener('input', fetchData);
    document.getElementById('category').addEventListener('change', fetchData);

    function fetchData() {
        var search_string = document.getElementById('search_input').value.trim();
        var category = document.getElementById('category').value;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var params = new URLSearchParams({
            search_string: search_string,
            category: category
        }).toString();
        searchLoading()
        fetch('/search?' + params, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.status) {
                    showProducts(data.products, data.token);
                } else noResult();
            })
            .catch(error => {
                console.error('Fetch Error:', error);
            });
    }

    function noResult() {
        $("#place_result").html(`
            <div class="w-full flex justify-center items-center" >
                <p class="text-center w-full dark:text-violet-200"> No result .</p>
            </div>
        `)
    }

    function showProducts(products) {
        $("#place_result").html("");
        $("#place_result").html(products);
    }

    function searchLoading() {
        $("#place_result").html(loadingElement)
    }
});
