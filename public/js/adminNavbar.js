/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/adminNavbar.js ***!
  \*************************************/
$(function () {
  var theNavbar = $("#the-navbar");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#hamburger-btn").on("click", toggleNavbar);
  $(".navbar-btn").on("click", toggleNavbar);
  $("#post-game-btn").on("click", loadPostGameInput);
  $("#leaderboard-btn").on("click", function () {
    $.ajax({
      url: 'admin/leaderboard',
      method: 'post'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#team-stats-btn").on("click", function () {
    $.ajax({
      url: 'admin/teamStats',
      method: 'post'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#team-history-btn").on("click", function () {
    $.ajax({
      url: 'admin/teamHistory',
      method: 'post'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#misc-btn").on("click", function () {
    $.ajax({
      url: 'admin/misc',
      method: 'post'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#manual-input").on("click", function () {
    $.ajax({
      url: 'admin/manualInput',
      method: 'post'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  loadPostGameInput();
});

function loadPostGameInput() {
  $.ajax({
    url: 'admin/postGame',
    method: 'post'
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
}
/******/ })()
;