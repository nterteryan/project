$ = jQuery.noConflict();

App = {
    // Properties
    baseUrl: APP_BASE_URL,
    // initialize app
    init: function () {
    },
    // Events that must be fired after HTML document is ready
    onDocumentReady: function () {
    }
};

App.Form = {
    setResponseErrors: function (modelName, resp) {
        App.Form.setSuccess();
        if (!resp.success) {
            console.log(resp.error);
            $.each(resp.error, function (field, messages) {
                var message = messages[0];
                var $inputField = App.Form.getField(modelName, field);
                App.Form.setFieldError($inputField, message);
            });
        }
    },
    setFieldError: function ($inputField, message) {
        $inputField.closest('.form-group ').addClass("has-error");
        $inputField.next('.errorMessage').removeClass('hidden').text(message);
    },
    getField: function (modelName, field) {
        return $('#' + modelName + '_' + field);
    },
    setSuccess: function() {
        $('.form-group').removeClass('has-error');
        $('.errorMessage').text('');
    },
};

App.init();

$(document).ready(function () {
    App.onDocumentReady();
});






