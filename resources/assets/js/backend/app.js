window.swal = require('sweetalert2');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

/*var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}*/

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

defaultBlockUiSettings = {
    message: '<i class="icon-sync spinner"></i> Loading...',
    overlayCSS: {
        backgroundColor: '#fff',
        opacity: 0.8,
        cursor: 'wait'
    },
    css: {
        border: 0,
        padding: 0,
        backgroundColor: 'none'
    }
};

/**
 * Allows you to add data-method="METHOD to links to automatically inject a form
 * with the method on click
 *
 * Example: <a href="{{route('customers.destroy', $customer->id)}}"
 * data-method="delete" name="delete_item">Delete</a>
 *
 * Injects a form with that's fired on click of the link with a DELETE request.
 * Good because you don't have to dirty your HTML with delete forms everywhere.
 */
function addDeleteForms() {
    $('[data-method]').append(function () {
        if (! $(this).find('form').length > 0)
            return "\n" +
                "<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" +
                "<input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
                "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
                "</form>\n";
        else
            return "";
    })
        .removeAttr('href')
        .attr('style', 'cursor:pointer;')
        .attr('onclick', '$(this).find("form").submit();');
}

/**
 * Place any jQuery/helper plugins in here.
 */
$(function(){
    /**
     * Add the data-method="delete" forms to all delete links
     */
    addDeleteForms();

    /**
     * Bind all bootstrap tooltips & popovers
     */
    $("[data-toggle='tooltip']").tooltip();

    /**
     * Generic confirm form delete using Sweet Alert
     */
    $('body').on('submit', 'form[name=delete_item]', function(e){
        e.preventDefault();

        var form = this,
            link = $('a[data-method="delete"]'),
            cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel",
            confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete",
            title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Are you sure you want to delete this item?";

        swal({
            title: title,
            showCancelButton: true,
            confirmButtonText: confirm,
            cancelButtonText: cancel,
            type: 'warning'
        }).then((result) => {
            result.value && form.submit();
        });
    }).on('click', 'a[name=confirm_item]', function(e){
        /**
         * Generic 'are you sure' confirm box
         */
        e.preventDefault();

        var link = $(this),
            title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Are you sure you want to do this?",
            cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel",
            confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Continue";

        swal({
            title: title,
            showCancelButton: true,
            confirmButtonText: confirm,
            cancelButtonText: cancel,
            type: 'info'
        }).then((result) => {
            result.value && window.location.assign(link.attr('href'));
        });
    });
});

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function resizeBroadcast() {

    var timesRun = 0;
    var interval = setInterval(function(){
        timesRun += 1;
        if(timesRun === 5){
            clearInterval(interval);
        }
        window.dispatchEvent(new Event('resize'));
    }, 62.5);
}