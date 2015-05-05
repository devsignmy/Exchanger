$.fn.mxDialog = function(args) {
    var Defaults = {
        target : "",
    }

    args = $.extend(true, {}, Defaults, args);
    var $element = $(this);
    var $target = $(args.target);
    $target.prepend('<div class="dialog-overlay"></div>');
    var $targetOverlay = $target.find(".dialog-overlay");


    $element.on("mouseup", function() {
        $element.addClass("morphing");
        $target.css({
            "visibility" : "visible"
        })
        
        $target.toggleClass("active");
        afterInActive();
        
    })

    $targetOverlay.on("click", function() {
        $target.removeClass("active");
        afterInActive();
    })

    function afterInActive() {
        $targetOverlay.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function() {
            
            if (!$target.hasClass("active")) {
                $target.css({
                    "visibility" : "hidden"
                })
            }
        });

        if (!$target.hasClass("active")) {
            $element.removeClass("morphing");
            $(window).disablescroll("undo");
        } else {
            $(window).disablescroll();
        }
        
    }
}

$("[data-dialog]").each(function() {
    var $target = $(this).data("dialog");
    
    $(this).mxDialog({
        target : $target,
    });
})

	