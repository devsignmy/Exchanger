$.fn.mxActivate = function(args) {
    var Defaults = {
        target : "",
        on: "click"
    }

    args = $.extend(true, {}, Defaults, args);
    var $element = $(this);
    var $target = $(args.target);
    
    $element.on(args.on, function() {
        $target.addClass("active");
    })
}

$.fn.mxDeactivate = function(args) {
    var Defaults = {
        target : "",
        on: "click"
    }

    args = $.extend(true, {}, Defaults, args);
    var $element = $(this);
    var $target = $(args.target);
    
    $element.on(args.on, function() {
        $target.removeClass("active");
    })
}

$("[data-activate]").each(function() {
    var $target = $(this).data("activate");
    
    $(this).mxActivate({
        target : $target,
    });
})

$("[data-deactivate]").each(function() {
    var $target = $(this).data("deactivate");
    
    $(this).mxDeactivate({
        target : $target,
    });
})

	