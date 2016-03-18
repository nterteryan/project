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
            editCat: function(event, element) {
                id = element.attr("href");
                ajaxHandler.sendAjaxRequest({
                    url: '/marketplace/categories/getCatById',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id:id},
                }, function(mes) {
                    if (mes.success) {
                        $("#Category_title").val(mes.title);
                        $("#Category_icone").val(mes.icone);
                        $("#catFormId").html('<input  name="Category[id]" value="'+mes.id+'" type="hidden" >');
                    }
                });
            }, 
            deleteCat: function(event, element) {
                id = element.attr("href");
                ajaxHandler.sendAjaxRequest({
                    url: '/marketplace/categories/deleteCat',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id:id},
                }, function(mes) {
                    if (mes.success) {
                        element.parents("tr").remove();
                    }
                });
            }

        },
        onDblClick: {
     
        },
        submit: {
            catForm: function(event, element) {
                    data = element.serialize();
                ajaxHandler.sendAjaxRequest({
                    url: '/marketplace/categories/addEdit',
                    type: 'POST',
                    dataType: 'JSON',
                    data: data,
                }, function(mes) {
                    if (mes.success) {
                        location.reload();
                        // $(".cat_table").append('<tr><td>'+mes.title+'</td><td><a class="btn btn-default editCat" title="редактировать" href="'+mes.id+'">редактировать</a></td></tr>')
                    }
                });
            }
        }
    };
})();