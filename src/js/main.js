function updateMasonry() {
    var container = $('.masonry-row').masonry({
        itemSelector: '.masonry-item',
        columnWidth: '.grid-sizer',
        percentPosition: true
    });
    container.imagesLoaded(function () {
        container.masonry();
    });
    container.masonry('reloadItems');
    container.masonry('layout');
}
$(window).on('load', function () {
    updateMasonry();
});

function togglePostType(post_type, selected) {
    var box_containers = $(".box." + post_type).parent('div');
    (selected) ? box_containers.show() : box_containers.hide();
    updateMasonry();
}

var post_types = (localStorage.getItem("post_types") === null) ? {} : JSON.parse(localStorage.getItem("post_types"));
$(document).ready(function () {
    $.each(post_types, function (post_type, selected) {
        toggleActionButton(post_type, selected);
        togglePostType(post_type, selected);
    });

    $(".toggle-action-button").click(function () {
        var post_type = $(this).val();
        var selected = (post_types[post_type]) ? false : true;
        post_types[post_type] = selected;
        toggleActionButton(post_type, selected);
        togglePostType(post_type, selected);
        localStorage.setItem("post_types", JSON.stringify(post_types));
    });
});
