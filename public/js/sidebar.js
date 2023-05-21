$(".sidebar ul li a").on('click', function(){
    // Remove the active class from all links
    $(".sidebar ul li a.active").removeClass('active');
    // Add the active class to the current link
    $(this).addClass('active');
})

$('.open-btn').on('click', function(){
    $('.sidebar').addClass('active');
})

$('.close-btn').on('click', function(){
    $('.sidebar').removeClass('active');
})

document.addEventListener("DOMContentLoaded", function () {
    var dropToggle = $('.dropdown-toggle');
    dropToggle.on('click', function (e) {
        e.stopPropagation();
        var expanded = $(this).attr('aria-expanded');
        $(this).attr('aria-expanded', expanded === 'false' ? 'true' : 'false');
        $(this).next().toggleClass('show');
        $(this).find('.fa-angle-down').toggleClass('rotate');
    });
});