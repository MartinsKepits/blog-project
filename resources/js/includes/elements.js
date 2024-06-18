$(document).ready(function () {
    // Page message
    setTimeout(function() {
        $('#page-message').addClass('opacity-0 invisible');
    }, 5000);

    // Post rating
    $('.post-rating input[type="radio"]').change(function() {
        $('#post-rating-form').submit();
    });
});

