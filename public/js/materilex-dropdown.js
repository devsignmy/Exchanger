$.fn.mxDropdownSelect = function(args) {
    var Defaults = {
    }
    
    args = $.extend(true, {}, Defaults, args);
    var $this = $(this);
    var $thisText = $this.find("option:selected").text();
    var $selectedIndex = $this.find("option:selected").index("option");
    var $element = $('<div class="dropdown-select"></div>');

    $this.wrap($element);
    $element = $this.parent();
    $element.append('<div class="label"></div>');
    $element.append('<div class="option"></div>');
    $element.append('<svg class="menu-icon" viewBox="0 0 24 24" data-reactid=".0.2.0.0.1.0.1.0.0.2"><polygon points="7,9.5 12,14.5 17,9.5 " data-reactid=".0.2.0.0.1.0.1.0.0.2.0"></polygon></svg>');
    var $label = $element.find(".label");
    var $option = $element.find(".option");

    $label.html($thisText);
    $this.find("option").each(function()
    {   
        if ($(this).index("option") == $selectedIndex) {
            $option.append('<div class="option-item active">'+ $(this).text() +'</div>');
        } else {
            $option.append('<div class="option-item">'+ $(this).text() +'</div>');
        }
        
    });

    $(document).click(function() { 
        $option.removeClass("active");
        $label.removeClass("active");
    }); 

    $label.on("click", function(e) {
        e.stopPropagation(); 
        $option.addClass("active");
        $label.addClass("active");

    })

    $option.find(".option-item").each(function() {
        $(this).on("click", function() {
            var $selected = $this.find("option").eq($(this).index(".option-item"));
            $selected.prop("selected", true);
            $label.html($(this).text());
            $option.find(".option-item.active").removeClass("active");
            $(this).addClass("active");
            $option.removeClass("active");
            $label.removeClass("active");
        })
    })
}

$("select").each(function() {
    $(this).mxDropdownSelect();
})     

	