$.fn.mxDialog = function(args) {
    var Defaults = {
        target : "",
    }

    args = $.extend(true, {}, Defaults, args);
    var $element = $(this);
    var $target = $(args.target);
	if (!$target.find('.dialog-overlay').length) {
		$target.prepend('<div class="dialog-overlay"></div>');
	}

    var $targetOverlay = $target.find(".dialog-overlay");

	var $dialogInner =  $target.find(".dialog-inner");
	var $dialogContent = $target.find(".dialog-content");
	var $dialogHeader = $target.find(".dialog-header");
	var $dialogFooter = $target.find(".dialog-footer");

	setDialogContentHeight();


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

	$(window).on("resize", function() {
		setDialogContentHeight();
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

	function setDialogContentHeight() {
		var minusHeight = 0;
		var newHeight = $dialogInner.outerHeight();
		console.log(newHeight)
		if ($dialogHeader.outerHeight() != null) {
			minusHeight += $dialogHeader.outerHeight();
		}

		if ($dialogFooter.outerHeight() != null) {
			minusHeight += $dialogFooter.outerHeight();
		}

		newHeight -= minusHeight;

		$dialogContent.css({
			height: newHeight
		})

	}
}

$(window).load(function() {
	$("[data-dialog]").each(function() {
		var $target = $(this).data("dialog");

		$(this).mxDialog({
			target : $target,
		});
	})
})



