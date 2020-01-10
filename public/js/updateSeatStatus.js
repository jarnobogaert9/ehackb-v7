'use strict';
$(function () {
    function appendForm(num){
        $('#submitForm').append($(`<input type="hidden" name="selectedSeats[]" value="${num}" id="${num}"/>`));
        currSeats--;
    }

    function removeFromForm(num){
        $(`#${num}`).remove();
        currSeats++;
    }

    $('.seat').not('.unavailable').click(function (e) {
        console.log("eh");
        if($(this).hasClass('selected') && currSeats !== maxSeats) {
            removeFromForm($(this).children('p')[0].textContent);
            $(this).removeClass('selected');
        }
        else if(!$(this).hasClass('selected') && currSeats > 0){
            appendForm($(this).children('p')[0].textContent);
            $(this).addClass('selected');
        }
        $('#currSeats span').text(currSeats);
    });
});