$.fn.mxIcon = function(args) {
    var Defaults = {
        iconName : "",
        addClass : undefined, 
        width : undefined,
        height : undefined,
        square : undefined,
    }
    
    args = $.extend(true, {}, Defaults, args);
    var $element = $(this);
    
    $.ajax({
        url: '/svg/' + args.iconName + ".svg",
        dataType: "text",
        success: function (svg) {
            
            $element.html(svg)
            $element.addClass("icon");
            if (args.addClass !== undefined) {
                $element.addClass(args.addClass);
            }
            
            var $svg = $element.find("svg");
            if (args.width !== undefined) {
                $svg.css("width", args.width);
            }
            
            if (args.height !== undefined) {
                $svg.css("height", args.height);
            }
            
            if (args.square !== undefined) {
                $svg.css("width", args.square);
                $svg.css("height", args.square);
            }
        }
    })
}

$.fn.dataIcon = function() {
    $(this).find("[data-icon]").each(function() {
        var data = $(this).data("icon");
        if ($.isPlainObject(data)) {
            $(this).mxIcon(data);
        } else {
            $(this).mxIcon({
                iconName : data,
            })
        }
    })
}

$("body").dataIcon();