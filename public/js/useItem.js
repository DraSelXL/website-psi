/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/useItem.js ***!
  \*********************************/
window.onload = startChecking();
var check;

function startChecking() {
  gameStateCheck();
  check = setInterval(gameStateCheck, 5000);
}

function gameStateCheck() {
  $.ajax({
    url: 'useItem/gameState',
    method: 'post'
  }).done(function (response) {
    if (response == "1") {
      document.getElementById("game-state").className = "text-2xl text-green-900";
      $("#game-state").html("Items can be used currently...");
    } else {
      document.getElementById("game-state").className = "text-2xl text-red-900";
      $("#game-state").html("Items can not be used currently...");
    }
  });
}

$(".itemButton").on("click", function () {
  console.log($(this).attr("desc"));
  var desc = $(this).attr("desc");
  var fx = '(Usage effect: ' + $(this).attr("effect") + ')';
  var title = $(this).attr("name");
  var id = $(this).attr("id");
  var name = $(this).attr("name");
  var effect = $(this).attr("effect");
  var qty = $(this).attr("qty");
  var idp = "i_" + id;
  $.confirm({
    title: '',
    useBootstrap: false,
    boxWidth: '400px',
    type: 'blue',
    content: "\n<div class=\"text-6xl text-center text-blue-400 my-4\">\n    <i class=\"fas fa-box-open\"></i>\n</div>\n<div class=\"text-xl text-center font-bold modal-title\">\n\n</div>\n<div class=\"text-lg modal-content\">\n\n</div>\n",
    onContentReady: function onContentReady() {
      $(".modal-content").html(desc);
      $(".modal-title").html(title);
      $(".modal-content").append("<br>");
      $(".modal-content").append(fx);
    },
    buttons: {
      yes: {
        text: 'Use',
        btnClass: 'btn-green',
        action: function action() {
          $.ajax({
            url: 'useItem/use',
            method: 'post',
            data: {
              itemID: id,
              itemName: name,
              itemEffect: effect,
              itemQty: qty
            }
          }).done(function (response) {
            if (response == "1") {
              $.alert({
                title: '',
                type: 'green',
                boxWidth: '400px',
                useBootstrap: false,
                content: "\n                                               <div class=\"text-6xl text-center text-green-500 my-4\">\n                                                   <i class=\"fas fa-check\"></i>\n                                               </div>\n                                               <div class=\"text-xl text-center font-bold\">\n                                                   Item Successfully used!\n                                               </div>\n                                               <div class=\"text-lg text-center\">\n                                                   Reminder: You can't use another boost item if another item is still active!\n                                               </div>"
              });
              $.ajax({
                url: 'updateGoldAndPoints',
                method: 'post'
              }).done(function (response) {
                $("#gap").html(response);
              });
              qty = qty - 1;
              $("#" + idp).html("x " + qty);

              if (id != 1) {
                $("#a_" + id).html("[A]");
              }
            } else if (response == "-1") {
              $.alert({
                title: '',
                type: 'red',
                boxWidth: '400px',
                useBootstrap: false,
                content: "\n                                               <div class=\"text-6xl text-center text-red-500 my-4\">\n                                                   <i class=\"fas fa-coins\"></i>\n                                               </div>\n                                               <div class=\"text-xl text-center font-bold\">\n                                                   You cannot use this item!\n                                               </div>\n                                               <div class=\"text-lg text-center\">\n                                                   The same type of boost cannot be used in the same time!\n                                               </div>"
              });
            } else if (response == "-2") {
              $.alert({
                title: '',
                type: 'red',
                boxWidth: '400px',
                useBootstrap: false,
                content: "\n                                               <div class=\"text-6xl text-center text-red-500 my-4\">\n                                                   <i class=\"fas fa-coins\"></i>\n                                               </div>\n                                               <div class=\"text-xl text-center font-bold\">\n                                                   You cannot use this item!\n                                               </div>\n                                               <div class=\"text-lg text-center\">\n                                                   You can not use item in this game state...\n                                               </div>"
              });
            } else {
              $.alert({
                title: '',
                type: 'red',
                boxWidth: '400px',
                useBootstrap: false,
                content: "\n                                               <div class=\"text-6xl text-center text-red-500 my-4\">\n                                                   <i class=\"fas fa-coins\"></i>\n                                               </div>\n                                               <div class=\"text-xl text-center font-bold\">\n                                                   You cannot use this item!\n                                               </div>\n                                               <div class=\"text-lg text-center\">\n                                                   You don't have this item. Buy some at the shop...\n                                               </div>"
              });
            }
          });
        }
      },
      no: {
        text: 'Cancel',
        btnClass: 'btn-red'
      }
    }
  });
});
/******/ })()
;