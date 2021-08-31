require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function (){

    $('[data-post]').on('click', function (e) {
        e.preventDefault();

        let request_url = $(this).data('delete-link');
        let request_type = $(this).data('request-type');
        let request_data = $(this).data('request-data') ?? {};
        let redirect_url = $(this).data('redirect-url');
        let swal_text = $(this).data('swal-text') ?? 'This will delete the selected record';
        let swal_confirm_button_text = $(this).data('swal-confirm-button-text') ?? 'Delete';
        let swal_icon = $(this).data('swal-icon') ?? 'warning';
        let swal_complete_title = $(this).data('swal-complete-title') ?? 'Deleted!';
        let swal_complete_text = $(this).data('swal-complete-text') ?? 'Your file has been deleted.!';

        Swal.fire({
            title: 'Are you sure?',
            text: swal_text,
            icon: swal_icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: swal_confirm_button_text
        }).then((result) => {

            $.ajax({
                type: request_type,
                url: request_url,
                data: request_data
            }).done(function (result){
                if (result) {
                    Swal.fire(
                        swal_complete_title,
                        swal_complete_text,
                        'success'
                    ).then((result) => {
                        window.location.href = redirect_url;
                    });
                }
            });
        });
    });

});
