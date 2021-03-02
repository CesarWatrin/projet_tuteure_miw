let navbar = $('#navbar');

if($('#map').length) {
    navbar.addClass("navbar_blue");
} else {
    $(window).scroll(function() {
        if ($(window).scrollTop() > $(window).height()) {
            navbar.addClass("navbar_blue");
        } else {
            navbar.removeClass("navbar_blue");
        }
    });

}
