'use strict';
$(function () {
    let text = $('#amountToDeposit .card-title span');
    let totAmount = 0;
    let hiddenInput = $('#input');

    function checkTotAmount(){
        text.text(totAmount);
        hiddenInput.val(totAmount);
        if (totAmount <= 0){
            $('form button').attr('disabled', true);
        }
        else{
            $('form button').attr('disabled', false);
        }
    }

    $(".card:not(#amountToDeposit)").click((e) => {
        totAmount += +(e.currentTarget.id);

        let listItem = $('<li class="list-group-item d-flex">&euro;<span>' + e.currentTarget.id + '</span></li>');
        let clearItem = $('<i class="material-icons ml-auto">clear</i>');
        clearItem.click((f) => {
            totAmount -= +(e.currentTarget.id);
            f.currentTarget.parentNode.remove();
            checkTotAmount();
        });

        listItem.append(clearItem);
        $('#history').append(listItem);

        checkTotAmount();
    });

    checkTotAmount();
});