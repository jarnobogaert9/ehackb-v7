'use strict';
$(function () {
    $('#autocomplete').keyup((e) => {
        $('#autofillList').empty();

        let names = jQuery.grep(usernames, (n) => {
            return n.includes($('#autocomplete').val().toLowerCase());
        });

        names.slice(0, 5).forEach(function (n) {
            let element = $('<li>' + n + '</li>');
            element.click((e) => {
                $('#autocomplete').val(e.currentTarget.innerText);
            });
            $('#autofillList').append(element);
        });
    });
});