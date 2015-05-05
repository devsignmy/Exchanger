$(window).load(function() {
 	// executes when complete page is fully loaded, including all frames, objects and images
 	// alert("window is loaded");
 	var $target = $(".loading-animation");

 	$target.addClass("hide");
 	$targetSpinner = $target.find(".spinner");

 	$target.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function() {
 		$target.css({
 			"visibility" : "hidden"
 		})
 	    $("body").css({
 	    	"overflow" : "auto",
 	    	"height" : "auto",
 	    })

 	    $targetSpinner.remove();
 	    afterLoading()
 	});
});

function afterLoading() {
	$("[data-popup]").each(function() {
	    var $popup = $(this).data("popup");
	    
	    $(this).mxPopup({
	        target : $popup,
	    });
	})     

}