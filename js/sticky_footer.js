var footerHeight = '';
var headerHeight = '';
var windowHeight = '';

$(document).ready(function() {
    calculateContentHeight();
});

$(window).resize(function() {
    calculateContentHeight();
});

function calculateContentHeight() {
    windowHeight = parseInt($(window).height());
    headerHeight = parseInt($('.navbar').outerHeight(true));
    contentHeight = parseInt($('.content').outerHeight(true)) - 90;
    footerHeight = parseInt($('.footer').outerHeight(true));
    stickyMakerHeight = windowHeight - (headerHeight + contentHeight + footerHeight);
    
    if(stickyMakerHeight < 0) {
        stickyMakerHeight = 0;
    }
    if (!isNaN(contentHeight)) {
        $('.sticky-maker').height(stickyMakerHeight);
    }
}