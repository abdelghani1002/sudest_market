import Swal from 'sweetalert2';

$(document).ready(function () {

    const getCart = () => {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/cart', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
            },
        })
            .then(response => response.json())
            .then(data => {
                $("#cartbtn").html("");
                $("#cartbtn").html(data.cartbtn);
                $("#cart").html("");
                $("#cart").html(data.cart);
            })
    }
    getCart();

    // Add to cart
    $(document).on('click', '.add-to-cart', function (e) {
        e.preventDefault();

        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const units = this.querySelector('#units') ? this.querySelector('#units').value : 1;

        fetch(this.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
            },
            body: JSON.stringify({ units: units })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    getCart();
                    $('#cart').hasClass('hidden') && $('#cartbtn').click();
                }
            })
            .catch(
                error => {
                    Swal.fire({
                        icon: 'error',
                        iconColor: '#dc3545',
                        title: 'Oops...',
                        position: 'bottom-end',
                        text: 'Something went wrong! Please try again.',
                        toast: true,
                        showConfirmButton: false,
                        timer: 4000,
                    });
                }
            );
    });

    // Remove from cart
    $(document).on('click', '.remove-from-cart', function (e) {
        e.preventDefault();
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(this.action, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    getCart();
                }
            })
            .catch(
                error => {
                    Swal.fire({
                        icon: 'error',
                        iconColor: '#dc3545',
                        title: 'Oops...',
                        position: 'bottom-end',
                        text: 'Something went wrong! Please try again.',
                        toast: true,
                        showConfirmButton: false,
                        timer: 4000,
                    });
                }
            );
    });
});
