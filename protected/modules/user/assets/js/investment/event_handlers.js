/**
 * Object containing all event handlers
 * 
 * @author Narek T.
 * @created at 12nd day of March 2016
 * @var {object} eventHandlers
 */
var eventHandlers = (function() {
    
    // Private properties
    
    // Private methods
    
    /**
     * Fetch this from the event
     * 
     * @param {DOMEvent} event
     * @param {boolean} getJqueryObject
     * @returns {DOMEvent.target|EventTarget|DOMEvent.srcElement|Event.srcElement}
     */
    function getTarget(event, getJqueryObject) {
        // Check whether jquery object is requested
        var getJqueryObject = getJqueryObject || true;
        // Get target / this
        var target = event.target || event.srcElement; // IE
        
        return getJqueryObject ? $(target) : target;
    }

    
    // Public methods
    return {
        custom: {
            
        },
        onChange: {
            
        },
        onSubmit: {
            
        },
        onClick: {
            sendPercent: function(event, element) {
                id = element.attr("href");
                // Send ajax request
                ajaxHandler.sendAjaxRequest({
                    url: '/user/investment/sendPercent',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id: id},
                }, function(mes) {
                    if (!mes.error) {
                        html = '<div class="alert alert-success col-xs-12">';
                        html += "success";
                        html += '</div>';
                        $("#danger").html(html);
                        setTimeout(function() {
                            element.parents("tr").children().eq(2).text("0 $");
                            element.css("background","#0DAD0D");
                            element.addClass("disabled");
                            $('.premium_b').remove();
                        }, 500);
                    } else {
                        // html = '<div class="alert alert-danger col-xs-12">';
                        // html += mes.error;
                        // html += '</div>';
                        // if (mes.amountAdd) {
                        //     html += '<div class="col-xs-12 margin-bottom-10"><a href="/user/finance" class="btn btn-success" >Add amount </a></div>';
                        // }
                        // $("#danger").html(html);
                    }
                });
            },            
            sendRefund: function(event, element) {
                id = element.attr("href");
                // Send ajax request
                ajaxHandler.sendAjaxRequest({
                    url: '/user/investment/sendRefund',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id: id},
                }, function(mes) {
                    if (!mes.error) {
                        alert("1223");
                        // $("#danger").html(html);
                        // setTimeout(function() {
                        //     element.parents("tr").children().eq(2).text("0 $");
                        //     element.css("background","#0DAD0D");
                        //     element.addClass("disabled");
                        //     $('.premium_b').remove();
                        // }, 500);
                    } else {
                        // html = '<div class="alert alert-danger col-xs-12">';
                        // html += mes.error;
                        // html += '</div>';
                        // if (mes.amountAdd) {
                        //     html += '<div class="col-xs-12 margin-bottom-10"><a href="/user/finance" class="btn btn-success" >Add amount </a></div>';
                        // }
                        // $("#danger").html(html);
                    }
                });
            }
        },
        onDblClick: {
            
        }
    };
})();