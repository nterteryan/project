User = {
    BASE_URL: MODULE_BASE_URL,
    ASSETS_URL: assetsUrl,
    IMAGES_URL: null,
    init: function () {
        User.IMAGES_URL = User.ASSETS_URL + "/img",
                console.log(User.BASE_URL);
        console.log(User.IMAGES_URL);
    },
    onDocumentReady: function () {
        User.addChangePasswordButtonHandler();
        User.addByCertificate();
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
    
    addByCertificate: function(e) {
        $(".certificate-choose").click(function (e) {
            e.preventDefault();
            $certificateId = $(this).data('id');
            $.ajax({
                url: User.BASE_URL + 'certificate/getForm',
                type: 'POST',
                dataType: 'json',
                data: {certificateId: $certificateId}
            }).done(function(dataResponse) {
                $('#box-'+$certificateId).html(dataResponse.form);
            });
        });
    },
            
    chekcAcceptedTerms: function(e) {
        if(!$('#check-terms-corporatization').is(":checked")) {
            e.preventDefault();
            alert("Нужно подтвердить согласие с условиами!")
        }
    }
};

User.init();

$(document).ready(function () {
    User.onDocumentReady();
});
