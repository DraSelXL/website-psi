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
  $("#inven-btn").on("click", function () {
    $.ajax({
      url: "/inventory",
      method: "get"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#achievement-btn").on("click", function () {
    $.ajax({
      url: "/achievement",
      method: "get"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#history-btn").on("click", function () {
    $.ajax({
      url: "/history",
      method: "get"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#stats-btn").on("click", function () {
    $.ajax({
      url: '/stats',
      method: 'get'
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  loadMaterials();
});

function toggleNavbar() {
  $("#the-navbar").toggleClass("-translate-x-52");
  $("#psi2021").toggleClass("hidden");
  $("#navbar-items").toggleClass("hidden");
}

function loadMaterials() {
  $.ajax({
    url: "/shop",
    method: "get"
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