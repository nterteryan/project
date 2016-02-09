Tree = {
    isToggleRequest: function (url) {
        return url.indexOf('user/team/ajaxFillTree') > -1;
    },
    addMoreButton: function (itemsCount, blockId) {
        if (itemsCount >= 10) {
            var $currentBlock = Tree.getBlockById(blockId);
            if (!$currentBlock.find('.tree-more-button').lenfth) {
                $currentBlock.append("<a data-offset='10' data-limit='10' class='tree-more-button'>Показать еще</a>");
            } else {
                $currentBlock.find('a.tree-more-button').attr("data-offset", itemsCount);
            }
        }
    },
    getBlockById: function (id) {
        if (id == 0) {
            var blockSelector = 'ul.treeview>li:first-child';
        } else {
            blockSelector = 'li#' + id+">ul";
        }
        return  $(blockSelector).closest('ul');
    }
};

User = {
    BASE_URL: MODULE_BASE_URL,
    ASSETS_URL: assetsUrl,
    IMAGES_URL: null,
    init: function () {
        User.IMAGES_URL = User.ASSETS_URL + "/img"
    },
    onDocumentReady: function () {
        User.addChangePasswordButtonHandler();
        User.addGetFormCertificate();
    },
    addChangePasswordButtonHandler: function () {
        $("input#change-password").click(function (e) {
            e.preventDefault();
            $('#change-password-modal .progress').addClass('hidden');
            $('#change-password-modal').modal('show');
            $('#change-password-modal').find('input').val("");
            App.Form.setSuccess();
        });
        $('button#change-password-submit').click(function (e) {
            e.preventDefault();
            var $form = $('#change-password-form');
            var $progressBar = $('#change-password-modal .progress');
            $progressBar.removeClass('hidden');
            var data = new FormData($form[0]);
            $.ajax({
                url: User.BASE_URL + 'profile/changePassword',
                type: 'post',
                contentType: false,
                processData: false,
                dataType: 'json',
                data: data,
                success: function (resp) {
                    $progressBar.addClass('hidden');
                    var modelName = 'User';
                    App.Form.setResponseErrors(modelName, resp);
                    if (resp.success) {
                        $('#change-password-modal').modal('hide');
                    }
                }
            });
        });
    },
    addGetFormCertificate: function (e) {
        $(".certificate-choose").click(function (e) {
            e.preventDefault();
            $certificateId = $(this).data('id');
            $.ajax({
                url: User.BASE_URL + 'certificate/getForm',
                type: 'POST',
                dataType: 'json',
                data: {certificateId: $certificateId}
            }).done(function (dataResponse) {
                $('#box-' + $certificateId).html(dataResponse.form);
            });
        });
    },
    addByCertificate: function (e, element) {
        e.preventDefault();
        $certificateId = $(element).data('id');
        var $form = $('#form-' + $certificateId);
        var data = new FormData($form[0]);
        $.ajax({
            url: User.BASE_URL + 'certificate/buy',
            contentType: false,
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            success: function (dataResponse) {
                $(".error-message-" + $certificateId).html(dataResponse.message);
                if (dataResponse.success == 'true') {
                    setTimeout(function () {
                        location.reload();
                    }, 5000);
                }
            }});
    },
    
    /**
     * 
     * @author Narek T.
     * @cretaed at 9th day of February
     * @returns {undefined}
     */        
    chargeBalance: function(e, element) {
        e.preventDefault();
        var $form = $('#charge-balance');
        var data = new FormData($form[0]);
        $.ajax({
            url: User.BASE_URL + 'order/charge',
            contentType: false,
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            success: function (dataResponse) {
                $(".error-message").removeClass('hidden');
                if (dataResponse.success == 'true') {
                    $(".error-message").addClass('hidden');
                    $('#charge').html(dataResponse.html);
                } else {
                    $(".error-message").html(dataResponse.message);
                }
            }});
    },
    
    chekcAcceptedTerms: function (e) {
        if (!$('#check-terms-corporatization').is(":checked")) {
            e.preventDefault();
            alert("Нужно подтвердить согласие с условиами!")
        }
    },
    processAjaxComplete: function (event, XMLHttpRequest, ajaxOptions) {
        setTimeout(function () {
            User.onTreeToggleAjaxComplete(event, XMLHttpRequest, ajaxOptions);
        }, 0);
    },
    onTreeToggleAjaxComplete: function (event, XMLHttpRequest, ajaxOptions) {
        if (Tree.isToggleRequest(ajaxOptions.url)) {
            var itemsCount = XMLHttpRequest.responseJSON.length;
            var match = ajaxOptions.url.match(/root=(\d+)/);
            console.log(match);
            var blockId = match ? parseInt(match[1]) : 0;
            Tree.addMoreButton(itemsCount, blockId);
        }
    }
};

User.init();

$(document).ready(function (event, XMLHttpRequest, ajaxOptions) {
    User.onDocumentReady();
});

$(document).ajaxComplete(function (event, XMLHttpRequest, ajaxOptions) {
    User.processAjaxComplete(event, XMLHttpRequest, ajaxOptions);
});
