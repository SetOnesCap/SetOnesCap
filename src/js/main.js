function updateMasonry() {
    var $container = $('.row').masonry();
    $container.imagesLoaded(function () {
        $container.masonry();
    });
}
$(window).load(function () {
    updateMasonry();
});

$(".input-group input").change(function () {
    console.log("change");
    $(this).removeClass("is-not-empty");
    if ($(this).val() == "") {
    } else {
        $(this).addClass("is-not-empty");
    }
});
$(".sidenav-toggle").click(function () {
    if ($("body").hasClass("sidebar-active")) {
        $("body").removeClass("sidebar-active");
    } else {
        $("body").addClass("sidebar-active");
    }
    window.setTimeout(updateMasonry, 300);
});