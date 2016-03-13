/**
 * The ajax handler incapsulated objet, helps on working with ajax queries.
 * 
 * @author Narek T.
 * @created at 6nd day of February 2016
 * @var {object} ajaxHandler
 */
var ajaxHandler = (function() {
    // Private properties
    
    // Private functions
    
    // Public functions
    return {
        sendAjaxRequest: function(params, doneCallback, alwaysCallback, failCallback) {
            // Send ajax request and handle any issues
            $.ajax(params)
            // Called on successfull response
            .done(function(data) {
                // Make sure the callback is a function
                if (typeof doneCallback === "function") {
                    // Call it, since we have confirmed it is callable
                    doneCallback(data);
                }
            })
            // Call on failure by server
            .fail(function() {
                // Make sure the callback is a function
                if (typeof failCallback === "function") {
                    // Call it, since we have confirmed it is callable
                    failCallback();
                } else {
                    // alert("Something went wrong. We are working hard to fix it.");
                }
            })
            // Called anytime after ajax request
            .always(function(data) {
                // Make sure the callback is a function
                if (typeof alwaysCallback === "function") {
                    // Call it, since we have confirmed it is callable
                    alwaysCallback(data);
                }
            });
        },
        /**
         * Checks if the status attribute in json object is success
         * 
         * @param {object} data
         * @returns {boolean}
         */
        isSuccess: function(data) {
            return (!mainHelper.empty(data) && data.status == 'success') ? true : false;
        }
    }
}());