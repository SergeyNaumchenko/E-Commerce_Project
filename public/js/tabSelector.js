/*
 |--------------------------------------------------------------------------
 | Tab Activator Js
 |--------------------------------------------------------------------------
 |
 | Here is where you can add event listeners to activate tabs.

 */

// On select tab add class activate
$("#tabs li").click(function() {
    $('#tabs li').removeClass("active");
    $('#' + $(this).attr('id')).addClass("active");
    //localStorage.setItem('lastTab', $(this).attr('id'));
});

// Reactivate tab after refreshing the page
//$(function() {
//    var lastTab = localStorage.getItem('lastTab');
//    if (lastTab) $('#' + lastTab).addClass("active");
//});