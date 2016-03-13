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
            /**
             * Add product to cart
             * 
             * @author Narek T.
             * @created at 12nd day of March 2016
             * @param {DOMEvent} event
             * @returns {void}
             */
            addPremium: function(event, element) {
                event.preventDefault();
                premium_id = $(this).data("id");
                premium_month = $(this).data("month");
                premium_price = $(this).data("price");
                $("#approvePremiumPackage").show();
                $(".partnerSave").html('<div class="col-xs-12">' + premium_price + "$ за " + premium_month + " месяц </div>");
                html = "";
                html += '<div class="form-group col-xs-6">';
                html += '     <label class="contrel required col-xs-3" for="sendPin">PIN:<span class="required">*</span></label>';
                html += '     <div class="col-xs-9">';
                html += '        <input class="form-control "  id="sendPin" type="password">';
                html += '      </div> ';
                html += '</div> ';
                html += '<div class="form-group col-xs-6">';
                html += '     <label class="contrel required col-xs-2" for="autoBil">авто:</label>';
                html += '     <div class="col-xs-1">';
                html += '        <input class=" " id="autoBil" type="checkbox">';
                html += '      </div> ';
                html += '<button type="button" class="btn btn-info" data-id="' + premium_id + '" data-month="' + premium_month + '" data-price="' + premium_price + '" id="approvePremiumPackage" >Подтвердить</button>'
                html += '</div> ';
                $(".partnerSave").append(html);
            },
            /**
             * Approve choosed premium package
             * 
             * @author Narek T.
             * @created at 13nd day of Macrh 2016
             * @param {DOMEvent} event
             * @returns {void}
             */
            approvePremiumPackage: function() {
                id = $(this).data("id");
                pin = $("#sendPin").val();
                auto = 0;
                if ($('input#autoBil').is(':checked')) {
                    auto = 1;
                }
                // Send ajax request
                ajaxHandler.sendAjaxRequest({
                    url: '/user/profile/premium',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id: id, pin: pin, auto: auto},
                }, function(mes) {
                    if (!mes.error) {
                        html = '<div class="alert alert-success col-xs-12">';
                        html += "success";
                        html += '</div>';
                        $("#danger").html(html);
                        setTimeout(function() {
                            $('#premium').modal('hide');
                            $('.premium_b').remove();
                        }, 500);
                    } else {
                        html = '<div class="alert alert-danger col-xs-12">';
                        html += mes.error;
                        html += '</div>';
                        if (mes.amountAdd) {
                            html += '<div class="col-xs-12 margin-bottom-10"><a href="/user/finance" class="btn btn-success" >Add amount </a></div>';
                        }
                        $("#danger").html(html);
                    }
                });
            }
        },
        onDblClick: {
            
        }
    };
})();