$(document).ready(function(){
    
    $('.toast').toast('show');

    $('.close').on('click', function() {
        $('.toast-full').empty();
    });
});
