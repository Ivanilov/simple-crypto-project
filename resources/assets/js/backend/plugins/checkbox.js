$(function() {
    switcheryCall();

    function switcheryCall(){
        $(function() {
            if (Array.prototype.forEach) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
                elems.forEach(function(html) {
                    var switchery = new Switchery(html);
                });
            }
            else {
                var elems = document.querySelectorAll('.switchery');
                for (var i = 0; i < elems.length; i++) {
                    var switchery = new Switchery(elems[i]);
                }
            }

            if (Array.prototype.forEach) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery-primary'));
                elems.forEach(function(html) {
                    var switchery = new Switchery(html, { color: '#2196F3' });
                });
            }
            else {
                var elems = document.querySelectorAll('.switchery-primary');
                for (var i = 0; i < elems.length; i++) {
                    var switchery = new Switchery(elems[i], { color: '#2196F3' });
                }
            }

            var danger = document.querySelector('.switchery-danger');
            var switchery = new Switchery(danger, { color: '#EF5350' });

            var warning = document.querySelector('.switchery-warning');
            var switchery = new Switchery(warning, { color: '#FF7043' });

            var info = document.querySelector('.switchery-info');
            var switchery = new Switchery(info, { color: '#00BCD4'});
        });
    }

    // Default initialization
    $(".styled, .multiselect-container input").uniform({
        radioClass: 'choice'
    });

    // File input
    $(".file-styled").uniform({
        wrapperClass: 'bg-blue',
        fileButtonHtml: '<i class="icon-file-plus"></i>'
    });

    // Primary
    $(".control-primary").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-primary-600 text-primary-800'
    });

    // Danger
    $(".control-danger").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-danger-600 text-danger-800'
    });

    // Success
    $(".control-success").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-success-600 text-success-800'
    });

    // Warning
    $(".control-warning").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-warning-600 text-warning-800'
    });

    // Info
    $(".control-info").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-info-600 text-info-800'
    });

});
