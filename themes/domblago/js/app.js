$ = jQuery.noConflict();

App = {
    // Properties
    baseUrl: APP_BASE_URL,
    
    // List of events that have to be triggerd
    eventList: {
        documentReady: [],
        windowResize: []
    },
    
    // App to jquery event map
    eventMap: {
    },
    
    // initialize app
    init: function () {
    },
    
    // Events that must be fired after HTML document is ready
    attachDocumentReadyEvents: function () {
    }
};

App.init();

$(document).ready(function () {
    App.attachDocumentReadyEvents();
});






