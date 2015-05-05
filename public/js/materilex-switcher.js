$.fn.mxSwitcher = function(args, checkedFallback, uncheckedFallback) {
    var Defaults = {
        switchText : ""
    }
    
    args = $.extend(true, {}, Defaults, args);
    $(this).wrap('<div class="input-switch"/>')
    var $parent = $(this).parent();

    $parent.append('<div class="switcher"/>')
    $parent.append('<div class="switch-label">'+ args.switchText +'</div>')

    var $switcher = $parent.find(".switcher")
    $switcher.addClass($(this).attr("class"));

    $switcher.append('<div class="switcher-back"/>')
    $switcher.append('<div class="switcher-front"/>')

    var $labelSwitch = $parent.find(".switch-label")
    var $front = $parent.find(".switcher-front")
    var $input = $parent.find('input[type="checkbox"]');

    $front.append('<div class="switcher-ripple"/>')
    var $ripple = $parent.find('.switcher-ripple');
    if($input.is(':checked')) {
        $switcher.addClass("active");
        $labelSwitch.addClass("active");
    }

    var isDisabled = false;
    if($input.is(':disabled')) {
        $switcher.addClass("disabled");
        $labelSwitch.removeClass("active");
        isDisabled = true;
    }

    $switcher.on("click", function() {
        switcherState();
    })

    $labelSwitch.on("click", function() {
        switcherState();
    })


    function switcherState() {
        if (!isDisabled) {
            $ripple.addClass("clicked");
            $ripple.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function() {
                $ripple.fadeOut("fast", function(){
                    $(this).removeClass("clicked");
                    $ripple.fadeIn("fast");
                });
            });

            $switcher.toggleClass("active");
            $labelSwitch.toggleClass("active");

            if ($switcher.hasClass("active")) {
                $input.prop('checked',true);
                if (checkedFallback !== undefined) {
                    checkedFallback();
                }
                
            } else {
                $input.prop('checked',false);
                if (uncheckedFallback !== undefined) {
                    uncheckedFallback();
                }
                
            }
        }
    }
}

$("[data-switch]").each(function() {
    var $switchText = $(this).data("switch");
    
    if ($switchText == undefined) {
        $(this).mxSwitcher();
    } else {
        $(this).mxSwitcher({
            switchText :$switchText
        })
    }
})     

	