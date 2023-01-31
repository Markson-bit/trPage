$(document).ready(function () {
    $('#pokazhaslo').click(function () {
        $('#haslo').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });
});