/**
 * The file must contain only listers, the busness logic must be handled
 * by halper functions
 * 
 * @author Narek T.
 * @created at 13th day of March 2016
 */
$(document).ready(function() {
    
    // On clicking on add plan button
    $(document.body).on('click', '.premiumAdd', function(e) {
        // Prevent default action
        e.preventDefault();
        // Trigger handler add to cart process
        eventHandlers.onClick.addPremium(e, $(this));
    });
    // On clicking on remove all button
    $(document.body).on('click', '#approvePremiumPackage', function(e) {
        // Prevent default action
        e.preventDefault();
        // Trigger handler add to cart process
        eventHandlers.onClick.approvePremiumPackage(e, $(this));
    });
});