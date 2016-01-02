$(document).ready(function() {
        $('.remove-item-confirm').click(function(e) {
            e.preventDefault();
            var url = $(this).data('href');//get the url of the current clicked anchor tag
            $('#confirm-delete-anchor').attr('href',url);//get the url of the current clicked anchor tag
        });

});
