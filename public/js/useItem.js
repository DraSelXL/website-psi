/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/useItem.js ***!
  \*********************************/
window.onload = startChecking();
var check;
$("#content").click(closeDetail);

function startChecking() {
  activeItemCheck();
  gameStateCheck();
  check = setInterval(gameStateCheck, 5000);
}

function activeItemCheck() {
  $.ajax({
    url: 'useItem/activeItems',
    method: 'post'
  }).done(function (response) {
    if (response == "-1") {
      $("#active-items").html("Active Items : - ");
    } else {
      var activeItems = JSON.parse(response);
      var sentence = "";
      $("#active-items").html('Active Items : ');

      for (var i = 0; i < activeItems.length; i++) {
        var id = activeItems[i].item_id; //console.log(id);

        $("#active-items").append('<div className="ml-3 h-4 w-auto flex-col"><img class="ml-3 mtl-image w-4 h-4 rounded-md" src="https://i.ibb.co/nC1qqtc/i01-Chainmail.png" alt=""></div>');

        if (i == activeItems.length - 1) {
          sentence += id + "";
        } else {
          sentence += id + ", ";
        }
      }
    }
  });
}

function gameStateCheck() {
  $.ajax({
    url: 'useItem/gameState',
    method: 'post'
  }).done(function (response) {
    if (response == "1") {
      document.getElementById("game-state").className = "ml-3 w-4 h-4 bg-green-400 rounded";
    } else {
      document.getElementById("game-state").className = "ml-3 w-4 h-4 bg-red-600 rounded";
    }
  });
}

$(".itemButton").on("click", function (e) {
  e.stopImmediatePropagation();
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
                content: "\n                                               <div class=\"text-6xl text-center text-green-500 my-4\">\n                                                   <i class=\"fas fa-check\"></i>\n                                               </div>\n                                               <div class=\"text-xl text-center font-bold\">\n                                                   Item Successfully used!\n                                               </div>\n                                               <div class=\"text-lg text-center\">\n                                                   Reminder: You can't activate another boost item while a boost item with the same name is still active.\n                                               </div>"
              });
              $.ajax({
                url: 'updateGoldAndPoints',
                method: 'post'
              }).done(function (response) {
                $("#gap").html(response);
              });
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
            } else if (response == '7') {
              $.ajax({
                url: 'useItem/useMissingSubstitute',
                method: 'post'
              }).done(function (response) {
                console.log('mashok');
                $("#modal").append(response);
                $("#content").toggleClass("opacity-50");
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
$(".subs-btn").on("click", function () {
  var mtlID = $(this).attr('id');
  mtlID = mtlID.substr(5);
  $.ajax({
    url: 'useItem/subsMaterial',
    method: 'post',
    data: {
      mtlID: mtlID
    }
  }).done(function (response) {
    if (response == '1') {
      closeDetail();
      var itemQty = $("#7").attr('qty');
      itemQty--;
      $("#7").attr('qty', itemQty);
      $("#i_7").html("x " + itemQty);
      $.alert({
        title: '',
        useBootstrap: false,
        boxWidth: '400px',
        type: 'green',
        content: "\n<div class=\"text-6xl text-center text-blue-400 my-4\">\n    <i class=\"fas fa-box-open\"></i>\n</div>\n<div class=\"text-xl text-center font-bold modal-title\">\n    Substituted successfully!\n</div>\n"
      });
    }
  });
});

function closeDetail() {
  var content = $("#content");
  var modal = $("#modal");

  if (modal.children().length > 0) {
    modal.html("");
    content.toggleClass("opacity-50");
  }
}
/******/ })()
;