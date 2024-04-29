import './bootstrap';
import 'flowbite';
import Swal from 'sweetalert2';

let preloader = document.getElementById('preloader');
window.addEventListener('load', () => {
    preloader.style.display = 'none'
})

$(document).ready(function() {
    let successAlert = $('p[data-icon="success"]');
    let errorAlert = $('p[data-icon="error"]');
    let infoAlert = $('p[data-icon="info"]');

    if (successAlert.length > 0) {
        Swal.fire({
            position: 'bottom-end',
            toast: true,
            icon: 'success',
            title: successAlert.attr('data-title'),
            text: successAlert.text(),
            showConfirmButton: false,
            timer: 4000,
        });
        $('p[data-icon="success"]').remove();
    } else if (errorAlert.length > 0) {
        Swal.fire({
            icon: 'error',
            title: errorAlert.attr('data-title'),
            text: errorAlert.text()
        });
        $('p[data-icon="error"]').remove();
    } else if (infoAlert.length > 0){
        Swal.fire({
            position: 'bottom-end',
            toast: true,
            icon: 'info',
            title: infoAlert.attr('data-title'),
            text: infoAlert.text(),
            showConfirmButton: false,
            timer: 4000,
        });
        $('p[data-icon="info"]').remove();
    }
});

async function customConfirmDelete(){
    let result = await Swal.fire({
        title: 'Are you sure you want to delete this record?',
        icon: 'question',
        iconColor: '#dc3545',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    });
    return result.isConfirmed;
}

let deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', async function(e){
        e.preventDefault();
        try {
            let isConfirmed = await customConfirmDelete();
            console.log(isConfirmed);
            if(isConfirmed){
                this.submit();
            }
        } catch (error) {
            console.error(error);
        }
    });
});

// check if the URL contains page= and scroll to the products section
if(window.location.href.includes('page=')){
    let productsSection = document.getElementById('products');
    if(productsSection){
        productsSection.scrollIntoView();
    }
}
