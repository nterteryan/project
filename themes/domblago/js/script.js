$( document ).ready(function() {
    $(".btn_tariff").on("click",function(event){
        event.preventDefault();
        var id = $(this).data("id");
        var amount = $(this).data("amount");
        var percent = $(this).data("percent");
        var close_month = $(this).data("close_month");
        $(".btn_modalTr").attr("data-id",id);
        $(".btn_modalTr").attr("data-close_month",close_month);
        $(".btn_modalTr").attr("data-percent",percent);
        $(".btn_modalTr").attr("data-amount",amount);
    })
    $(".btn_modalTr").on("click",function(event){
        event.preventDefault();
        var url = "/user/Investment/addUser";
        var id = $(this).data("id");
        var amount = $(this).data("amount");
        var percent = $(this).data("percent");
        var close_month = $(this).data("close_month");
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
})


