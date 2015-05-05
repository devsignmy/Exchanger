$.fn.mxParallex = function(args) {
    var $element = $(this);
    var $pBack = $element.find(".parallax-background");
    var $pOlay = $element.find(".parallax-overlay");
    var $pOlayOpacity = $pOlay.css("opacity");

    var $get = (document.compatMode === "CSS1Compat") ? 
        document.documentElement :
        document.body;

    var windowHeight;
    var startFrom ;
    var endFrom ;

    ParallexMiddleWare()

    $(window).on("resize", function() {
        ParallexMiddleWare();
    })

    $(window).on("scroll", function() {

        var windowYOffset = window.pageYOffset;
        
        
        if (windowYOffset >= startFrom - windowHeight && windowYOffset <= endFrom ) {
            var initialValue = startFrom - windowHeight;
            var speed = 2;

            if (startFrom < windowHeight) {
                initialValue = 0;
            }

            var percentScroll = (windowYOffset - initialValue) / (endFrom - initialValue) * 100 / speed;
            $pBack.css({
                'transform' : 'translate(-50%, -'+ percentScroll +'%)'
            });

            $cOpacity = ((percentScroll/100)*10 + $pOlayOpacity*10) /10 * 1.5;
            $pOlay.css ({
                "opacity" : $cOpacity,
            })
        }
    })

    function ParallexMiddleWare() {
        windowHeight = $get.clientHeight;
        startFrom = $element.offset().top;
        endFrom = $element.offset().top + $element.outerHeight();

        if ($pBack.outerHeight()  < $element.outerHeight() * 2) {
            cHeight = $element.outerHeight() * 2;
            cRatio = $pBack.outerWidth() / $pBack.outerHeight();

            $pBack.width(cRatio * cHeight);
        }
    }
}

$(document).ready(function() {
    $(".parallax").each(function() {
        $(this).mxParallex();
    })
})


	