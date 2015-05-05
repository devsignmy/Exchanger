$.fn.mxNormalInput = function(args) {
    var $element = $(this);
    $element.wrap('<div class="normal-input" />');
    var $parent = $element.parent();
    $parent.append('<div class="border-line"></div>');

    var $input = $element;
    var $border = $parent.find(".border-line");

    $input.on("focus", function() {
        $border.addClass("active");
    })
    
    $input.on("blur", function() {
        $border.removeClass("active");
    })
}

$("[data-normal-input]").each(function() {
	$(this).mxNormalInput();
})

	