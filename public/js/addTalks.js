'use strict';
$(function () {
    let selectedTalks = 0;
    let form = $('#form');

    function appendForm(talkId){
        form.append($(`<input type="hidden" name="requestedTalks[]" value="${talkId}" id="input${talkId}"/>`));
    }

    function checkTotAmount(){
        if (selectedTalks <= 0){
            $('form button').attr('disabled', true);
        }
        else{
            $('form button').attr('disabled', false);
        }
    }

    $(".card:not(.bg-transparent)").click((e) => {
        let target = $(e.currentTarget);
        if (!target.hasClass("selected")){
            selectedTalks++;
            appendForm(e.currentTarget.id);
            target.addClass("selected");
        }
        else{
            selectedTalks--;
            $(`#input${e.currentTarget.id}`).remove();
            target.removeClass("selected");
        }

        checkTotAmount();
    });

    checkTotAmount();
});