'use strict';
$(function () {
   function showPlayScreen() {
       $('#mainItems').hide();
       $('#newGameItems').hide();
       $('#playItems').show();
   }

   function showNewGameScreen() {
       $('#playItems').hide();
       $('#newGameItems').show();
   }

   function showMainScreen(){
       $('#playItems').hide();
       $('#newGameItems').hide();
       $('#mainItems').show();
   }

   $('.playButton').click(() => showPlayScreen());
   $('#newGameButton').click(() => showNewGameScreen());
   $('.mainMenuButton').click(() => showMainScreen());
});