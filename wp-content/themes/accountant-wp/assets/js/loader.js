jQuery(document).ready(function () {
    if(jQuery("#preloader")) {
        var name = jQuery("#preloader").data('name'),
            loaderText = jQuery("#preloader").data('loaderText'),
            customGif = jQuery("#preloader").data('customGif');
        jQuery("#preloader").introLoader({
            animation: {
                name: name,
                options: {
                    ease: "easeOutSine",
                    style: 'light',
                    delayBefore: 1000,
                    exitTime: 1000,
                    loaderText: loaderText,
                    customGif: customGif
                }
            },

            spinJs: {
                lines: 13, // The number of lines to draw
                length: 20, // The length of each line
                width: 10, // The line thickness
                radius: 30, // The radius of the inner circle
                corners: 1, // Corner roundness (0..1)
                color: '#000', // #rgb or #rrggbb or array of colors
            }
        });
    }
});

