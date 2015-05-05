$.fn.mxPopup = function(args) {
    var Defaults = {
        target : "",
    }
    
    args = $.extend(true, {}, Defaults, args);
    var $this = $(this);
    var $target = $(args.target);
    $target.append('<div class="after"></div>');
    var $targetAfter = $target.children(".after");
    var $bodyWidth = $("body").width();
    var $targetWidth = $target.width();
    var $leftPosition = $this.position().left;

    if ($bodyWidth - $leftPosition - 16 < $targetWidth) {
        $leftPosition = $bodyWidth - 16 - $targetWidth;
    }

    // $target.attr('data-after','100px');
    $target.css({ left: $leftPosition});
    $targetAfter.css({ left : $this.position().left + ($this.innerWidth()/2) - ($targetAfter.outerWidth()/2) - $leftPosition})
    $( window ).resize(function() {
        $leftPosition = $this.position().left;
        $bodyWidth = $("body").width();
        $targetWidth = $target.width();

        if ($bodyWidth - $leftPosition - 16 < $targetWidth) {
            $leftPosition = $bodyWidth - 16 - $targetWidth;
        }

        $target.css({ left: $leftPosition});
        
    });
    console.log($this.innerWidth()/2)
    

    $this.on("mouseup", function(e) {
        $target.toggleClass("active");
    })
    
}


    