$( document ).ready(function() {

    $(".closedTariff").on("click",function(event){
        event.preventDefault();
        tr  = $(this);
        var url = "/user/Investment/paiding";
        var closedTariffId = $(this).data("id");
        alert(closedTariffId);
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {closedTariffId:closedTariffId},
            success: function(mes) {
                if(!mes.error){
                    tr.parents('tr').remove();
                    console.log(tr.parents('tr'));
                }
            }
        })
    })

    this.id;
    this.amount;
    this.percent;
    this.close_month;
    $(".btn_tariff").on("click",function(event){
         window.id = $(this).data("id");
         window.amount = $(this).data("amount");
         window.percent = $(this).data("percent");
         window.close_month = $(this).data("close_month");
    })
    $("#btn_modalTr").on("click",function(event){
        event.preventDefault();
        var url = "/user/Investment/addUser";
        var id = window.id;
        var amount = window.amount;
        var percent = window.percent;
        var close_month = window.close_month;
        var pin = $("#sendPin").val();
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {id:id,amount:amount,pin:pin,percent:percent,close_month:close_month},
            success: function(mes) {
                $("#sendPin").val("");
                console.log(mes);
                if(!mes.error){
                    html ='<div class="alert alert-success">';
                        html += "success";
                    html += '</div>';
                    $("#danger").html(html);
                }else{
                    html ='<div class="alert alert-danger">';
                    html += mes.error;
                    html += '</div>';
                    if(mes.amountAdd){
                        html += '<div class="col-xs-12 margin-bottom-10"><a href="/user/finance" class="btn btn-success" >Add amount </a></div>';
                    }
                    $("#danger").html(html);
                }
            }
        })
    })

    var handleFileSelect = function(evt) {
        var files = evt.target.files;
        var file = files[0];
        var fileTypes = ['jpg', 'jpeg', 'png'];
        var extension = file.name.split('.').pop().toLowerCase();
        if (files && file) {
            isSuccess = fileTypes.indexOf(extension) > -1
            if (isSuccess) {
                var reader = new FileReader();
                reader.onload = function(readerEvt) {
                    var binaryString = readerEvt.target.result;
                    document.getElementById("user_image").src = "data:image/jpeg;base64,"+btoa(binaryString);
                    document.getElementById("fileUpload").innerHTML = '<input class="btn btn-save-changes"  type="submit" value="Сохранить">';
                };
                reader.readAsBinaryString(file);
            }else{
                    document.getElementById("fileUpload").innerHTML = '<div class="errorMessage">The file "'+file.name+'" cannot be uploaded. Only files with these extensions are allowed: jpg, gif, png.</div>';
            }
        }
    };
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        document.getElementById('UserImage_image').addEventListener('change', handleFileSelect, false);
    }

})

