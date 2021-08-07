/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/navbar.js ***!
  \********************************/
$(function () {
  var theNavbar = $("#the-navbar");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#hamburger-btn").on("click", toggleNavbar);
  $(".navbar-btn").on("click", toggleNavbar);
  $("#shop-btn").on("click", loadMaterials);
  $("#home-btn").on("click", loadHome);
  $("#inven-btn").on("click", function () {
    $.ajax({
      url: "/inventory",
      method: "post"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#leaderboard-btn").on("click", function () {
    $.ajax({
      url: "/leaderboard",
      method: "post"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#achievement-btn").on("click", function () {
    $.ajax({
      url: "/achievement",
      method: "post"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#history-btn").on("click", function () {
    $.ajax({
      url: "/history",
      method: "post"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#stats-btn").on("click", function () {
    $.ajax({
      url: '/stats',
      method: 'post'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  loadHome();
  check = setInterval(gameStateCheck, 5000);
});

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

function loadHome() {
  $.ajax({
    url: "/home",
    method: "post"
  }).done(function (response) {
    $("#content").html(response);
  });
}

function toggleNavbar() {
  $("#the-navbar").toggleClass("-translate-x-52");

  if (!$("#psi-2021").hasClass('hidden')) {
    setTimeout(function () {
      $("#psi-2021").toggleClass('hidden');
    }, 300);
  } else $("#psi-2021").toggleClass('hidden');

  if (!$("#navbar-items").hasClass('hidden')) {
    setTimeout(function () {
      $("#navbar-items").toggleClass('hidden');
    }, 300);
  } else $("#navbar-items").toggleClass('hidden');

  $("#logout-btn").toggleClass('hidden');

  if ($("#navbar-space").hasClass('z-50')) {
    setTimeout(function () {
      $("#navbar-space").toggleClass('z-50');
    }, 300);
  } else $("#navbar-space").toggleClass('z-50');

  var modal = $("#modal");

  if (modal.children().length > 0) {
    modal.html("");
    $("#content").toggleClass("opacity-50");
    modal.toggleClass("hidden");
  }
}

function loadMaterials() {
  $.ajax({
    url: "/shop",
    method: "post"
  }).done(function (response) {
    $("#content").html(response);
  });
}

function updateGoldAndPoints() {
  $.ajax({
    url: 'updateGoldAndPoints',
    method: 'post'
  }).done(function (response) {
    $("#gap").html(JSON.parse(response));
  });
}
/******/ })()
;