jQuery(document).ready(function () {
    $(".custom-select .selected").on("click", function () {
        var hasActiveClass = $("div.select-box").hasClass("active");
        if (hasActiveClass === false) {
            var windowHeight = $(window).outerHeight();
            var dropdownPosition = $(this).offset().top;
            var dropdownHeight = 95; // dropdown height

            if (dropdownPosition + dropdownHeight + 50 > windowHeight) {
                $("div.select-box").addClass("drop-up");
            }
            else {
                $("div.select-box").removeClass("drop-up");
            }

            var currentUniversity = $(this).find('text').text().trim();

            $.each($("ul.select-list li"), function () {
                var university = $(this).text().trim();
                if (university === currentUniversity)
                    $(this).addClass("active");
                else
                    $(this).removeClass("active");
            });
        }
        $(this).toggleClass('active');
        $("div.select-box").toggleClass("active");
    });

    $("ul.select-list li").on("click", function () {
        var university = $(this).html();
        $("span.text").html(university);
        $("div.select-box").removeClass("active");
        $(".custom-select .selected").removeClass('active');
    });

    $("ul.select-list li").hover(function () {
        $("ul.select-list li").removeClass("active");
    });

    $(document).click(function (event) {
       if ($(event.target).closest("div.custom-select").length < 1) {
            $("div.select-box").removeClass("active");
            $(".custom-select .selected").removeClass('active');
        }
    });
	
	jQuery('.mobile-tabs.tabs-nav li').click(function(e){
		e.preventDefault();
		  jQuery('.mobile-tabs.tabs-nav li').removeClass('active');
		  jQuery(this).addClass('active');
		  if(jQuery(this).hasClass('package')){
			  jQuery('.tabs-content #package').addClass('active');
			  jQuery('.tabs-content #kilogram').removeClass('active');
		  } else if(jQuery(this).hasClass('kilogram')){
			  jQuery('.tabs-content #package').removeClass('active');
			  jQuery('.tabs-content #kilogram').addClass('active');
		  }
	});
	
    jQuery('.cart-bottom .cart-bt-item.last').on('click', function(){
		$('.coupon_code').toggleClass('coupon_active');
	});

    let qty = $('.showcart .counter .qty').text();
    if(qty == ""){
        jQuery('.action.showcart').on('click', function(){
            $('.message_empty').toggleClass('active_message');
        });
    }

})