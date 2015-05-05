$.fn.mxSideNavigation = function(args) {
    var Defaults = {
        target : "",
    }

    args = $.extend(true, {}, Defaults, args);
    var $element = $(this);
    var $target = $(args.target);
    $target.prepend('<div class="side-overlay"></div>');
    var $targetOverlay = $target.find(".side-overlay");
    var $navlists = $target.find(".nav-list");

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

    $navlists.each(function() {
        $(this).on("click", function() {
            var $activeNav = $target.find(".nav-list.active");
            $activeNav.removeClass("active");
            $(this).addClass("active");

            $target.removeClass("active");
            afterInActive();
        })
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

$("[data-side-navigation]").each(function() {
    var $target = $(this).data("side-navigation");
    
    $(this).mxSideNavigation({
        target : $target,
    });
})

	