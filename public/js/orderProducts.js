'use strict';
$(function () {
    let selectedProducts = [];
    let text = $('#amountToDeposit .card-title span');
    let totAmount = 0;
    let form = $('#form');

    function appendForm(prodId){
        form.append($(`<input type="hidden" name="orderedProducts[]" value="${prodId}" id="input${prodId}"/>`));
    }

    function checkTotAmount(){
        text.text(totAmount);
        if (totAmount <= 0){
            $('form button').attr('disabled', true);
        }
        else{
            $('form button').attr('disabled', false);
        }
    }

    $(".card:not(#amountToDeposit)").click((e) => {
        let currProd = products[+(e.currentTarget.id)];
        totAmount += currProd.price;

        if (selectedProducts[currProd.id] === undefined){
            selectedProducts[currProd.id] = 1;
        }
        else{
            selectedProducts[currProd.id]++;
        }

        appendForm(currProd.id);

        let listItem = $('<li class="list-group-item d-flex">' + currProd.name + '<span class="ml-auto">&euro;' + currProd.price + '</span></li>');
        let clearItem = $('<i class="material-icons ml-1">clear</i>');
        clearItem.click((f) => {
            totAmount -= currProd.price;
            f.currentTarget.parentNode.remove();
            $('#input'+currProd.id).remove();
            checkTotAmount();
        });

        listItem.append(clearItem);
        $('#history').prepend(listItem);

        checkTotAmount();
    });

    checkTotAmount();
});