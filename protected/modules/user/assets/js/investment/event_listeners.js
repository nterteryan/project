/**
 * 
 * @author Hovo G.
 * @created at 14th day of March 2016
 */
$(document).ready(function() {
    
    // On clicking on add plan button
    $(document.body).on('click', '.sendPercent', function(e) {
        // Prevent default action
        e.preventDefault();
        // Trigger handler add to cart process
        eventHandlers.onClick.sendPercent(e, $(this));
    });   
    // On clicking on add plan button
    $(document.body).on('click', '.sendRefund', function(e) {
        // Prevent default action
        e.preventDefault();
        // Trigger handler add to cart process
        eventHandlers.onClick.sendRefund(e, $(this));
    });
    
});