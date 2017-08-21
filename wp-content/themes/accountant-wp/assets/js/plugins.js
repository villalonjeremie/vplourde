
   
// ============================================================================
// mental_menu plugin
// ============================================================================



    var pluginName = 'mental_menu';
    var defaults = {
      easing: 'easeOutBack',
      speed: 'slow'
    };

    function Plugin(element, options) {
        this.element = element;
        this.$element = jQuery(element);
        this.options = jQuery.extend({}, defaults, options);
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype = {
         init: function() {
            var that = this;

            // Bind toggler button
           this.$element.find('.submenu-toggler').on('click', function(e){
               e.preventDefault();
               that.toggle_sub(jQuery(this).siblings('ul'), jQuery(this).find('i.fa'));
            });

         },
         toggle_sub: function($sub_ul, $icon){
            if($icon.hasClass('fa-angle-down')) $icon.removeClass('fa-angle-down').addClass('fa-angle-up');
            else $icon.removeClass('fa-angle-up').addClass('fa-angle-down');
            $sub_ul.slideToggle(this.options.speed, this.options.easing);
           
         }
    } // Plugin.prototype

    jQuery.fn[pluginName] = function(options) {
        var args = [].slice.call(arguments, 1);
        return this.each(function() {
            if (!jQuery.data(this, 'plugin_' + pluginName))
                jQuery.data(this, 'plugin_' + pluginName, new Plugin(this, options));
            else if (jQuery.isFunction(Plugin.prototype[options]))
                jQuery.data(this, 'plugin_' + pluginName)[options].apply(jQuery.data(this, 'plugin_' + pluginName), args);
        });
    }
