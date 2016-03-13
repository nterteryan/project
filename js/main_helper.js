/**
 * Main functions that could be used by all the scripts
 * 
 * @author Narek T.
 * @created at 6nd day of February 2016
 * @var {object} mainHelper
 */
var mainHelper = (function() {
    
    // Private properties
    
    // Private fucntions

    // Public functions
    return {
        /**
         * Check if variable exists and is not empty
         * 
         * @param {string} param
         * @returns {boolean}
         */
        empty: function(param) {
            return (typeof (param) === 'undefined' || param === null || param == '') ? true : false;
        }
    }
})();