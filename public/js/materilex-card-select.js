$(".card-can-select").each(function() {
	$element = $(this);
	var $cards = $(this).find(".card");
	$cards.each(function() {
		$(this).click(function() {
			$active = $element.find(".card.active");
			$active.removeClass("active");
			$(this).addClass("active");
		})
	})
})
