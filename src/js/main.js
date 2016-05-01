

function updateMasonry() {
    var container = $('.masonry-row').masonry({
        itemSelector : '.masonry-item',
        columnWidth: '.grid-sizer',
        percentPosition: true
    });
    container.imagesLoaded(function () {
        container.masonry();
    });
    container.masonry('reloadItems');
    container.masonry('layout');
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


