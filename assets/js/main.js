$(window).load(function () {
    var $container = $('.row').masonry();
    $container.imagesLoaded(function () {
        $container.masonry();
    });
});