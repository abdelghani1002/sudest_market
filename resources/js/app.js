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

    if (successAlert.length > 0) {
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'success',
            title: successAlert.attr('data-title'),
            text: successAlert.text(),
            showConfirmButton: false,
            timer: 3000,
        });
    } else if (errorAlert.length > 0) {
        Swal.fire({
            icon: 'error',
            title: errorAlert.attr('data-title'),
            text: errorAlert.text()
        });
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
