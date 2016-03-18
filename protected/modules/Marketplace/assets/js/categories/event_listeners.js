/**
 * 
 * @author Hovo G.
 * @created at 14th day of March 2016
 */
$(document).ready(function() {
    
    // On clicking on add plan button
    $(document.body).on('submit', '#catForm', function(e) {
        e.preventDefault();
        // Trigger handler add to cart process
        eventHandlers.submit.catForm(e, $(this));
    });    
    // On clicking on add plan button
    $(document.body).on('click', '.editCat', function(e) {
        e.preventDefault();
        // Trigger handler add to cart process
   		// $()     
        eventHandlers.onClick.editCat(e, $(this));

    });    
    // On clicking on add plan button
    $(document.body).on('click', '.deleteCat', function(e) {
        e.preventDefault();
        eventHandlers.onClick.deleteCat(e, $(this));
    });   
    
});