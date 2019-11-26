$(document).ready(function() {
    updateSelect2();

    $('body').on('change', '.select', function(){
        updateSelect2();
    });

    $('body').on('change', '.select-search', function(){
        updateSelect2();
    });

    function updateSelect2()
    {
        $('.select').each(function() {
            var options = {
                minimumResultsForSearch: Infinity
            };
            if($(this).hasClass('select-size-lg')){
                options['containerCssClass'] = 'select-lg';
            }
            if($(this).hasClass('select-size-sm')){
                options['containerCssClass'] = 'select-sm';
            }
            if($(this).hasClass('select-size-xs')){
                options['containerCssClass'] = 'select-xs';
            }
            $(this).select2(options);
        });

        $('.select-search').each(function() {
            var options = {};
            if($(this).hasClass('select-size-lg')){
                options['containerCssClass'] = 'select-lg';
            }
            if($(this).hasClass('select-size-sm')){
                options['containerCssClass'] = 'select-sm';
            }
            if($(this).hasClass('select-size-xs')){
                options['containerCssClass'] = 'select-xs';
            }
            $(this).select2(options);
        });

        $('.select-icons').each(function() {
            var options = {
                templateResult: iconFormat,
                minimumResultsForSearch: Infinity,
                templateSelection: iconFormat,
                escapeMarkup: function(m) { return m; }
            };
            if($(this).hasClass('select-size-lg')){
                options['containerCssClass'] = 'select-lg';
            }
            if($(this).hasClass('select-size-sm')){
                options['containerCssClass'] = 'select-sm';
            }
            if($(this).hasClass('select-size-xs')){
                options['containerCssClass'] = 'select-xs';
            }
            $(this).select2(options);
        });
    }
});